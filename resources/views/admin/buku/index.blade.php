
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

<div class="card">
    <a href="buku/create" class="nav-item nav-link">Tambah Buku</a>
    <section class="section">
        <div class="card">
                <div class="card-header">
                    Data Book
                </div>
                        <div class="card-body" >
                            <table class="table table-striped" id="table1">
                                <thead>
                                     <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <!-- <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th> -->
                                        <th>Stok</th>
                                        <th>Cover</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bukus as $buku)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $buku->kategori->nama_kategori}}</td>
                                            <td>{{ $buku->judul }}</td>
                                            <!-- <td>{{ $buku->penulis }}</td>
                                            <td>{{ $buku->penerbit }}</td>
                                            <td>{{ $buku->tahun_terbit }}</td> -->
                                            <td>{{ $buku->stok }}</td>
                                            <td> 
                                                <img src="{{ asset('image/'. $buku->gambar) }}" width=100px alt="Image">
                                            </td>
                                            <td>
                                                <form action="{{ url('buku/destroy', $buku->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ url('buku/edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus">Hapus</button>

                                                    <button type="button" href="{{ url('buku/show', $buku->id) }}" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                                        data-bs-target="#detail">
                                                        Detail
                                                    </button>                                              
                                                </form>
                                                </td>
                                    </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
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




