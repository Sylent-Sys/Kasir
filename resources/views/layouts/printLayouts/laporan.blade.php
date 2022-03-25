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
        @forelse ($data as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->menu->nama }}</td>
                <td>{{ $item->menu->stok }}</td>
                <td>{{ $item->sum_jumlah }}</td>
                <td>{{ \App\Helpers\Globals::rupiah($item->menu->harga) }}</td>
                @php
                    $totalPemasukan += $item->sum_jumlah * $item->menu->harga;
                @endphp
                <td>{{ \App\Helpers\Globals::rupiah($item->sum_jumlah * $item->menu->harga) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center fw-bold">Tidak ada data</td>
            </tr>
        @endforelse
        <tr>
            <td colspan="5">Total Pemasukan</td>
            <td>{{ \App\Helpers\Globals::rupiah($totalPemasukan) }}</td>
        </tr>
    </tbody>
</table>
