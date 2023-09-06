<?php  
	include "../fungsi/koneksi.php";
    //mengambil id untuk edit 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM biaya WHERE id_biaya = $id ");
		if (mysqli_num_rows($query)) {
			while($row2 = mysqli_fetch_assoc($query)):
?>

<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Edit Data Biaya</h3>
                </div>                
                <form method="post"  action="biaya_edit_proses.php" class="form-horizontal">
                    <div class="box-body">
                     <div class="row">
                        <div class="col-md-2">
                            <a href="index.php?p=biaya" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali</a> 
                        </div>
                        <br><br>
                    </div>     
                    	<input type="hidden" name="id" value="<?= $row2['id_biaya']; ?>">
                        <div class="form-group ">
                            <label  class="col-sm-offset-1 col-sm-3 control-label">Jenis Kendaraan</label>
                            <div class="col-sm-4">
                                <input type="text"  required value="<?= $row2['jenis_kendaraan']; ?>" class="form-control" name="jenis_kendaraan">
                            </div>
                        </div>
                         <div class="form-group ">
                            <label  class="col-sm-offset-1 col-sm-3 control-label">Harga</label>
                            <div class="col-sm-4">  
                                <input type="text" value="<?= $row2['harga'];  ?>" required  class="form-control" name="harga" id="harga">
                            </div>
                        </div>                  
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php endwhile; } }  ?>
<script>

    var rupiah = document.getElementById("harga");
    rupiah.addEventListener("keyup", function(e) {
        rupiah.value = currencyIdr(this.value, "Rp. ");
    });


    function currencyIdr(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split  = number_string.split(","),
      sisa   = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : "");
}

</script>
