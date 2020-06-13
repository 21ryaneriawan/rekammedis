<style>
    .judul {
        text-align: center;
    }

    .klinik{
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
    <h2><?= $title ?></h2>
</div>
<table width="100%" border="1" cellspacing="0">
    <tr align="center">
        <th width="1%">No.</th>
        <th width="20%">No Rekam Medis</th>
        <th width="20%">Nama Pasien</th>
        <th width="10%">Umur</th>
        <th width="25%">Alamat</th>
        <th>Tanggal Masuk</th>
    </tr>
    <?php foreach ($item as $i) { ?>
        <tr>
            <td align="center"><?= $i['nomor'] ?></td>
            <td><?= $i['no_medis'] ?></td>
            <td><?= $i['nama_pasien'] ?></td>
            <td align="center"><?= $i['umur'] ?></td>
            <td><?= $i['alamat'] ?></td>
            <td><?= $i['tanggal_masuk'] ?></td>
        </tr>
    <?php } ?>
</table>