<?php  
include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";

?>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="text-center">Data Transaksi</h3>
        </div>                
        <div class="box-body">
          <div class="row">
            <div class="col-md-2">
              <a href="index.php?p=transaksi_tambah" class=" btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi</a> 
            </div>
            <br><br>
          </div>                  
          <div class="table-responsive">
            <table class="table text-center" id="user">
             <thead  > 
              <tr>
               <th>No</th>
               <th>No.Nota</th>	                					              				
               <th>Nama Pelanggan</th>
               <th>Tanggal</th>
               <th>User</th>
               <th>Aksi</th>


             </tr>
           </thead>
           <tbody>
            <tr>
             <?php 
            $query = "SELECT a.id_transaksi, a.no_nota, a.bayar, a.kembali, a.nama_plg, a.tanggal, c.username as id_user FROM transaksi a 
             LEFT JOIN user c ON c.id_user = a.id_user 
             WHERE a.id_transaksi ";
             $result = mysqli_query($koneksi, $query);
             $no =1 ;
             if (mysqli_num_rows($result)) {
               while($row=mysqli_fetch_assoc($result)):

                ?>
                <td> <?= $no; ?> </td>
                <td> <?= $row['no_nota']; ?> </td>
                <td> <?= $row['nama_plg']; ?> </td>    
                <td> <?= tanggal_indo($row['tanggal']); ?> </td> 
                <td> <?= $row['id_user']; ?> </td>
                <td> 

                  <a target="_blank" href="cetak_nota.php?&no_nota=<?= $row['no_nota']; ?>"><span data-placement='top' data-toggle='tooltip' title='Cetak'><button class="btn btn-success"><i class="fa fa-print"> Cetak</i></button></span></a> 
                </td>


              </tr>

              <?php $no++; endwhile; } ?>
            </tbody>
          </table>
        </div>                	
      </div>
    </div>
  </div>
</div>

</section>

<script>
  $(function(){
    $("#user").DataTable({
     "language": {
      "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
      "sEmptyTable": "Tidak ada data di database"
    }
  });
  });
</script> 
