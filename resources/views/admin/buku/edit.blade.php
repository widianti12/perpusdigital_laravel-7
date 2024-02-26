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
@include('template.content_2')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/buku') }}">Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/kategori') }}">Kategori</a></li>
              </ol>
            </nav>
        </div>
<!DOCTYPE html>
<html>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <h4>Edit Buku</h4>
                    <div class="card-body">
                        <form method="post" action="{{ url('buku/update', $buku->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-md-12 mb-3">
                                <select class="form-select" name="KategoriID">
                                <option value="">Select Kategori</option>
                                @foreach($kategori as $kategori)
                                    <option value="{{ $kategori->id }}" value="{{$kategori->nama_kategori}}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                                </select>
                                @error('kategori')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control" value="{{$buku->judul}}">

                                    @error('judul')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control"value="{{$buku->penulis}}">

                                    @error('penulis')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control"value="{{$buku->penerbit}}">

                                    @error('penerbit')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Tahun Terbit</label>
                                    <input type="text" name="tahun_terbit" class="form-control"value="{{$buku->tahun_terbit}}">

                                    @error('tahun_terbit')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>Image</label>
                                    <input type="file" name="gambar" class="form-control"value="{{$buku->gambar}}">
                                    @if($buku->gambar)
                                    <img src="{{ asset('image/'. $buku->gambar) }}" width=100px alt="Image">
                                    @endif

                                    @error('gambar')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                        <label for="stok">Qty</label>
                                        <input type="number" name="stok" class="form-control" placeholder="stok" value="{{$buku->stok}}">

                                        @error('stok')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="Edit">
                                </div>
                            </div>
                        </form>
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


