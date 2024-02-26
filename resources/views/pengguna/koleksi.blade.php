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
@if($message = Session::get('success'))
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="{{ url('images/logo.png') }}" class="rounded mx-auto d-block" width="700" alt="">
            <h2>Koleksi Buku</h2>
        </div>
        @foreach ($koleksi as $koleksi)  
        <div class="col-md-4">
            <div class="card">
               <img src="{{ asset('image/'.$koleksi->buku->gambar) }}"class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $koleksi->buku->judul }}</h5>
                <p class="card-text">
                    <hr>
                    <strong>Penulis :</strong> <br>
                    {{ $koleksi->buku->penulis }}
                 </p>
               
                 <form action="{{ url('koleksi/destroy', $koleksi->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus">Hapus</button>
                    <a class="btn btn-success btn-sm" href="{{ url('/peminjaman/pinjam', $koleksi->buku->id) }}"><i class="fa fa-shopping-cart"></i>Pinjam</a>

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
