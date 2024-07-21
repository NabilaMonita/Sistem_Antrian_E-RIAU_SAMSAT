@extends('dashboard.layouts.main')

@section('content')
    <div>
        <livewire:dashboard.daftar-layanan.dashboard-antrian-stnk>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#panggilAntrian').modal('hide')
        })
    </script>
@endsection
