@extends('layouts.main')
<link href="../assets/img/logo.png" rel="icon">
<link href="../assets/img/logo.png" rel="apple-touch-icon">
@include('partials.navbar')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Selamat Datang</h1>
            <h1>E-Riau Samsat</h1>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <section id="why-us" class="why-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Sistem Antrian Online</h3>
                            <p>
                                Ini adalah Sistem Antrian Online SAMSAT Riau dimana setiap pengunjung dapat
                                mengambil antrian sesuai Pelayanan yang dibutuhkan
                            </p>
                            <div class="text-center">
                                <a href="/antrian" class="more-btn">Ambil Antrian <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <!-- Content Here -->
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-money"></i>
                                        <h4>Bayar Pajak</h4>
                                        <p>Bayar pajak adalah proses pembayaran yang dilakukan oleh individu atau badan hukum kepada pemerintah sesuai dengan ketentuan perundang-undangan yang berlaku.</p>
                                        <button class="btn btn-primary btn-block mt-3" type="button"
                                            onclick="showAlert('Bayar Pajak Kendaraan Bermotor', '<img src=\'{{ asset('assets/img/pajak.png') }}\' alt=\'image\' style=\'width: 200px; height: 200px; margin: 20px auto;display: block;\'><br>Syarat-syarat:<br>1. KTP asli dan fotokopi pemilik kendaraan.<br>2. STNK asli dan fotokopi.<br>3. BPKB asli dan fotokopi (jika diminta).<br>4. Formulir permohonan pembayaran pajak yang telah diisi.<br>5. Bukti pembayaran terakhir pajak kendaraan bermotor.<br>6. Kwitansi pembelian jika kendaraan baru (untuk <br>  pembayaran pajak pertama kali).')">
                                            Tampilkan Detail
                                        </button>
                                    </div>
                                </div>

                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-book"></i>
                                        <h4>Penerbitan STNK</h4>
                                        <p>STNK, atau Surat Tanda Nomor Kendaraan, adalah dokumen resmi yang menunjukkan identitas dan legalitas suatu kendaraan bermotor.</p>
                                        <button class="btn btn-primary btn-block mt-3" type="button"
                                            onclick="showAlert('Penerbitan STNK','<img src=\'{{ asset('assets/img/stnk.png') }}\' alt=\'image\' style=\'width: 250px; height: 150px; margin: 20px auto;display: block;\'><br>Syarat-syarat:<br>1. KTP asli dan fotokopi pemilik kendaraan.<br>2. BPKB asli dan fotokopi.<br>3. Faktur pembelian kendaraan.<br>4. Bukti pembayaran pajak kendaraan bermotor.<br>5. Surat keterangan dari dealer (untuk kendaraan baru).<br>6. Formulir permohonan penerbitan STNK yang telah diisi.')">
                                            Tampilkan Detail
                                        </button>
                                    </div>
                                </div>

                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-car"></i>
                                        <h4>Penerbitan BPKB</h4>
                                        <p>BPKB, atau Buku Pemilik Kendaraan Bermotor, adalah dokumen resmi yang memberikan bukti kepemilikan atas suatu kendaraan bermotor.</p>
                                        <button class="btn btn-primary btn-block mt-3" type="button"
                                            onclick="showAlert('Penerbitan BPKB','<img src=\'{{ asset('assets/img/bpkb.png') }}\' alt=\'image\' style=\'width: 200px; height: 200px; margin: 20px auto;display: block;\'><br>Syarat-syarat:<br>1. KTP asli dan fotokopi pemilik kendaraan.<br>2. Faktur pembelian kendaraan.<br>3. Bukti pembayaran pajak kendaraan bermotor.<br>4. Surat keterangan dari dealer (untuk kendaraan baru).<br>5. Formulir permohonan penerbitan BPKB yang telah diisi.')">
                                            Tampilkan Detail
                                        </button>
                                    </div>
                                </div>

                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cycling"></i>
                                        <h4>Pengecekan Kendaraan</h4>
                                        <p>Pengecekan kendaraan merupakan proses untuk memastikan kondisi dan keamanan kendaraan bermotor sebelum digunakan.</p>
                                        <button class="btn btn-primary btn-block mt-3" type="button"
                                            onclick="showAlert('Pengecekan Kendaraan','<div style=\'background-color: #f8f9fa; padding: 20px; border-radius: 10px; \'><img src=\'{{ asset('assets/img/uji.png') }}\' alt=\'image\' style=\'width: 300px; height: 200px; margin: 20px auto;display: block;\'><br>Syarat-syarat:<br>1. KTP asli dan fotokopi pemilik kendaraan.<br>2. STNK asli dan fotokopi.<br>3. Bukti pembayaran pajak kendaraan bermotor.<br>4. Formulir permohonan pengecekan kendaraan yang telah diisi.<br>5. Bukti asuransi kendaraan (jika ada).')">
                                            Tampilkan Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Why Us Section -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fancy-line"></div>
                </div>
            </div>
        </div>

        <section id="panduan" class="panduan">
            <div class="container">
                <div class="section-title">
                    <h2>Panduan Menggunakan Sistem</h2>
                    <p>Berikut adalah panduan untuk menggunakan sistem antrian online.</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('../assets/img/panduan.png') }}" alt="Panduan Menggunakan Sistem" class="img-fluid w-75">
                </div>
            </div>
        </section><!-- End Panduan Section -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fancy-line"></div>
                </div>
            </div>
        </div>

        <section id="feedback" class="feedback">
            <div class="container">
                <div class="section-title">
                    <h2>Umpan Balik Pengguna</h2>
                    <p>Pendapat Anda membantu kami berkembang. Bagikan umpan balik Anda sekarang.</p>
                </div>
                <div class="text-center mb-4">
                    <img src="{{ asset('../assets/img/icon.png') }}" alt="Contact Image" class="img-fluid">
                </div>

                <div class="container">
                    @if (Auth::check())
                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <div class="info">
                                    <div class="address">
                                        <i class="bi bi-geo-alt"></i>
                                        <h4>Lokasi:</h4>
                                        <p>Pekanbaru, Indonesia</p>
                                    </div>

                                    <div class="email">
                                        <i class="bi bi-envelope"></i>
                                        <h4>Email:</h4>
                                        <p>SamsatRiau@gmail.com</p>
                                    </div>

                                    <div class="phone">
                                        <i class="bi bi-phone"></i>
                                        <h4>No Telp:</h4>
                                        <p>+62 81234567899</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 mt-5 mt-lg-0">
                                <form id="feedbackForm" action="{{ route('feedback.store') }}" method="POST" class="php-email-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="message" rows="8" placeholder="Umpan Balik Anda" required></textarea>
                                    </div>
                                    <div class="my-3">
                                        <div class="loading d-none">Loading...</div>
                                        <div class="error-message d-none"></div>
                                        <div class="sent-message d-none">Pesan Anda telah terkirim. Terima kasih!</div>
                                    </div>
                                    <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                                    <div id="alert-container"></div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="alert alert-warning" role="alert">
                                    Anda harus <a href="{{ route('login') }}">login</a> untuk mengirim umpan balik.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section><!-- End Feedback Section -->
    </main><!-- End #main -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#feedbackForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari pengiriman standar

                // Disable the submit button to prevent multiple clicks
                $(this).find('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Enable the submit button
                        $('#feedbackForm').find('button[type="submit"]').prop('disabled', false);

                        // Cek apakah respons berhasil
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Umpan balik anda telah terkirim',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan, silakan coba lagi.',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        // Enable the submit button
                        $('#feedbackForm').find('button[type="submit"]').prop('disabled', false);

                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan: ' + errorMessage,
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });

        function showAlert(title, content) {
            // Remove any existing modal to avoid conflicts
            $('#custom-modal').remove();

            const modalContent = `
                <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-labelledby="custom-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="custom-modal-label">${title}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ${content}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalContent);
            var modalElement = new bootstrap.Modal(document.getElementById('custom-modal'));
            modalElement.show();
        }
    </script>
@endsection
