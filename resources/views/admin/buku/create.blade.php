
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
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/buku">Data Buku</a></li>
    <li class="breadcrumb-item active" aria-current="page">Input Buku
    </li>
</ol>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <h4>Tambah Buku</h4>
                    <div class="card-body">
                        <form method="post" action="{{ url('buku/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <select class="form-select" name="KategoriID">
                                <option value="">Select Kategori</option>
                                @foreach($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
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
                                    <input type="text" name="judul" class="form-control">

                                    @error('judul')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control">

                                    @error('penulis')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control">

                                    @error('penerbit')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Tahun Terbit</label>
                                    <input type="text" name="tahun_terbit" class="form-control">

                                    @error('tahun_terbit')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>Image</label>
                                    <input type="file" name="gambar" class="form-control">
                                    
                                    @error('gambar')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                        <label for="stok">Qty</label>
                                        <input type="number" name="stok" class="form-control" placeholder="stok">

                                        @error('stok')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                            </div>
                        </form>
                    </div>
       
    <!-- END MAIN -->
<!-- FOOTER -->

<!-- END FOOTER -->
</div>
</div>

@include('template.script')
</body>
</html>



