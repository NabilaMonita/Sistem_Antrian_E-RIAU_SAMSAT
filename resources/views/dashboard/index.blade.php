@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="card mt-3" style="height: 800px">
            <div class="card-body">
                <div class="card-title">Dashboard</div>

                <div class="col-xxl col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Selamat Datang <span>| {{ auth()->user()->name }}</span></h5>
                            <div class="d-flex align-items-center">
                                <h2>SISTEM ANTRIAN SAMSAT ONLINE</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-title">Antrian Masuk</div>

                <div class="row">
                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Antrian Hari Ini</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $hariIniAntri }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Antrian Minggu Ini</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-calendar-week"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $mingguIniAntri }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Antrian Bulan Ini</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $bulanIniAntri }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Semua Antrian</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-list-ul"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $semuaAntri }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#panggilAntrian').modal('hide')
        })
    </script>
@endsection
