<!DOCTYPE html>
<html lang="en">
@include('template.head')
<body>
<!-- SIDEBAR -->
@include('template.sidebar')
<!-- END SIDEBAR -->
<!-- NAVBAR -->
@include('template.navbar')
<!-- END NAVBAR -->

<!-- MAIN CONTENT -->
@include('template.content_2')
@if (session('success'))
<div class="alert alert-success alert-dismissible" role="alert" id="notification">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>History Peminjaman</h4>
                        </div>
                        <div class="card-body" >
                            <table class="table table-striped" id="table1">
                                <thead>
                                     <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Judul</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                        <th>Cover</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historypeminjam as $peminjaman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $peminjaman->user->name }}</td>
                                            <td>{{ $peminjaman->buku->judul }}</td>
                                            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                            <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                                            <td>
                                                @if($peminjaman->status_peminjaman == 0)
                                                Dipinjam
                                                @else
                                                Dikembalikan
                                                @endif
                                           </td>
                                            <td> 
                                                <img src="{{ asset('image/'. $peminjaman->buku->gambar) }}" width=100px alt="Image">
                                            </td>
                                            <td>
                                            @if($peminjaman->status_peminjaman == 0)
                                            <form action="{{ route('peminjaman.kembalikan') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $peminjaman->id }}">

                                            <button type="submit" class="btn btn-warning btn-sm">Kembalikan</button>
                                        
                                            @else
                                                <!-- Tampilkan pesan atau aksi tambahan jika buku sudah dikembalikan -->
                                                Buku Sudah Dikembalikan
                                            @endif
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END MAIN -->
<!-- FOOTER -->

<!-- END FOOTER -->
</div>
</div>
@include('template.script')
</body>
</html>