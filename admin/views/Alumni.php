<?php
include "models/m_alumni.php";
$alumni = new Alumni($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="alternate" direction="">
            <h1 class="m-0">Selamat Datang Direktori Alumni</h1>
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
              <h3 class="card-title">Data Alumni</h3>
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
                  <th>NAMA</th>
                  <th>DESKRIPSI</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $alumni->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $no++ . ""; ?></td>
                    <td><?php echo $data->nm_al; ?></td>
                    <td><?php echo $data->desk_al; ?></td>
                    <!-- <td> -->
                    <td width="20%"><img src="assets/img/foto/tmp-alumni/<?php echo $data->foto_al; ?>" alt="" width="40%" class="img-thumbnail"></td>
                    <!-- </td> -->
                    <td align="center">
                    
                       <a href="" id="ubah_alumni" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_al="<?php echo $data->id_al; ?>" data-nm_al="<?php echo $data->nm_al; ?>" data-desk_al="<?php echo $data->desk_al; ?>" data-foto_al="<?php echo $data->foto_al; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_alumni" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-id_al="<?php echo $data->id_al;?>" ><i class="fas fa-trash-alt"></i></a>
                 
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
        <h4 class="modal-title" >Tambah Data Alumni</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="nm_al" class="control-label">Nama Alumni</label>
            <input type="text" name="nm_al" class="form-control" id="nm_al" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="desk_al" class="control-label">Deskripsi</label>
            <textarea rows="2" cols="50" class="form-control" id="desk_al" name="desk_al" required autocomplete="off"></textarea>
          </div>
          <div class="form-group">
            <label for="foto_al" class="control-label">Foto Alumni</label>
            <input type="file" name="foto_al" class="form-control" id="foto_al" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $nm_al = $connection->conn->real_escape_string($_POST['nm_al']);
          $desk_al = $connection->conn->real_escape_string($_POST['desk_al']);
          
          $extensi = explode(".", $_FILES['foto_al']['name']);
          $foto_al = "foto-".round(microtime(true)).".".end($extensi);
          $sumber = $_FILES['foto_al']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-alumni/".$foto_al);
            if($upload) {
              $alumni->tambah($nm_al,$desk_al,$foto_al);
              header("location: ?page=Alumni");
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
              <h4 class="modal-title">UBAH DATA ALUMNI</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="row my-2">
                  <div class="col-5">
                      <input type="hidden" name="id_al" id="id_al">
                      <label for="nm_al" class="col-form-label">NAMA ALUMNI</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="nm_al" id="nm_al" class="form-control" placeholder="Nama alumni" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="desk_al" class="col-form-label">DESKRIPSI</label>
                  </div>
                  <div class="col-7">
                  <textarea rows="2" cols="50" class="form-control" id="desk_al" name="desk_al" required autocomplete="off"></textarea>
                  </div>
              </div>
              <div class="row my-2">
                <div class="col-5">
                  <label for="foto_al" class="col-form-label">FOTO</label>
                  <div style="padding-bottom:5px; text-align: center;">
                    <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                  </div>
                </div>
                <div class="col-sm-7">
                  <input type="file" class="form-control" id="foto_al" name="foto_al">
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
            <input type="hidden" id="id_al" name="id_al">
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
        $id = $_POST['id_al'];
        if($id != ''){         
          
          $alumni->hapus($id);
          header('location: ?page=Alumni');
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
    var id_al = $(this).data('id_al');

    $('#modalhapus #id_al').val(id_al);
    
  });

  $(document).on('click','#ubah_alumni', function(){
      var id_al = $(this).data('id_al');
      var nm_al = $(this).data('nm_al');
      var desk_al = $(this).data('desk_al');
      var foto_al = $(this).data('foto_al');

      $('#modalubah #id_al').val(id_al);
      $('#modalubah #nm_al').val(nm_al);
      $('#modalubah #desk_al').val(desk_al);
      $('#modalubah #gambar').attr("src","assets/img/foto/tmp-alumni/"+foto_al);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_alumni.php',
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
