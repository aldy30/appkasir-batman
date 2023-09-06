<?php  
include "../fungsi/koneksi.php";

$error = "";
$query = mysqli_query($koneksi, "SELECT MAX(no_nota) from transaksi WHERE no_nota");
$id_transaksi = mysqli_fetch_array($query);    
if ($id_transaksi) {

    $nilaikode = substr($id_transaksi[0], 4);
    
    $kode = (int) $nilaikode;

            //setiap kode ditambah 1
    $kode = $kode + 1;
    $kode_otomatis = "111.".str_pad($kode, 3, "0", STR_PAD_LEFT);                   
    
    
} else {
    $kode_otomatis = "111001";
}

?>

<section class="content">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Input Transaksi</h3>

                </div>
                <form method="post"  action="transaksi_simpan.php" class="form-horizontal">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="index.php?p=transaksi" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali</a> 
                            </div>
                            <br><br>
                        </div>   
                        <div class="form-group ">
                            <label  class="col-sm-offset-1 col-sm-3 control-label">No.Nota</label>
                            <div class="col-sm-4">
                                <input type="text" value="<?= $kode_otomatis; ?>" class="form-control" name="no_nota" readonly>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-sm-offset-1 col-sm-3 control-label">Jenis Barang</label>
                            <div class="col-sm-5">
                                <select id="id_biaya" required="isikan dulu" class="form-control" name="id_biaya">
                                    <option value="">--Pilih Jenis Kendaraan--</option>
                                    <?php  
                                    include "../fungsi/koneksi.php";
                                    $queryJenis = mysqli_query($koneksi, "select * from biaya");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                            ?>                                        
                                            <option value="<?= $row['id_biaya']; ?>"><?= $row['jenis_kendaraan']; ?></option>
                                        <?php endwhile; } ?>                                      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total" class="col-sm-offset-1 col-sm-3 control-label">Harga </label>
                                <div class="col-sm-2">
                                    <input id="total"   type="text" class="form-control"  name="total" readonly>
                                </div>                                          
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-offset-1 col-sm-3 control-label">Bayar</label>
                                <div class="col-sm-2">
                                    <input  id="bayar" type="number" onkeyup="hitung();"  class="form-control" name="bayar" required>                                
                                </div>
                                <span class="col-sm-5"> <?php echo $error; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="kembali" class="col-sm-offset-1 col-sm-3 control-label">Kembali</label>
                                <div class="col-sm-4">
                                    <input  id="kembali" type="text" onkeyup="hitung();"   class="form-control" name="kembali">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-sm-offset-1 col-sm-3 control-label">Nama Pelanggan</label>
                                <div class="col-sm-4">
                                    <input  required type="text"  class="form-control" name="nama_plg">
                                </div>
                            </div>                                               
                            <div class="form-group">
                                <input type="submit" name="simpan" id="simpan" class="btn btn-primary col-sm-offset-4 " value="Approve" > 
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
        $(document).ready(function(){
            $("#id_biaya").change(function(){
                var kode = $(this).val();
                var dataString = 'kode='+kode;
                $.ajax({
                    type:"POST",
                    url:"getharga.php",
                    data:dataString,
                    success:function(html){
                        $("#total").val(html);        
                    }
                });
            });
        });


        var rupiah = document.getElementById("kembali");
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
    /* Fungsi formatRupiah */

    function hitung(){

        var bayar = Number(document.getElementById('bayar').value);
        var getharga = document.getElementById('total').value;
        var hargab = getharga.split(".").join("").split("Rp").join("");

        var  kembali = bayar - hargab;
        document.getElementById('kembali').value = kembali;

    }

    var rupiah1 = document.getElementById("kembali");
    rupiah1.addEventListener("keyup", function(e) {
        rupiah1.value = kembali(this.value, "Rp. ");
    });


    function kembali(angka, prefix) {
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

