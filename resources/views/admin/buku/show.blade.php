
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Judul: {{ $bukus->judul }}</h1>
                        <p class="card-text">Penulis: {{ $bukus->penulis }}</p>
                        <p class="card-text">Kategori: {{ $bukus->kategori->nama_kategori }}</p>
                        <p class="card-text">Penerbit: {{ $bukus->penerbit }}</p>
                        <p class="card-text">Tahun Terbit: {{ $bukus->tahun_terbit }}</p>
                        <p class="card-text">Deskripsi: {{ $bukus->description }}</p>
                        <p class="card-text">Cover:</p>
                        <div class="col-md-4">
                    <img src="{{ asset('image/' . $bukus->gambar) }}" class="card-img-top" alt="Cover Buku">
                    </div>
                    </div>
                </div>
            </div>    
            </div>
        </div>
    </div>
<!-- END FOOTER -->
</div>
</div>
@include('template.script')
</body>
</html>
