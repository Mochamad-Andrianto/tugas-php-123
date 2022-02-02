<?php
include "models/m_guru.php";
$guru = new Guru($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="" direction="">
            <h1 class="m-0">Selamat Datang Direktori Guru</h1>
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
              <h3 class="card-title">Data Guru</h3>
            </div>
            <div class="col text-right">
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tambah" >Tambah</button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="pesan"></div>
            <table id="example1" class="table table-bordered table-striped" aria-describedby="example1_info">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>JABATAN</th>
                  <th>MATA PELAJARAN</th>
                  <th>KELAS</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $guru->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $no++ . ""; ?></td>
                    <td><?php echo $data->nm_gr; ?></td>
                    <td><?php echo $data->jb_gr; ?></td>
                    <td><?php echo $data->mp_gr; ?></td>
                    <td><?php echo $data->kls_gr; ?></td>
                    <!-- <td> -->
                    <td width="20%"><img src="assets/img/foto/tmp-guru/<?php echo $data->foto_gr; ?>" alt="" width="40%" class="img-thumbnail"></td>
                    <!-- </td> -->
                    <td align="center">
                    
                       <a href="" id="ubah_guru" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id_gr="<?php echo $data->id_gr; ?>" data-nm_gr="<?php echo $data->nm_gr; ?>" data-jb_gr="<?php echo $data->jb_gr; ?>" data-mp_gr="<?php echo $data->mp_gr; ?>" data-kls_gr="<?php echo $data->kls_gr; ?>" data-foto_gr="<?php echo $data->foto_gr; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_guru" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-id_gr="<?php echo $data->id_gr;?>" ><i class="fas fa-trash-alt"></i></a>
                 
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
        <h4 class="modal-title" >Tambah Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="nm_gr" class="control-label">Nama Guru</label>
            <input type="text" name="nm_gr" class="form-control" id="nm_gr" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="jb_gr">Jabatan</label>
            <select name="jb_gr" id="" class="form-control">
              <option value="">~Pilih~</option>
              <option value="KEPALA SEKOLAH">KEPALA SEKOLAH</option>
              <option value="WAKIL KEPALA SEKOLAH">WAKIL KEPALA SEKOLAH</option>
              <option value="GURU">GURU</option>
              <option value="TATA USAHA">TATA USAHA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="mp_gr" class="control-label">Mata Pelajaran</label>
            <input type="text" name="mp_gr" class="form-control" id="mp_gr" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="kls_gr" class="control-label">Kelas</label>
            <input type="text" name="kls_gr" class="form-control" id="kls_gr" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="foto_gr" class="control-label">Foto Guru</label>
            <input type="file" name="foto_gr" class="form-control" id="foto_gr" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $nm_gr = $connection->conn->real_escape_string($_POST['nm_gr']);
          $jb_gr = $connection->conn->real_escape_string($_POST['jb_gr']);
          $mp_gr = $connection->conn->real_escape_string($_POST['mp_gr']);
          $kls_gr = $connection->conn->real_escape_string($_POST['kls_gr']);
          
          $extensi = explode(".", $_FILES['foto_gr']['name']);
          $foto_gr = "foto-".round(microtime(true)).".".end($extensi);
          $sumber = $_FILES['foto_gr']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-guru/".$foto_gr);
            if($upload) {
              $guru->tambah($nm_gr,$jb_gr,$mp_gr,$kls_gr,$foto_gr);
              header("location: ?page=guru");
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
              <h4 class="modal-title">UBAH DATA GURU</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="row my-2">
                  <div class="col-5">
                      <input type="hidden" name="id_gr" id="id_gr">
                      <label for="nm_gr" class="col-form-label">NAMA GURU</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="nm_gr" id="nm_gr" class="form-control" placeholder="Nama guru" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="jb_gr" class="col-form-label">JABATAN</label>
                  </div>
                  <div class="col-7">
                  <select name="jb_gr" id="jb_gr" class="form-control">
              <option value="">~Pilih~</option>
              <option value="KEPALA SEKOLAH">KEPALA SEKOLAH</option>
              <option value="WAKIL KEPALA SEKOLAH">WAKIL KEPALA SEKOLAH</option>
              <option value="GURU">GURU</option>
              <option value="TATA USAHA">TATA USAHA</option>
            </select>
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="mp_gr" class="col-form-label">MATA PELAJARAN</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="mp_gr" id="mp_gr" class="form-control" placeholder="Mata Pelajaran" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="kls_gr" class="col-form-label">KELAS</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="kls_gr" id="kls_gr" class="form-control" placeholder="Kelas" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                <div class="col-5">
                  <label for="foto_gr" class="col-form-label">FOTO</label>
                  <div style="padding-bottom:5px; text-align: center;">
                    <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                  </div>
                </div>
                <div class="col-sm-7">
                  <input type="file" class="form-control" id="foto_gr" name="foto_gr">
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
            <input type="hidden" id="id_gr" name="id_gr">
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
        $id = $_POST['id_gr'];
        if($id != ''){         
          
          $guru->hapus($id);
          header('location: ?page=guru');
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
    var id_gr = $(this).data('id_gr');

    $('#modalhapus #id_gr').val(id_gr);
    
  });

  $(document).on('click','#ubah_guru', function(){
      var id_gr = $(this).data('id_gr');
      var nm_gr = $(this).data('nm_gr');
      var jb_gr = $(this).data('jb_gr');
      var mp_gr = $(this).data('mp_gr');
      var kls_gr = $(this).data('kls_gr');
      var foto_gr = $(this).data('foto_gr');

      $('#modalubah #id_gr').val(id_gr);
      $('#modalubah #nm_gr').val(nm_gr);
      $('#modalubah #jb_gr').val(jb_gr);
      $('#modalubah #mp_gr').val(mp_gr);
      $('#modalubah #kls_gr').val(kls_gr);
      $('#modalubah #gambar').attr("src","assets/img/foto/tmp-guru/"+foto_gr);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_guru.php',
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
