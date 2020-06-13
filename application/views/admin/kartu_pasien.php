<style>
    .judul {
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center
    }
</style>

<div class="judul">
    KARTU PASIEN<br>RUMAH SEHAT ERIADO
</div>
<hr>
<table>
    <?php foreach ($data_diri as $d) { ?>
        <tr>
            <th>Tanggal</th>
            <td style="padding-right: 4px;">:</td>
            <td><?= $d['tanggal_masuk'] ?></td>
        </tr>
        <tr style="padding-top: 3rem;">
            <th style="padding-right: 14px;">Nama/Umur</th>
            <td>:</td>
            <td><?= $d['nama_pasien'] . ' (' . $d['umur'] . ')' ?></td>
        </tr>
        <tr style="padding-top: 3rem;">
            <th>Alamat</th>
            <td>:</td>
            <td><?= $d['alamat'] ?></td>
        </tr>
    <?php } ?>
</table>
<table width="100%">
    <tr>
        <td width="80%">Keluhan :</td>
        <td>Tensi :</td>
    </tr>
    <?php foreach ($items as $i) { ?>
        <tr>
            <td><?= $i['diagnosa'] ?></td>
            <td><?= $i['tensi'] ?></td>
        </tr>
    <?php } ?>
</table>
<hr>
<table width="100%">
    <tr>
        <th>Terapi :</th>
    </tr>
    <?php foreach ($items as $i) { ?>
        <tr>
            <td colspan="2"><?= $i['terapi'] ?></td>
        </tr>
    <?php } ?>
</table>