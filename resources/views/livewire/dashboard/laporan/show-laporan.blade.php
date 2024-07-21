<!-- resources/views/livewire/dashboard/laporan/show-laporan.blade.php -->

<div>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Laporan Antrian</div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="table_id">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">No Antrian</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Nomor KTP</th>
                                <th scope="col">layanan</th>
                                <th scope="col">Tgl. Antrian</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $list)
                                <tr style="text-align: center">
                                    <td>{{ $list->no_antrian }}</td>
                                    <td>{{ $list->nama }}</td>
                                    <td>{{ $list->alamat }}</td>
                                    <td>{{ $list->no_hp }}</td>
                                    <td>{{ $list->no_ktp }}</td>
                                    <td>{{ $list->layanan }}</td>
                                    <td>{{ $list->tanggal_antrian }}</td>
                                    <td>
                                        <button wire:click="hapusAntrian({{ $list->id }})" class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $laporan->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('refreshLivewireDatatable', function () {
            Livewire.emit('refresh');
        });
    });
</script>
