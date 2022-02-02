<?php
include "models/m_navbar.php";
$navbar = new Navbar ($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="alternate" direction="">
            <h1 class="m-0">Selamat Datang Direktori Navbar</h1>
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
              <h3 class="card-title">Data Navbar</h3>
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
                  <th>TITLE</th>
                  <th>SUBTITLE</th>
                  <th>BUTTON</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $navbar->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $no++ . ""; ?></td>
                    <td><?php echo $data->title; ?></td>
                    <td><?php echo $data->subtitle; ?></td>
                    <td><?php echo $data->button; ?></td>
                    <!-- <td> -->
                    <td width="20%"><img src="assets/img/foto/tmp-navbar/<?php echo $data->img; ?>" alt="" width="40%" class="img-thumbnail"></td>
                    <!-- </td> -->
                    <td align="center">
                    
                       <a href="" id="ubah_navbar" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id="<?php echo $data->id; ?>" data-title="<?php echo $data->title; ?>" data-subtitle="<?php echo $data->subtitle; ?>" data-button="<?php echo $data->button; ?>" data-img="<?php echo $data->img; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_navbar" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-id="<?php echo $data->id;?>" ><i class="fas fa-trash-alt"></i></a>
                 
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
        <h4 class="modal-title" >Tambah Data Navbar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="title" class="control-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="subtitle" class="control-label">SubTitle</label>
            <input type="text" name="subtitle" class="form-control" id="subtitle" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="button" class="control-label">Button</label>
            <input type="text" name="button" class="form-control" id="button" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="img" class="control-label">Foto</label>
            <input type="file" name="img" class="form-control" id="foto" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $title = $connection->conn->real_escape_string($_POST['title']);
          $subtitle = $connection->conn->real_escape_string($_POST['subtitle']);
          $button = $connection->conn->real_escape_string($_POST['button']);
          
          $extensi = explode(".", $_FILES['img']['name']);
          $namabaru = $title.".".end($extensi);
          $sumber = $_FILES['img']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-navbar/".$namabaru);
            if($upload) {
              $navbar->tambah($title,$subtitle,$button,$namabaru);
              header("location: ?page=navbar");
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
              <h4 class="modal-title">UBAH DATA NAVBAR</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="row my-2">
                  <div class="col-5">
                      <input type="hidden" name="id" id="id">
                      <label for="title" class="col-form-label">TITLE</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="title" id="title" class="form-control" placeholder="title" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="subtitle" class="col-form-label">SUBTITLE</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="subtitle" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="button" class="col-form-label">BUTTON</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="button" id="button" class="form-control" placeholder="button" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                <div class="col-5">
                  <label for="img" class="col-form-label">FOTO</label>
                  <div style="padding-bottom:5px; text-align: center;">
                    <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                  </div>
                </div>
                <div class="col-sm-7">
                  <input type="file" class="form-control" id="img" name="img">
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
            <input type="hidden" id="id" name="id">
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
        $id = $_POST['id'];
        if($id != ''){         
          
          $navbar->hapus($id);
          header('location: ?page=navbar');
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
  $(document).on('click','#hapus_navbar',function() {
    var id = $(this).data('id');

    $('#modalhapus #id').val(id);
    
  });

  $(document).on('click','#ubah_navbar', function(){
      var id = $(this).data('id');
      var title = $(this).data('title');
      var subtitle = $(this).data('subtitle');
      var button = $(this).data('button');
      var img = $(this).data('img');

      $('#modalubah #id').val(id);
      $('#modalubah #title').val(title);
      $('#modalubah #subtitle').val(subtitle);
      $('#modalubah #button').val(button);
      $('#modalubah #gambar').attr("src","assets/img/foto/tmp-navbar/"+img);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_navbar.php',
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
