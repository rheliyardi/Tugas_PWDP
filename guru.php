<?php
// membuat instance
$dataGuru=NEW Guru;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<h3>Daftar Guru</h3>';
$html .='<p>Berikut ini data guru SMK Negeri 2 Kuningan</p>';
$html .='<table class="table table-striped" border="1" width="100%">
<thead>
<th>No.</th>
<th>NIP</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>L/P</th>
<th>Alamat</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataGuru->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisGuru){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisGuru->nip.'</td>
<td>'.$barisGuru->nama.'</td=>
<td>'.$barisGuru->tempat_lahir.'</td>
<td>'.$barisGuru->tanggal_lahir.'</td>
<td>'.$barisGuru->jenis_kelamin.'</td>
<td>'.$barisGuru->alamat.'</td>
<td>
<a  class="btn btn-outline-dark"
href="index.php?file=guru&aksi=edit&nip='.$barisGuru->nip.'">Edit</a>

<a class="btn btn-outline-dark"
href="index.php?file=guru&aksi=hapus&nip='.$barisGuru->nip.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=guru&aksi=simpan">';
$html .='<p>Nomor Induk Pegawai<br/>';
$html .='<input type="text" name="txtNip"placeholder="Masukan No. Induk" autofocus/></p>';
$html .='<p>Nama Lengkap<br/>';
$html .='<input type="text" name="txtNama"placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Lahir<br/>';
$html .='<input type="text" name="txtTempatLahir"placeholder="Masukan Tempat Lahir" size="30" required/>,';
$html .='<input type="date" name="txtTanggalLahir"required/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin"value="L"> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin"value="P"> Perempuan</p>';
$html .='<p>Alamat Lengkap<br/>';
$html .='<textarea name="txtAlamat" placeholder="Masukan alamat lengkap" cols="50" rows="5" required></textarea></p>';
$html .='<p><input type="submit" class="btn btn-dark" name="tombolSimpan"value="Simpan"/></p>';

$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'nip'=>$_POST['txtNip'],
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tanggal_lahir'=>$_POST['txtTanggalLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'alamat'=>$_POST['txtAlamat']
);
// simpan siswa dengan menjalankan method simpan
$dataGuru->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=guru&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data guru
$guru=$dataGuru->detail($_GET['nip']);
if($guru->jenis_kelamin =='L') { $pilihL='checked';
    $pilihP =null; }
    else {
    $pilihP='checked'; $pilihL =null; }
    $html =null;
    $html .='<h3>Form Tambah</h3>';
    $html .='<p>Silahkan masukan form </p>';
    $html .='<form method="POST"action="index.php?file=guru&aksi=update">';
    $html .='<p>Nomor Induk Guru<br/>';
    $html .='<input type="text" name="txtNip"value="'.$guru->nip.'" placeholder="Masukan No. Induk"readonly/></p>';
    $html .='<p>Nama Lengkap<br/>';
    $html .='<input type="text" name="txtNama"value="'.$guru->nama.'" placeholder="Masukan Nama Lengkap"size="30" required autofocus/></p>';
    $html .='<p>Tempat, Tanggal Lahir<br/>';
    $html .='<input type="text" name="txtTempatLahir" value="'.$guru->tempat_lahir .'" placeholder="Masukan Tempat Lahir" size="30" required/>,';
    $html .='<input type="date" name="txtTanggalLahir"value="'.$guru->tanggal_lahir.'" required/></p>';
    $html .='<p>Jenis Kelamin<br/>';
    $html .='<input type="radio" name="txtJenisKelamin"value="L" '.$pilihL.'> Laki-laki';
    $html .='<input type="radio" name="txtJenisKelamin"value="P" '.$pilihP.'> Perempuan</p>';
    $html .='<p>Nama Lengkap<br/>';
    $html .='<textarea name="txtAlamat" placeholder="Masukan alamat lengkap" cols="50" rows="5"required>'.$guru->alamat.'</textarea></p>';
    $html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
    $html .='</form>';
    echo $html;
    }
    // aksi tambah data
    else if ($_GET['aksi']=='update') {
    $data=array(
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tanggal_lahir'=>$_POST['txtTanggalLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'alamat'=>$_POST['txtAlamat']);
$dataGuru->update($_POST['txtNip'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=guru&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataGuru->hapus($_GET['nip']);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=guru&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>