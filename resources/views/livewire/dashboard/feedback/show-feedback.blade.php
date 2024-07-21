@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">Umpan Balik</div>

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input wire:model="search" type="search" class="form-control" placeholder="Cari Nama" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_id">
                            <thead>
                                <tr style="text-align: center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pesan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $feedback)
                                <tr style="text-align: center">
                                    <td>{{ $feedback->id }}</td>
                                    <td>{{ $feedback->name }}</td>
                                    <td>{{ $feedback->email }}</td>
                                    <td>{{ Str::limit($feedback->message, 25) }}</td> <!-- Cuplikan pesan -->
                                    <td>
                                        <!-- Tombol Detail -->
                                        <button class="btn btn-primary" type="button" onclick="showDetail({{ $feedback->id }})">
    Detail
</button>


                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('dashboard.feedback.destroy', $feedback->id) }}" method="POST" class="delete-form" id="delete-form-{{ $feedback->id }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $feedbacks->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Detail Feedback -->
<!-- Modal Detail Feedback -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Detail Umpan Balik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> <span id="feedbackName"></span></p>
                <p><strong>Email:</strong> <span id="feedbackEmail"></span></p>
                <p><strong>Pesan:</strong> <span id="feedbackMessage"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle form submission for delete action
        $('form.delete-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');

            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data umpan balik ini akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Dihapus!',
                                'Umpan balik berhasil dihapus.',
                                'success'
                            ).then(() => {
                                window.location.reload(); // Reload the page to update the list
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan pada server.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });

    function showDetail(feedbackId) {
    $.ajax({
        url: '/feedback/' + feedbackId,
        type: 'GET',
        success: function(data) {
            // Isi data ke dalam modal
            $('#feedbackName').text(data.name);
            $('#feedbackEmail').text(data.email);
            $('#feedbackMessage').text(data.message);

            // Tampilkan modal
            var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));
            feedbackModal.show();
        },
        error: function(xhr) {
            Swal.fire(
                'Gagal!',
                'Terjadi kesalahan saat mengambil data feedback.',
                'error'
            );
        }
    });
}

</script>