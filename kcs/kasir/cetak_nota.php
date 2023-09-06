<?php 

include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";

$no_nota = $_GET['no_nota'];

?>
<!-- Setting CSS Tabel data yang akan ditampilkan -->
<style type="text/css">
  .tabelatas{

    margin-left: 5px;
    font-size: 12px;

  }
  .tabeltengah{

    margin-left: 5px;
    font-size: 12px;
  }
  .tabelkepala{
    width:310px;
    margin-left: 5px;
    font-size: 12px;

  }
  div.kiri {
   width:300px;
   float:left;
   margin-left:210px;
   margin-top:-10px;
   font-size: 12px;
 }
</style>
<br><br>

<table class="tabelkepala">
  <tr>
    <td style="text-align: center;"><b>KASIR CUCI STEAM </b></font>
      <br>Jl. Haji Mean Raya No.47 </td>
    </tr>
  </table>
  <hr>
  <?php 

 $query2 = mysqli_query($koneksi, "SELECT transaksi.id_transaksi, transaksi.no_nota, transaksi.id_biaya, transaksi.bayar, transaksi.kembali, transaksi.nama_plg, transaksi.tanggal, transaksi.id_user, biaya.jenis_kendaraan, biaya.harga, user.username FROM transaksi 
    INNER JOIN biaya ON transaksi.id_biaya = biaya.id_biaya 
    INNER JOIN user ON transaksi.id_user = user.id_user
    WHERE no_nota='$no_nota'");
  if ($query2){                
    $data = mysqli_fetch_assoc($query2);

  } else {
    echo 'gagal';
  }
  ?>

  <table class="tabelatas">

    <tr>
      <td style="text-align: left; width:250px;  ">20 Febuari 2021 </td>   
      <td style="text-align: right; ">Kasir :</td>       
    </tr>
    <tr>
      <td style="text-align: left;   ">No.Nota : <?= ($no_nota);?></td>   
      <td style="text-align: right; "><?= $data['username'] ?></td>       
    </tr>
  </table>
  <hr>
  <table class="tabeltengah">

    <tr>
      <td style="text-align: left; width:185px;  "><?= $data['jenis_kendaraan'] ?></td>   
      <td style="text-align: left; ">Harga &nbsp; &nbsp;  : Rp.<?php echo number_format($data['harga']); ?></td>       
    </tr>
    <tr>
      <td style="text-align: left; "></td>   
      <td style="text-align: right; ">Bayar &nbsp; &nbsp; &nbsp;:Rp.<?php echo number_format($data['bayar']); ?></td>       
    </tr>
  </table>
  <table class="tabeltengah">

    <tr>
      <td style="text-align: left; width:185px;  "></td>   
      <td style="text-align: left; ">Kembali : Rp.<?php echo number_format($data['kembali']); ?></td>       
    </tr>
    <tr>
      <td style="text-align: left; "></td>   
      <td style="text-align: right; "></td>       
    </tr>
  </table>

  
  
  <p style="margin-left: 10px; ">------------------- Terima Kasih -----------------</p>

  <!-- Memanggil fungsi bawaan HTML2PDF -->
