<?php
include "models/m_siswa.php";
$siswa = new Siswa($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="alternate" direction="">
            <h1 class="m-0">Selamat Datang Direktori Siswa</h1>
            </marquee>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Jumlah Siswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="index.php?page=Siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
</section>


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
              <h3 class="card-title">Data Siswa</h3>
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
                  <th>INDUK</th>
                  <th>NAMA</th>
                  <th>JENIS KELAMIN</th>
                  <th>JURUSAN</th>
                  <th>KELAS</th>
                  <th>TAHUN</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $induk = 3997;
                $tampil = $siswa->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $induk++ . "";?></td>
                    <td><?php echo $data->nm_sw; ?></td>
                    <td><?php echo $data->jk_sw; ?></td>
                    <td><?php echo $data->jur_sw; ?></td>
                    <td><?php echo $data->kls_sw; ?></td>
                    <td><?php echo $data->th_sw; ?></td>
                    <td align="center">
                    
                       <a href="" id="ubah_guru" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-induk="<?php echo $data->induk; ?>" data-nm_sw="<?php echo $data->nm_sw; ?>" data-jk_sw="<?php echo $data->jk_sw; ?>" data-jur_sw="<?php echo $data->jur_sw; ?>" data-kls_sw="<?php echo $data->kls_sw; ?>" data-th_sw="<?php echo $data->th_sw; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_siswa" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-induk="<?php echo $data->induk;?>" ><i class="fas fa-trash-alt"></i></a>
                 
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
        <h4 class="modal-title" >Tambah Data Siswa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="nm_sw" class="control-label">Nama Siswa</label>
            <input type="text" name="nm_sw" class="form-control" id="nm_sw" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="jk_sw">Jenis Kelamin</label>
            <select name="jk_sw" id="" class="form-control">
              <option value="">~Pilih~</option>
              <option value="LAKI-LAKI">LAKI-LAKI</option>
              <option value="PEREMPUAN">PEREMPUAN</option>
            </select>
          </div>
          <div class="form-group">
            <label for="jur_sw">Jurusan</label>
            <select name="jur_sw" id="" class="form-control">
              <option value="">~Pilih~</option>
              <option value="MIA">MIA</option>
              <option value="IIS">IIS</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kls_sw" class="control-label">Kelas Siswa</label>
            <input type="text" name="kls_sw" class="form-control" id="kls_sw"  required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="th_sw" class="control-label">TAHUN</label>
            <input type="text" name="th_sw" class="form-control" id="th_sw"  required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $nm_sw = $connection->conn->real_escape_string($_POST['nm_sw']);
          $jk_sw = $connection->conn->real_escape_string($_POST['jk_sw']);
          $jur_sw = $connection->conn->real_escape_string($_POST['jur_sw']);
          $kls_sw = $connection->conn->real_escape_string($_POST['kls_sw']);
          $th_sw = $connection->conn->real_escape_string($_POST['th_sw']);
          
        //   $extensi = explode(".", $_FILES['foto_gr']['name']);
        //   $foto_gr = "foto-".round(microtime(true)).".".end($extensi);
        //   $sumber = $_FILES['foto_gr']['tmp_name'];
        //   $upload = move_uploaded_file($sumber, "assets/img/foto/".$foto_gr);
        //     if($upload) {
              $siswa->tambah($nm_sw,$jk_sw,$jur_sw,$kls_sw,$th_sw);
              header("location: ?page=Siswa");
            // }else {
            //   echo "<script>alert('Upload Gagal')</script>";
            // }
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
              <h4 class="modal-title">UBAH DATA SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-horizontal" id="form" enctype="multipart/form-data">
          <div class="modal-body">
              <div class="row my-2">
                  <div class="col-5">
                      <input type="hidden" name="induk" id="induk">
                      <label for="nm_sw" class="col-form-label">NAMA SISWA</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="nm_sw" id="nm_sw" class="form-control" placeholder="Nama Siswa" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="jk_sw" class="col-form-label">JENIS KELAMIN</label>
                  </div>
                  <div class="col-7">
                  <select name="jk_sw" id="jk_sw" class="form-control">
                    <option value="">~Pilih~</option>
                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                    <option value="PEREMPUAN">PEREMPUAN</option>
                  </select>
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="jur_sw" class="col-form-label">JURUSAN</label>
                  </div>
                  <div class="col-7">
                  <select name="jur_sw" id="jur_sw" class="form-control" placeholder="Jurusan">
                    <option value="">~Pilih~</option>
                    <option value="MIA">MIA</option>
                    <option value="IIS">IIS</option>
                  </select>
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="kls_sw" class="col-form-label">KELAS</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="kls_sw" id="kls_sw" class="form-control" placeholder="Kelas Siswa" required autocomplete="off" >
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="th_sw" class="col-form-label">TAHUN</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="th_sw" id="th_sw" class="form-control" placeholder="Tahun" required autocomplete="off">
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
            <input type="hidden" id="induk" name="induk">
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
        $induk = $_POST['induk'];
        if($induk != ''){         
          
          $siswa->hapus($induk);
          header('location: ?page=Siswa');
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
  $(document).on('click','#hapus_siswa',function() {
    var induk = $(this).data('induk');

    $('#modalhapus #induk').val(induk);
    
  });

  $(document).on('click','#ubah_guru', function(){
      var induk = $(this).data('induk');
      var nm_sw = $(this).data('nm_sw');
      var jk_sw = $(this).data('jk_sw');
      var jur_sw = $(this).data('jur_sw');
      var kls_sw = $(this).data('kls_sw');
      var th_sw = $(this).data('th_sw');

      $('#modalubah #induk').val(induk);
      $('#modalubah #nm_sw').val(nm_sw);
      $('#modalubah #jk_sw').val(jk_sw);
      $('#modalubah #jur_sw').val(jur_sw);
      $('#modalubah #kls_sw').val(kls_sw);
      $('#modalubah #th_sw').val(th_sw);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_siswa.php',
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
