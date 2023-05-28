<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <title>Hello, world!</title>
  <style>
    button,
    input[type=reset] {
      font-family: sans-serif;
      font-size: 15px;
      background: #22a4cf;
      color: white;
      border: white 3px solid;
      border-radius: 5px;
      padding: 12px 20px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row" style="background-color: #00004d;">
      <div class="col p-3" style="color: white">
        <h1>Form Sederhana</h1>
      </div>
    </div>
    <br>
    <div class="row">
      <!--
        jangan lupa untuk mengganti name="" sesuai kebutuhan inputan
      -->
      <form action="index.php" method="post">
        <!-- setiap inputan gunakan block ini -->
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="email" required>
          </div>
        </div>
        <!-- sampai sini -->
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="nama" required>
          </div>
        </div>
        <!-- jika diminta menampilkan combo box dari array -->
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Hobi</label>
          <div class="col-sm-4">
            <select name="hobi" class="form-select" required>
              <option value="">--- Silahkan Pilih Hobi Anda ---</option>
              <?php
              $hobi = array('Renang', 'Membaca', 'Belajar', 'Nonton');
              sort($hobi);
              foreach ($hobi as $key => $value) {
                echo "<option value='$value'>$value</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="alamat" required>
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-4 offset-md-2">
            <input type="submit" class="btn btn-primary" name="submit" value="submit">
            <!-- <input type="reset" name="reset"> -->
          </div>
        </div>
      </form>
    </div>
    <hr>

    <!-- jika diminta menampilkan isian dari data yang disubmit -->
    <?php
    if (isset($_POST['submit'])) {
      // ambil nilai dari form
      $datas = array(
        'email' =>  $_POST['email'],
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'hobi' => $_POST['hobi']
      );

      $fileOpen = fopen("myfile.txt", 'w');
      foreach ($datas as $data) {
        fwrite($fileOpen, $data . "<br/>");
      }

      $getFile = file_get_contents("myfile.txt");

      echo $getFile;
      fclose($fileOpen);

      echo ('Menampilkan data dari file JSON');

      $datasJson = "data.json";
      $result = json_encode($datas, JSON_PRETTY_PRINT);
      file_put_contents($datasJson, $result);

      $getDataJson = file_get_contents($datasJson);
      $showData = json_decode($getDataJson, true);

    ?>
      <div>
        <div class="row">
          Email : <?= $showData['email']; ?>
        </div>
        <div class="row">
          Nama : <?= $showData['nama']; ?>
        </div>
        <div class="row">
          Alamat : <?= $showData['alamat']; ?>
        </div>
        <div class="row">
          Hobi : <?= $showData['hobi']; ?>
        </div>
      </div>
    <?php } ?>
      <script src="js/bootstrap.bundle.js"></script>
</body>

</html>