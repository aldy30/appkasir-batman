<?php  

include_once "../fungsi/koneksi.php";

?>

<section class="content">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Tambah Data Biaya</h3>
                </div>
                <form method="post"  action="biaya_simpan.php" class="form-horizontal">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-2">
                            <a href="index.php?p=biaya" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali</a> 
                        </div>
                        <br><br>
                    </div>     
                    <div class="form-group ">
                        <label  class="col-sm-offset-1 col-sm-3 control-label">Jenis Kendaraan</label>
                        <div class="col-sm-4">
                            <input  required type="text"  class="form-control" name="jenis_kendaraan">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-sm-offset-1 col-sm-3 control-label">Harga</label>
                        <div class="col-sm-4">
                            <input  id="harga" type="text"  class="form-control" name="harga">
                        </div>
                    </div>                                                
                    <div class="form-group">
                        <input type="submit" name="simpan" id="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                        &nbsp;
                        <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
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


