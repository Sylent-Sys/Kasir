<div>
    @include('layouts.title',['title'=>'Transaksi'])
    <h2>Belum Bayar</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Meja</th>
                    <th>Pemesan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($belumBayar as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->no_meja }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ \App\Helpers\Globals::rupiah($item->total) }}</td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center fw-bold">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <h2>Transaksi Terdahulu</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Waktu Pesan</th>
                    <th>Pemesan</th>
                    <th>No Meja</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sudahBayar as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->transaksiDetail->no_meja }}</td>
                        <td>{{ \App\Helpers\Globals::rupiah($item->transaksiDetail->total) }}</td>
                        <td><button class="btn btn-danger" wire:click='hapus({{ $item->transaksiDetail->id }})'><i class="bi bi-trash"></i></button></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center fw-bold">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
