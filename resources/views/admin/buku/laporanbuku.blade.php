<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Book</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Laporan Data Buku</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Stok</th>
                                <th>Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bukus as $buku)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $buku->kategori->nama_kategori}}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->stok }}</td>
                                <td>
                                    <img src="{{ asset('image/'. $buku->gambar) }}" alt="Cover Image">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
