/**
* PHP Email Form Validation - v3.5
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/
(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach(function(e) {
    e.addEventListener('submit', function(event) {
      event.preventDefault();

      let thisForm = this;
      let action = thisForm.getAttribute('action');
      let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');
      
      if (!action) {
        displayError(thisForm, 'The form action property is not set!');
        return;
      }

      let loadingElement = thisForm.querySelector('.loading');
      let errorElement = thisForm.querySelector('.error-message');
      let sentElement = thisForm.querySelector('.sent-message');

      if (!loadingElement || !errorElement || !sentElement) {
        console.error('Required elements are missing in the form.');
        return;
      }

      loadingElement.classList.add('d-block');
      errorElement.classList.remove('d-block');
      sentElement.classList.remove('d-block');

      let formData = new FormData(thisForm);

      if (recaptcha) {
        if (typeof grecaptcha !== "undefined") {
          grecaptcha.ready(function() {
            try {
              grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
                .then(token => {
                  formData.set('recaptcha-response', token);
                  php_email_form_submit(thisForm, action, formData);
                });
            } catch (error) {
              displayError(thisForm, error);
            }
          });
        } else {
          displayError(thisForm, 'The reCaptcha javascript API url is not loaded!');
        }
      } else {
        php_email_form_submit(thisForm, action, formData);
      }
    });
  });

  function php_email_form_submit(thisForm, action, formData) {
    fetch(action, {
      method: 'POST',
      body: formData,
      headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(response => response.text())
    .then(data => {
      let loadingElement = thisForm.querySelector('.loading');
      let sentElement = thisForm.querySelector('.sent-message');

      loadingElement.classList.remove('d-block');
      if (data.trim() === 'OK') {
        sentElement.classList.add('d-block');
        thisForm.reset();
      } else {
        throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action);
      }
    })
    .catch(error => {
      displayError(thisForm, error);
    });
  }

  function displayError(thisForm, error) {
    let loadingElement = thisForm.querySelector('.loading');
    let errorElement = thisForm.querySelector('.error-message');

    loadingElement.classList.remove('d-block');
    errorElement.innerHTML = error;
    errorElement.classList.add('d-block');
  }

})();


