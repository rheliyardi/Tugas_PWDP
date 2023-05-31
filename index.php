<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Guru SMK Negeri 2 Kuningan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
include('class/Database.php');
include('class/guru.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MENU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a href="index.php?file=guru&aksi=tampil" class="nav-link" href="index.php?file=guru&aksi=tampil">Data Guru</a>
        </li>
        <li class="nav-item">
        <a href="index.php?file=guru&aksi=tambah" class="nav-link" href="index.php?file=guru&aksi=tambah">Tambah Data Guru</a>
          
          </ul>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>

<h1>Aplikasi Data Guru</h1>
<hr/>

<hr/>
<?php
if(isset($_GET['file'])){
include($_GET['file'].'.php');
} else {
echo '<h1 align="center">Selamat Datang</h1>';
}
?>
</body>
</html>