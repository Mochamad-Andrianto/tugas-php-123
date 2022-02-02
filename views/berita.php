<?php
require_once ('../admin/config/koneksi.php');
require_once ('../admin/models/database.php');

$connection = new database($host, $user, $pass, $database);
include '../admin/models/m_berita.php';
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="widht=device-widht, initial-scales=1.0">
        <title>SMA YAYASAN PANDAAN</title>
        <!-- bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <!-- font awesome / icon -->
        <link rel="stylesheet" href="../fontawesome/css/all.min.css">
        <!-- style css custom -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- logo / icon -->
        <link rel="shortcut icon" href="../img/sma.png">
        
    </head>
 <body>

    <section id="topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<ul class="top-contact">
						<li><a href=""><i class="fas fa-phone"></i> (0343) 631185</a></li>
						<li><a href=""><i class="fas fa-envelope"></i> smayayasanpandaan@gmail.com</a></li>
						<li><a href=""><i class="fas fa-bullhorn"></i> PENDAFTARAN TA 2022/2023 TELAH DIBUKA!</a></li>
					</ul>
				</div>
				<div class="col-md-2">
					<ul class="sosmed">
						<li><a href="https://www.facebook.com/smayanda.smayanda.9"><i class="fab fa-facebook"></i></a></li>
						<li><a href="https://www.instagram.com/smayandaa/"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+6282333170320&text=Hallo%20Admin%20"><i class="fab fa-whatsapp"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

    <header>
       <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="brand">
                        <img src="../img/sma.jpg" alt="" width="8%" height="5%">
                        <div class="brand-name">
                            <h1>SMA YAYASAN PANDAAN</h1>
                            <h3>Program Unggulan Praktek Kerja Lapangan</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pembungkus-searhbox">
                    <div class="searchbox">
                        <form method="get">
                           <div class="input-group">
                               <input class="form-control" type="text" name="cari" placeholder="Cari Sesuatu..." aria-label="Tombol Cari" aria-describedby="tombol-cari">
                             <div class="input-group-append">
                               <button class="btn btn-utama" id="tombol-cari">Cari</button>
                             </div> 
                           </div>
                        </form>
                    </div> 
                </div> <!--.col-md-8-->
            </div> <!--.row-->
       </div> <!--.container-->
    </header>

    <!-- Section Menu-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-biru ">
       <div class="container">
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="#sambutan">Profil Sekolah</a>
                            <a class="dropdown-item" href="https://goo.gl/maps/W7Z666jVyyKLBzkv6">Peta Sekolah</a>
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sarana & Prasarana</a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="#tenaga-pendidik">Sarana Pembelajaran</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ekstrakulikuler">Ekstrakulikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Galeri</a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="#galeri">Galeri Foto</a>
                            <a class="dropdown-item" href="#alumni">Profil Alumni</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">kontak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Log-In</a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="../admin/login/index.php">Admin</a>
                        </div>
                    </li>
                </ul>
            </div>
       </div><!--.container-->
    </nav>

    <section id="berita">
        <div class="container">
            <div class="section-title">
                <h2>Berita Terbaru</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <?php 
                    $berita = new Berita ($connection);
                    $m_berita = $berita->tampil2();
                    while($dt_berita = $m_berita->fetch_object()) {
                    ?>
                    <div class="col-md-4">
                        <div class="section-thumbnail">
                            <img src="../admin/assets/img/foto/tmp-brita/<?= $dt_berita->foto_br; ?>" alt="">
                            <div class="tanggal">
                                <span class="tgl"><?= $dt_berita->tgl_br; ?></span>
                                <!-- <span class="bln">Des, 2020</span> -->
                            </div>
                        </div>
                        <div class="section-content">
                            <a href=""><h3><?= $dt_berita->jd_br; ?></h3></a>
                            
                            <p><?= substr($dt_berita->ket_br,0,60); ?>
                                <span id="dots">[...]</span>
                                <div id="more">
                                    <p><?= $dt_berita->ket_br; ?></p>
                                </div>
                            </p>
                        <!-- </div> -->
                        <div class="section-meta">
                            <a href="../detail.php?id_br=<?php echo $dt_berita->id_br?>" class="btn btn-class" onclick="readmore()">Read Mores</a>
                            <!-- <a class="btn btn-class" onclick="readmore()" id="btn">Read More</a> -->
                            <!-- <a href="#"><i class="fas fa-user"></i> Admin</a> -->
                        </div>
                        
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="section-thumbnail">
                            <img src="img/p1.jpg" alt="">
                            <div class="tanggal">
                                <span class="tgl">14</span>
                                <span class="bln">Des, 2020</span>
                            </div>
                        </div>
                        <div class="section-content">
                            <a href=""><h3>Dewan Kerja Ambalan didirikan pada tanggal 14 Desember 2020</h3></a>
                            <p>Kegiatan Kepramukaan ini di bina oleh Kak Salam dan Kak Khusnul
                                dengan jumlah anggota 50. dan telah diseleksi<a href="" class="more"> [...]</a>
                            </p>
                        </div>
                        <div class="section-meta">
                            <a href="">Kegiatan</a>
                            <a href=""><i class="fas fa-user"></i> Admin</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-thumbnail">
                            <img src="img/p1.jpg" alt="">
                            <div class="tanggal">
                                <span class="tgl">14</span>
                                <span class="bln">Des, 2020</span>
                            </div>
                        </div>
                        <div class="section-content">
                            <a href=""><h3>Dewan Kerja Ambalan didirikan pada tanggal 14 Desember 2020</h3></a>
                            <p>Kegiatan Kepramukaan ini di bina oleh Kak Salam dan Kak Khusnul
                                dengan jumlah anggota 50. dan telah diseleksi<a href="" class="more"> [...]</a>
                            </p>
                        </div>
                        <div class="section-meta">
                            <a href="">Kegiatan</a>
                            <a href=""><i class="fas fa-user"></i> Admin</a>
                        </div>
                    </div> -->
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="tombol-selengkapnya">
                <a href="../index.php" class="btn btn-more guru">Kembali</a>
            </div>
        </div>
    </section>






    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 </body>
</html>