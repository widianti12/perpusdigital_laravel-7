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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/buku') }}">Buku</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/kategori') }}">Kategori</a></li>
                </ol>
            </nav>
        </div>
<div class="container-fluid">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Peminjaman</h4>
                        <div class="form-group row">
                            <label for="judul" class="col-md-3 col-form-label">Judul: 
                                <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" readonly>
                                </label>
                        </div>
                        <div>
                        <label>1.Pendaftaran dilakukan secara online melalui platform perpustakaan.</label>
                       <label>2.Pengembalian buku harus tepat waktu</label>
                       <label>3.Anggota dibatasi untuk meminjam maksimal jumlah buku tertentu pada satu waktu.</label>
                       <label>4.Data pribadi anggota dilindungi sesuai dengan regulasi privasi yang berlaku.</label>
                            </div>
                        <div class="form-group row">
                           <!-- Form untuk menambahkan buku ke koleksi -->
                           <form method="post" action="{{ route('peminjaman.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $buku->id }}">
                            <!-- Menambahkan tombol "Submit" di dalam formulir ini -->
                            <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i></i>Pinjam</button>
                        </form>
                        </div>
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