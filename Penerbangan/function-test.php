<?php

$kelasPenumpang = array("Ekonomi", "Bisnis", "Eksekutif");

$jumlahPenumpang =  0;
$jumlahPenumpangLansia =  0;
$total = 0;
$hargaTiket = 0;
$totalPenumpangLansia =0;

if (array_key_exists('hitungTotalBayar', $_POST)) {
  hitungTotalBayar();
} else if (array_key_exists('button2', $_POST)) {
  button2();
}


if (isset($_POST['hitungTotalBayar'])) {
  $jumlahPenumpang =  $_POST['jmlhPenumpang'];
  $jumlahPenumpangLansia =  $_POST['jmlhPenumpangLansia'];
  $kelasBus =  $_POST['kelasPenumpang'];
  if ($kelasBus == "Ekonomi") {
    $hargaTiket = 10000;
  } elseif ($kelasBus == "Bisnis") {
    $hargaTiket = 25000;
  } else {
    $hargaTiket = 50000;
  }
  $totalPenumpang = $jumlahPenumpang * $hargaTiket;
  $totalPenumpangLansia =  diskonLansia($jumlahPenumpangLansia, $hargaTiket);
  $total = $totalPenumpang + $totalPenumpangLansia;
}

function diskonLansia($jumlahPenumpang, $hargaTiket)
{
  return ($jumlahPenumpang * $hargaTiket) - $jumlahPenumpang * $hargaTiket * 0.1;
  
}

function hitungTotalBayar()
{
  echo "This is Button1 that is selected";
}
function button2()
{
  echo "This is Button2 that is selected";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="" method="post">
    <table width="700px">
      <tr>
        <td width="20%"><label>Nama Lengkap</label></td>
        <td>:</td>
        <td width="80%"><input type="text" name="nama" class="inputtext" placeholder="Nama Lengkap" required=""></td>
      </tr>
      <tr>
        <td width="20%"><label>Nomor Identitas</label></td>
        <td>:</td>
        <td width="80%"><input type="text" name="nomorIdentitas" class="inputtext" placeholder="Nomor Identitas" required=""></td>
      </tr>
      <tr>
        <td width="20%"><label>No. HP</label></td>
        <td>:</td>
        <td width="80%"><input type="text" name="noHp" class="inputtext" placeholder="No. HP" required=""></td>
      </tr>
      <tr>
        <td><label>Kelas Penumpang</label></td>
        <td>:</td>
        <td>
          <select name="kelasPenumpang">
            <?php
            foreach ($kelasPenumpang as $kp) {
              echo "<option value='" . $kp . "'>" . $kp . "</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td width="30%"><label>Jadwal Keberangkatan</label></td>
        <td>:</td>
        <td width="80%"><input type="date" name="jadwalKeberangkatan" class="inputtext" placeholder="Jadwal Keberangkatan" required=""></td>
      </tr>
      <tr>
        <td><label>Jumlah Penumpang</label><br>(Usia < 60)</td>
        <td>:</td>
        <td><input type="number" name="jmlhPenumpang" class="inputtext" placeholder="" required=""></td> <!-- Input Harga Tiket -->
      </tr>
      <tr>
        <td><label>Jumlah Penumpang Lansia</label><br>(Usia >= 60)</td>
        <td>:</td>
        <td><input type="number" name="jmlhPenumpangLansia" class="inputtext" placeholder="" required=""></td> <!-- Input Harga Tiket -->
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Submit" name="hitungTotalBayar"></td> <!-- Submit Form -->
      </tr>
    </table>
  </form>

  <h1>Total Penumpang : <?= $jumlahPenumpang ?></h1>
  <h1>Total Penumpang Lansia : <?= $jumlahPenumpangLansia ?></h1>
  <h1>Harga Tiket : <?= $hargaTiket ?></h1>
  <h1>Total Bayar : <?= $total ?></h1>
</body>

</html>