<?php 

include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";


$tanggala=$_POST['tanggala'];
$tanggalb=$_POST['tanggalb'];


?>
<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
  
</style>
<!-- Setting Margin header/ kop -->
<!-- Setting CSS Tabel data yang akan ditampilkan -->
<style type="text/css">
 .tabel2 {
  border-collapse: collapse;
  width: 1100px;
  
}
.tabel2 th, .tabel2 td {
  padding: 5px 5px;
  border: 1px solid #000;
}


div.tengah {
 position: absolute;
 bottom: 100px;
 right: 330px;
 
}

</style>
<table>
  <tr>

    <td align="left" style="width: 1350px;"><font style="font-size: 18px"><b>GET CUCI STEAM</b></font>
     <br>Jl. Haji Mean Raya No.47 </td>
      
    </tr>
  </table>
  <hr>
  <p align="left" style="font-weight: bold; font-size: 18px;"><u>LAPORAN PEMASUKAN</u></p>

  <div class="isi" style="margin: 0 auto;">
    Periode :<?=  tanggal_indo($tanggala); ?> S/d <?= tanggal_indo($tanggalb);?>
    <br>
    <br>
    <table class="tabel2">
      <thead>
        <tr>
          <td style="text-align: center; width:10px; font-size: 12px;"><b>No.</b></td>        
          <td style="text-align: center; width:90px; font-size: 12px;"><b>No.Nota</b></td>
          <td style="text-align: center; width:100px;font-size: 12px;"><b>Jenis Kendaraan</b></td>
          <td style="text-align: center; width:50px; font-size: 12px;"><b>Harga</b></td>
          <td style="text-align: center; width:50px; font-size: 12px;"><b>User</b></td>                                         
        </tr>
      </thead>
      <tbody>
        <?php
        include "../fungsi/koneksi.php";


        $query = mysqli_query($koneksi, "SELECT transaksi.id_transaksi, transaksi.no_nota, transaksi.id_biaya, transaksi.bayar, transaksi.kembali, transaksi.total, transaksi.nama_plg, transaksi.tanggal, transaksi.id_user, biaya.jenis_kendaraan, biaya.harga, user.username FROM transaksi 
          INNER JOIN biaya ON transaksi.id_biaya = biaya.id_biaya 
          INNER JOIN user ON transaksi.id_user = user.id_user
          ORDER BY tanggal BETWEEN '$tanggala' AND '$tanggalb'"); 
        $i   = 1; 
        while($data=mysqli_fetch_array($query))
        {
          ?>

          <tr>
            <td style="text-align: center; font-size: 12px;"><?php echo $i; ?></td>             
            <td style="text-align: center; font-size: 12px;"><?php echo $data['no_nota']; ?></td>
            <td style="text-align: left; font-size: 12px;"><?php echo $data['jenis_kendaraan']; ?></td>
            <td style="text-align: center; font-size: 12px;"><?php echo number_format($data['total']); ?></td>
            <td style="text-align: center; font-size: 12px;"><?php echo $data['username']; ?></td>
          </tr>
          <?php
          $i++;
        }
        ?>
      </tbody>
    </table> 
    <?php 

    $query2 = mysqli_query($koneksi, "SELECT SUM(total) FROM transaksi ORDER BY tanggal BETWEEN '$tanggala' AND '$tanggalb' ");  
    $data2 = mysqli_fetch_assoc($query2);

    ?>
    <table class="tabel2">
      <tr>
        <td style="text-align: center; width:718px;"><b>Sub Total</b></td>  
        <td style="text-align: center; "> <b> Rp.<?= number_format($data2['SUM(total)']); ?>.-</b></b></td>                                             
      </tr>
    </table>
  </div>