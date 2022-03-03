<div>
    @include('layouts.title',['title'=>'Laporan'])
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Sisa Stok</th>
                    <th>Jumlah Terjual</th>
                    <th>Harga</th>
                    <th>Total Pemasukan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPemasukan = 0;
                @endphp
                @forelse ($menu as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->transaksiItems->sum('jumlah') }}</td>
                        <td>{{ \App\Helpers\Globals::rupiah($item->harga) }}</td>
                        @php
                            $totalPemasukan += $item->transaksiItems->sum('jumlah') * $item->harga;
                        @endphp
                        <td>{{ \App\Helpers\Globals::rupiah($item->transaksiItems->sum('jumlah') * $item->harga) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="5">Total Pemasukan</td>
                    <td>{{ \App\Helpers\Globals::rupiah($totalPemasukan) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
