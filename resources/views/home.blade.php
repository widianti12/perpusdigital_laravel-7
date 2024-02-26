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
@if (session('error'))
<div class="alert alert-danger alert-dismissible" role="alert" id="notification">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning alert-dismissible" role="alert" id="notification">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('images/logo.png') }}" class="rounded mx-auto d-block" width="700" alt="">
            <h2>Buku Bacaan</h2>
        </div>
        @foreach($bukus as $buku)
        <div class="col-md-4">
            <div class="card">
               <img src="{{ asset('image/'. $buku->gambar) }}"class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $buku->judul }}</h5>
                <p class="card-text">
                    <hr>
                    <strong>Penulis :</strong> <br>
                    {{ $buku->penulis }}
                 </p>
                 <!-- <p class="card-text"> Status: 
                    <span class="{{$buku->status == 'Tersedia' ? 'text-success' : 'text-danger'}}">{{$buku->status}}</span>
                </p> -->
                 <!-- Button trigger for basic modal -->
                 <a class="btn btn-primary" href="{{ url('buku/show', $buku->id) }}">Detail</a>

                 <!-- <button type="button" href="{{ url('buku/show', $buku->id) }}" class="btn btn-outline-primary block" data-bs-toggle="modal"
                    data-bs-target="#detail">
                    Detail
                </button> -->
                <a class="btn btn-primary" href="{{ route('peminjaman.pinjam', $buku->id) }}">Pinjam</a>

                <!-- <button type="button"  href="{{ route('peminjaman.pinjam', $buku->id) }}"class="btn btn-outline-primary block" data-bs-toggle="modal"
                    data-bs-target="#pinjam">
                    Pinjam
                </button> -->
                <a class="btn btn-primary" href="{{ url('/ulasan/create', $buku->id) }}">Ulasan</a>

                <!-- Form untuk menambahkan buku ke koleksi -->
                <form method="post" action="{{ url('koleksi/add', $buku->id) }}">
                    @csrf  
                    @if ($buku->koleksi && $buku->koleksi->contains('UserID', $id))
                        <button class="btn btn-icon btn-danger btn-sm">
                            <span class="tf-icons bx bx-heart"></span>
                        </button>
                    @else
                        <button class="btn btn-icon btn-outline-danger btn-sm">
                            <span class="tf-icons bx bx-heart"></span>
                        </button>
                    @endif 
                   <!-- Menambahkan tombol "Submit" di dalam formulir ini -->
                </form>
              </div>
            
            </div> 
        </div>
        @endforeach
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

<!-- show buku -->
<div class="modal fade text-left" id="detail" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Detail Buku</h5>
                    <button type="button" class="close rounded-pill"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <p>Judul: {{ $buku->judul }}
                        <p >Penulis: {{ $buku->penulis }}</p>
                        <p >Kategori: {{ $buku->kategori->nama_kategori }}</p>
                        <p >Penerbit: {{ $buku->penerbit }}</p>
                        <p >Tahun Terbit: {{ $buku->tahun_terbit }}</p>
                        <p >Deskripsi: {{ $buku->description }}</p>
                        <p >Stok: {{ $buku->stok }}</p>
                        <p >Cover:</p>
                    <img src="{{ asset('image/' . $buku->gambar) }}" class="card-img-top" alt="Cover Buku">
                    </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary ml-1"
                            data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end show buku -->

<!-- peminjaman create -->
<div class="modal fade text-left" id="pinjam" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Judul:{{ $buku->judul }}</h5>
                    <button type="button" class="close rounded-pill"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>1.Pendaftaran dilakukan secara online melalui platform perpustakaan.</p>
                    <p>2.Pengembalian buku harus tepat waktu</p>
                    <p>3.Anggota dibatasi untuk meminjam maksimal jumlah buku tertentu pada satu waktu.</p>
                    <p>4.Data pribadi anggota dilindungi sesuai dengan regulasi privasi yang berlaku.</p>
                          
                        <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
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
</div>
<!-- end peminjaman create -->