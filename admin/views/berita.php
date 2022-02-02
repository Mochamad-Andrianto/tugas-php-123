<?php
include "models/m_berita.php";
$berita = new Berita ($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="" direction="">
            <h1 class="m-0">Selamat Datang Direktori Berita</h1>
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
              <h3 class="card-title">Data Berita</h3>
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
                  <th>TANGGAL</th>
                  <th>KETERANGAN</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $berita->tampil2();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $no++ . ""; ?></td>
                    <td><?php echo $data->jd_br; ?></td>
                    <td><?php echo $data->tgl_br; ?></td>
                    <td><?php echo $data->ket_br; ?></td>
                    <!-- <td> -->
                    <td width="20%"><img src="assets/img/foto/tmp-brita/<?php echo $data->foto_br; ?>" alt="" width="40%" class="img-thumbnail"></td>
                    <!-- </td> -->
                    <td align="center">
                    
                       <a href="" id="ubah_guru" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_br="<?php echo $data->id_br; ?>" data-jd_br="<?php echo $data->jd_br; ?>" data-tgl_br="<?php echo $data->tgl_br; ?>" data-ket_br="<?php echo $data->ket_br; ?>" data-foto_br="<?php echo $data->foto_br; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_guru" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-id_br="<?php echo $data->id_br;?>" ><i class="fas fa-trash-alt"></i></a>
                 
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
        <h4 class="modal-title" >Tambah Data Prestasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="jd_br" class="control-label">Judul</label>
            <input type="text" name="jd_br" class="form-control" id="jd_br" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tgl_br" class="control-label">Tanggal</label>
            <input type="date" name="tgl_br" class="form-control" id="tgl_br" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="ket_br" class="control-label">Keterangan</label>
            <textarea rows="2" cols="50" class="form-control" id="ket_br" name="ket_br" required autocomplete="off"></textarea>
          </div>
          <div class="form-group">
            <label for="foto_br" class="control-label">Foto</label>
            <input type="file" name="foto_br" class="form-control" id="foto" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $jd_br = $connection->conn->real_escape_string($_POST['jd_br']);
          $tgl_br = $connection->conn->real_escape_string($_POST['tgl_br']);
          $ket_br = $connection->conn->real_escape_string($_POST['ket_br']);
          
          $extensi = explode(".", $_FILES['foto_br']['name']);
          $namabaru = $jd_br.".".end($extensi);
          $sumber = $_FILES['foto_br']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-brita/".$namabaru);
            if($upload) {
              $berita->tambah($jd_br,$tgl_br,$ket_br,$namabaru);
              header("location: ?page=Berita");
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
              <h4 class="modal-title">UBAH DATA PRESTASI</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="row my-2">
                  <div class="col-5">
                      <input type="hidden" name="id_br" id="id_br">
                      <label for="jd_br" class="col-form-label">JUDUL</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="jd_br" id="jd_br" class="form-control" placeholder="Judul" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="tgl_br" class="col-form-label">TANGGAL</label>
                  </div>
                  <div class="col-7">
                  <input type="date" name="tgl_br" id="tgl_br" class="form-control" placeholder="Jabatan" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="ket_br" class="col-form-label">KETERANGAN</label>
                  </div>
                  <div class="col-7">
                  <textarea rows="2" cols="50" class="form-control" id="ket_br" name="ket_br" required autocomplete="off"></textarea>
                  </div>
              </div>
              <div class="row my-2">
                <div class="col-5">
                  <label for="foto_br" class="col-form-label">FOTO</label>
                  <div style="padding-bottom:5px; text-align: center;">
                    <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                  </div>
                </div>
                <div class="col-sm-7">
                  <input type="file" class="form-control" id="foto_br" name="foto_br">
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
            <input type="hidden" id="id_br" name="id_br">
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
        $id_br = $_POST['id_br'];
        if($id_br != ''){         
          
          $berita->hapus($id_br);
          header('location: ?page=Berita');
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
  $(document).on('click','#hapus_guru',function() {
    var id_br = $(this).data('id_br');

    $('#modalhapus #id_br').val(id_br);
    
  });

  $(document).on('click','#ubah_guru', function(){
      var id_br = $(this).data('id_br');
      var jd_br = $(this).data('jd_br');
      var tgl_br = $(this).data('tgl_br');
      var ket_br = $(this).data('ket_br');
      var foto_br = $(this).data('foto_br');

      $('#modalubah #id_br').val(id_br);
      $('#modalubah #jd_br').val(jd_br);
      $('#modalubah #tgl_br').val(tgl_br);
      $('#modalubah #ket_br').val(ket_br);
      $('#modalubah #gambar').attr("src","assets/img/foto/tmp-brita/"+foto_br);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_berita.php',
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
