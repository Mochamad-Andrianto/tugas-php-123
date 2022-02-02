<?php
include "models/m_prestasi.php";
$prestasi = new Prestasi ($connection);
?>

 <!-- Content Header (Page header) -->
 <div class="content-header mt-5">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <marquee behavior="" direction="">
            <h1 class="m-0">Selamat Datang Direktori Prestasi</h1>
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
              <h3 class="card-title">Data Prestasi</h3>
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
                  <th>TEMPAT</th>
                  <th>KETERANGAN</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $prestasi->tampil2();
                while ($data = $tampil->fetch_object()) {
                ?>
              </thead>
              <tbody> 
                  <tr align="center">
                    <td><?php echo $no++ . ""; ?></td>
                    <td><?php echo $data->judul; ?></td>
                    <td><?php echo $data->tgl; ?></td>
                    <td><?php echo $data->tmp; ?></td>
                    <td><?php echo $data->ket; ?></td>
                    <!-- <td> -->
                    <td width="20%"><img src="assets/img/foto/tmp-prestasi/<?php echo $data->foto_pres; ?>" alt="" width="40%" class="img-thumbnail"></td>
                    <!-- </td> -->
                    <td align="center">
                    
                       <a href="" id="ubah_guru" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalubah" data-id="<?php echo $data->id; ?>" data-judul="<?php echo $data->judul; ?>" data-tgl="<?php echo $data->tgl; ?>" data-tmp="<?php echo $data->tmp; ?>" data-ket="<?php echo $data->ket; ?>" data-foto_pres="<?php echo $data->foto_pres; ?>"><i class="far fa-edit"></i></a>
                       <a href="" id="hapus_guru" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modalhapus" data-id="<?php echo $data->id;?>" ><i class="fas fa-trash-alt"></i></a>
                 
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
            <label for="judul" class="control-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tgl" class="control-label">Tanggal</label>
            <input type="date" name="tgl" class="form-control" id="tgl" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="tmp" class="control-label">Tempat</label>
            <input type="text" name="tmp" class="form-control" id="tmp" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="ket" class="control-label">Keterangan</label>
            <input type="text" name="ket" class="form-control" id="ket" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="foto_pres" class="control-label">Foto</label>
            <input type="file" name="foto_pres" class="form-control" id="foto" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Hapus</button>
          <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
      </form>
      <?php
        if(@$_POST['tambah']){
          $judul = $connection->conn->real_escape_string($_POST['judul']);
          $tgl = $connection->conn->real_escape_string($_POST['tgl']);
          $tmp = $connection->conn->real_escape_string($_POST['tmp']);
          $ket = $connection->conn->real_escape_string($_POST['ket']);
          
          $extensi = explode(".", $_FILES['foto_pres']['name']);
          $namabaru = $judul.".".end($extensi);
          $sumber = $_FILES['foto_pres']['tmp_name'];
          $upload = move_uploaded_file($sumber, "assets/img/foto/tmp-prestasi/".$namabaru);
            if($upload) {
              $prestasi->tambah($judul,$tgl,$tmp,$ket,$namabaru);
              header("location: ?page=Prestasi");
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
                      <input type="hidden" name="id" id="id">
                      <label for="judul" class="col-form-label">JUDUL</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="tgl" class="col-form-label">TANGGAL</label>
                  </div>
                  <div class="col-7">
                  <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Jabatan" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="tmp" class="col-form-label">TEMPAT</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="tmp" id="tmp" class="form-control" placeholder="Tempat" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                  <div class="col-5">
                      <label for="ket" class="col-form-label">KETERANGAN</label>
                  </div>
                  <div class="col-7">
                      <input type="text" name="ket" id="ket" class="form-control" placeholder="Keterangan" required autocomplete="off">
                  </div>
              </div>
              <div class="row my-2">
                <div class="col-5">
                  <label for="foto_pres" class="col-form-label">FOTO</label>
                  <div style="padding-bottom:5px; text-align: center;">
                    <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                  </div>
                </div>
                <div class="col-sm-7">
                  <input type="file" class="form-control" id="foto_pres" name="foto_pres">
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
          
          $prestasi->hapus($id);
          header('location: ?page=Prestasi');
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
    var id = $(this).data('id');

    $('#modalhapus #id').val(id);
    
  });

  $(document).on('click','#ubah_guru', function(){
      var id = $(this).data('id');
      var judul = $(this).data('judul');
      var tgl = $(this).data('tgl');
      var tmp = $(this).data('tmp');
      var ket = $(this).data('ket');
      var foto_pres = $(this).data('foto_pres');

      $('#modalubah #id').val(id);
      $('#modalubah #judul').val(judul);
      $('#modalubah #tgl').val(tgl);
      $('#modalubah #tmp').val(tmp);
      $('#modalubah #ket').val(ket);
      $('#modalubah #gambar').attr("src","assets/img/foto/tmp-prestasi/"+foto_pres);
  });
  $(document).ready(function(e){
    $('#form').on('submit', (function(e){
      e.preventDefault();
      $.ajax({
        url:'models/ubah_prestasi.php',
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
