<div class="container">
    <span id="remove">
        <a class="btn btn-success" id="ct"><span class="icon-print"></span> CETAK</a>
    </span>
</div>
<center>
    <h4>
        RESTORAN CEPAT SAJI
    </h4>
    <span>
        Jl. XXX No. XXX Ds. XXX, Kec. XXX, Kab. XXX, XXX<br>
        Telp. +628x xxx xxx xxx || E-mail exsample@gmail.com
    </span>
</center>
<table class="border border-end-0 border-start-0">
    <tr>
        <td>Nama Pelanggan &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;</td>
        <td>{{ $data->user->name }}</td>
    </tr>
    <tr>
        <td>Nama Kasir &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;</td>
        <td>{{ $data->pembayarans->user->name }}</td>
    </tr>
    <tr>
        <td>Waktu Pesan &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;</td>
        <td>{{ $data->created_at }}</td>
    </tr>
    <tr>
        <td>No Meja &nbsp;&nbsp;</td>
        <td>: &nbsp;&nbsp;</td>
        <td>{{ $data->no_meja }}</td>
    </tr>
</table>
<table class="mt-3 table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->transaksiItems()->get() as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->menu->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->harga }}</td>
                <td>{{ App\Helpers\Globals::rupiah($item->jumlah * $item->menu->harga) }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4">Total</td>
            <td>{{ App\Helpers\Globals::rupiah($data->total) }}</td>
        </tr>
        <tr>
            <td colspan="4">Uang Bayar</td>
            <td>{{ App\Helpers\Globals::rupiah($data->pembayarans->bayar) }}</td>
        </tr>
        <tr>
            <td colspan="4">Uang Kembali</td>
            <td>{{ App\Helpers\Globals::rupiah($data->pembayarans->kembalian) }}</td>
        </tr>
    </tbody>
</table>
<center class="border border-end-0 border-start-0">
    <h5 class="m-0 p-3">
        TERIMAKASIH ATAS KUNJUNGANNYA
    </h5>
</center>
