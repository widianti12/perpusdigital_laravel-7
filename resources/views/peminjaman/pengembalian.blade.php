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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>History Pengembalian</h4>
                        </div>
                        <div class="card-body" >
                            <table class="table table-striped" id="table1">
                                <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($historykembali as $pengembalian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengembalian->user->name }}</td>
                            <td>{{ $pengembalian->buku->judul }}</td>
                            <td>{{ $pengembalian->tanggal_peminjaman }}</td>
                            <td>{{ $pengembalian->tanggal_pengembalian }}</td>
                            <td>
                                @if($pengembalian->status_peminjaman == 1)
                                Dikembalikan                                                
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Pengembalian Kosong.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $historykembali->links() }}
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