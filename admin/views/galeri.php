<?php
include "models/m_galeri.php";
$galeri = new Galeri ($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="alternate" direction="">
            <h1 class="m-0">Selamat Datang Direktori Galeri</h1>
            </marquee>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="col">
              <h3 class="card-title">Data Galeri</h3>
            </div>
            <div class="col text-right">
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambah" >Tambah</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="pesan"></div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>JUDUL</th>
                  <th>TEMPAT</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $galeri->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $no++ . ""; ?></td>
                    <td><?php echo $data->jd_gal; ?></td>
                    <td><?php echo $data->tmp_gal; ?></td>
                    <!-- <td> -->
                    <td width="20%"><img src="assets/img/foto/tmp-galeri/<?php echo $data->foto_gal; ?>" alt="" width="40%" class="img-thumbnail"></td>
                    <!-- </td> -->
                    <td align="center">
                    
                       <a href="" id="ubah_alumni" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_gal="<?php echo $data->id_gal; ?>" data-jd_gal="<?php echo $data->jd_gal; ?>" data-tmp_gal="<?php echo $data->tmp_gal; ?>" data-foto_gal="<?php echo $data->foto_gal; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_alumni" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-id_gal="<?php echo $data->id_gal;?>" ><i class="fas fa-trash-alt"></i></a>
                 
                      <!-- <button class="btn btn-danger btn-xs">Delete</button>
                      <button class="btn btn-primary btn-xs">Edit</button> -->
                    </td>
                  </tr> 
                 <?php
                }?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>
<!-- Modals -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Tambah Data Galeri</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="jd_gal" class="control-label">Judul</label>
            <input type="text" name="jd_gal" class="form-control" id="jd_gal" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tmp_gal" class="control-label">Tempat</label>
            <textarea rows="2" cols="50" class="form-control" id="tmp_gal" name="tmp_gal" required autocomplete="off"></textarea>
          </div>
          <div class="form-group">
            <label for="foto_gal" class="control-label">Foto</label>
            <input type="file" name="foto_gal" class="form-control" id="foto_gal" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $jd_gal = $connection->conn->real_escape_string($_POST['jd_gal']);
          $tmp_gal = $connection->conn->real_escape_string($_POST['tmp_gal']);
          
          $extensi = explode(".", $_FILES['foto_gal']['name']);
          $namabaru = $jd_gal.".".end($extensi);
          $sumber = $_FILES['foto_gal']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-galeri/".$namabaru);
            if($upload) {
              $galeri->tambah($jd_gal,$tmp_gal,$namabaru);
              header("location: ?page=Galeri");
            }else {
              echo "<script>alert('Upload Gagal')</script>";
            }
        }
      ?>
    </div>
  </div>
</div>
<!-- akhir Modals -->
<!-- Modal Ubah -->
<div class="modal fade" id="modalubah">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">UBAH DATA GALERI</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="row my-2">
                  <div class="col-5">
                      <input type="hidden" name="id_gal" id="id_gal">
                      <label for="jd_gal" class="col-form-label">JUDUL</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="jd_gal" id="jd_gal" class="form-control" placeholder="Nama galeri" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="tmp_gal" class="col-form-label">TEMPAT</label>
                  </div>
                  <div class="col-7">
                  <textarea rows="2" cols="50" class="form-control" id="tmp_gal" name="tmp_gal" required autocomplete="off"></textarea>
                  </div>
              </div>
              <div class="row my-2">
                <div class="col-5">
                  <label for="foto_gal" class="col-form-label">FOTO</label>
                  <div style="padding-bottom:5px; text-align: center;">
                    <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                  </div>
                </div>
                <div class="col-sm-7">
                  <input type="file" class="form-control" id="foto_gal" name="foto_gal">
                </div>
            </div>     
          </div>
              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="ubah">Simpan Perubahan</button>
          </div>
          </form>
      </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Tutup Modal Ubah -->


<!-- modal Hapus -->

<div class="modal fade" id="modalhapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" id="id_gal" name="id_gal">
            <p>Apakah data dihapus... ?</p>           
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-primary">Hapus</button>
        </div>
      </form>
      </form>
      <?php
      if (isset($_POST['hapus'])) {
        $id = $_POST['id_gal'];
        if($id != ''){         
          
          $galeri->hapus($id);
          header('location: ?page=Galeri');
        }else {
          echo "<script>alert('Hapus Gagal Broo..!')</script>";
        }          
      }
      ?>
    </div>
  </div>
</div>
<!-- end data -->


<!-- Jquery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).on('click','#hapus_alumni',function() {
    var id_gal = $(this).data('id_gal');

    $('#modalhapus #id_gal').val(id_gal);
    
  });

  $(document).on('click','#ubah_alumni', function(){
      var id_gal = $(this).data('id_gal');
      var jd_gal = $(this).data('jd_gal');
      var tmp_gal = $(this).data('tmp_gal');
      var foto_gal = $(this).data('foto_gal');

      $('#modalubah #id_gal').val(id_gal);
      $('#modalubah #jd_gal').val(jd_gal);
      $('#modalubah #tmp_gal').val(tmp_gal);
      $('#modalubah #gambar').attr("src","assets/img/foto/tmp-galeri/"+foto_gal);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_galeri.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(pesan){
          $('.table').html(pesan);
        }
      })
    })
    )
  });

  </script>
