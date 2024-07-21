<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com"> SamsatRiau@gmail.com </a>
            <i class="bi bi-phone"></i> +62 81234567899
        </div>
    </div>
</div>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    
    <h1 class="logo me-auto">
  <a href="/">
    <img src="../assets/img/logo.png" alt="Logo" style="height: 40px; margin-right: 8px;"> E-Riau SAMSAT
  </a>
</h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="/antrian">Antrian</a></li>
                <li><a class="nav-link scrollto" href="/#feedback">Umpan Balik</a></li>
                <li><a class="nav-link scrollto" href="/#panduan">Panduan</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        @auth
            <div class="dropdown ms-3">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu">
                    @if (auth()->user()->roles === 'admin')
                        <li><a class="dropdown-item" href="/dashboard">Beranda </a></li>
                    @else
                        <li><a class="dropdown-item" href="/antrian">Menu Antrian </a></li>
                    @endif

                    <form id="logout-form" action="/logout" method="post" onsubmit="handleLogout(event)">
                    @csrf
                        <button type="submit" class="dropdown-item">
                            <span class="align-middle">Keluar</span>
                        </button>
                    </form>

                </ul>
            </div>
        @else
            <a href="/login" class="appointment-btn scrollto">Masuk</a>
        @endauth

    </div>
</header><!-- End Header -->


<script>
   function handleLogout(event) {
       event.preventDefault(); // Mencegah pengiriman formulir secara default

       // Melakukan permintaan logout sebenarnya menggunakan fetch
       fetch('/logout', {
           method: 'POST',
           headers: {
               'Content-Type': 'application/json',
               'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
           },
           body: JSON.stringify({})
       }).then(response => {
           if (response.ok) {
               // Segarkan halaman setelah logout berhasil
               window.location.reload();
           }
       }).catch(error => console.error('Error logging out:', error));
   }
</script>