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
@if (session('success'))
<div class="alert alert-success alert-dismissible" role="alert" id="notification">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="row justify-content"> <!-- Center the form -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Kategori</h4> <!-- Center the title -->
                    <form method="post" action="{{ url('kategori/store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="roundText">Nama Kategori</label>
                                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control">
                                @error('nama_kategori')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary rounded-pill" value="Simpan">
                            </div>
                    </form>
                </div>
            </div>
        </div>
  

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Daftar Kategori Buku</h4> <!-- Center the title -->
                </div>
                        <div class="card-body" >
                            <table class="table table-striped" id="table1">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>
                                        <form action="{{ url('/kategori/destroy', $item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="{{ url('kategori/edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')" title="Hapus">Hapus</button>
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
</div>
   <!-- END MAIN -->
<!-- FOOTER -->
<!-- END FOOTER -->
</div>
</div>
@include('template.script')
</body>
</html>
