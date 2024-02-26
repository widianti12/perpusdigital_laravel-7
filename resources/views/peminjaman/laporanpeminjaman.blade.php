
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
                                                @endif
                                           </td>
                                            <td> 
                                                <img src="{{ asset('image/'. $peminjaman->buku->gambar) }}" width=100px alt="Image">
                                            </td>
                                            <td>
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
