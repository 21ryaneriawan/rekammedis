<style>
    .judul {
        text-align: center;
    }

    .klinik {
        font-size: 24px;
        font-weight: 800;
    }
</style>

<div class="judul">
    <div class="klinik">
        KLINIK RUMAH SEHAT ERIADIO <br>
    </div>
    Jl. Ciderum, Kec. Caringin, Bogor, Jawa Barat <br>
    Telp : (+62) 251 8240975
</div>
<hr>
<div class="judul">
    <h3><?= $title ?></h3>
</div>
<table width="100%" border="1" cellspacing="0">
    <tr align="center">
        <th width="1%">No.</th>
        <th width="13%">Kode Obat</th>
        <th width="30%">Nama Obat</th>
        <th width="13%">Kategori</th>
        <th width="7%">Stok</th>
        <th width="13%">Satuan</th>
        <th>Tanggal Masuk</th>
    </tr>
    <?php foreach ($item as $i) { ?>
        <tr>
            <td><?= $i['nomor'] ?></td>
            <td><?= $i['kode_obat'] ?></td>
            <td><?= $i['nama_obat'] ?></td>
            <td><?= $i['kategori'] ?></td>
            <td align="center"><?= $i['stok'] ?></td>
            <td><?= $i['satuan'] ?></td>
            <td><?= $i['tanggal_masuk'] ?></td>
        </tr>
    <?php } ?>
</table>