<?php
require_once ('admin/config/koneksi.php');
require_once ('admin/models/database.php');

$connection = new database($host, $user, $pass, $database);
include 'admin/models/m_alumni.php';
include 'admin/models/m_guru.php';
include 'admin/models/m_prestasi.php';
include 'admin/models/m_berita.php';
include 'admin/models/m_galeri.php';
include 'admin/models/m_navbar.php';
$operasi = new Alumni($connection);

?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="widht=device-widht, initial-scales=1.0">
        <title>SMA YAYASAN PANDAAN</title>
        <!-- bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- font awesome / icon -->
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <!-- style css custom -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Aos-Animate on scroll library -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- logo / icon -->
        <link rel="shortcut icon" href="img/sma.png">
        
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
                        <img src="img/sma.jpg" alt="" width="8%" height="5%">
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
                            <a class="dropdown-item" href="admin/login/index.php">Admin</a>
                        </div>
                    </li>
                </ul>
            </div>
       </div><!--.container-->
    </nav>

    <!-- section hero area-->
    <section id="hero-area">
        <div id="slider-hero-nav"></div>
            <div class="owl-carousel" id="slider-hero">
                    <?php 
                        $navbar = new Navbar ($connection);
                        $m_navbar = $navbar->tampil();
                        while($dt_navbar = $m_navbar->fetch_object()) {
                    ?>
                <div class="slider-item">
                    <div class="slider-item-img">
                        <img src="admin/assets/img/foto/tmp-navbar/<?= $dt_navbar->img; ?>" width="100%" height="100%" alt="">
                    </div>
                    <div class="slider-item-content">
                        <h2><?= $dt_navbar->title; ?></h2>
                        <p><?= $dt_navbar->subtitle; ?></p>
                        <a href="<?= $dt_navbar->button; ?>"><button class="btn btn-utama">Daftar PPDB</button></a>
                    </div>
                </div><!-- Slider-item-->
                    <?php
                        }
                    ?>
            </div>
    </section>

    <section id="sambutan">
        <div data-aos="fade-up" data-aos-duration="3000">
            <div class="container">            
                <h2>PROFIL SMA YAYASAN PANDAAN</h2>
                <div class="row">
                        <div class="col-md-6">
                            <div class="video-wrapper">
                                <img src="img/kepsek.jpeg" width="100%" height="50%" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3> Sambutan Kepala Sekolah</h3>
                            <p> Assalamu'alaikum wr. wb. 
                                Pada tahun 2045 merupakan target generasi emas yaitu generasi yang saat ini sedang mengenyam pendidikan dan diharapkan akan meraih kesuksesan di tahun 2045,
                                oleh karena itu perlu adanya usaha mempersiapkan generasi emas tersebut untuk menyelaraskan dengan perkembangan zaman. Pendidkan di SMA YAYASAN PANDAAN harus mampu persiapan generasi emas di tahun 2045 tersebut.
                                Dunia sekarang ini diharapkan dengan krisis karakter dimana kejahatan yang merajalera dimana-mana.</p>
                            <!-- <a href="views/sambutan.php" class="btn btn-utama">Baca Selengkapnya</a> -->
                        </div>
                </div>
                </div>
            </div>
    </section> <!-- #Sambutan -->

   <!-- Prestasi -->
    <section id="prestasi">
        <div class="container">
            <div class="section-title">
                <h2>Prestasi</h2>
            </div>
            <div data-aos="fade-left"
                data-aos-duration="3000">
                <?php 
                    $prestasi = new Prestasi ($connection);
                    $m_prestasi = $prestasi->tampil();
                    while($dt_prestasi = $m_prestasi->fetch_object()) {
                ?>
                <div class="section-item">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="section-item-thumbnail" src="admin/assets/img/foto/tmp-prestasi/<?= $dt_prestasi->foto_pres; ?>" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="section-item-title">
                                <h3><?= $dt_prestasi->judul; ?></h3>
                                <div class="section-item-meta">
                                    <span><i class="far fa-calendar-alt"></i><?= $dt_prestasi->tgl; ?></span>
                                    <span><i class="fas fa-map-marked-alt"></i><?= $dt_prestasi->tmp; ?></span>
                                </div>
                            </div>
                            <div class="section-item-body">
                                <p><?= $dt_prestasi->ket; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="tombol-selengkapnya">
                    <a href="views/prestasi.php" class="btn btn-more">Lihat Prestasi Lainnya</a>
                </div>
            </div>
        </div>    
    </section>

   <!-- Ekstrakulikuler -->
    <section id="ekstrakulikuler">
        <div class="container">
            <div class="section-title">
                <h2>Ekstrakulikuler</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-body-item">
                            <div class="row">
                                <div class="col-md-3">
                                <i class="far fa-user"></i>
                                </div>
                                <div class="col-md-9">
                                    <h4>Praja Muda Karana (PRAMUKA)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-body-item">
                            <div class="row">
                                <div class="col-md-3">
                                <i class="far fa-user"></i>
                                </div>
                                <div class="col-md-9">
                                    <h4>Pasukan Pengibar Bendera (PASKIB)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-body-item">
                            <div class="row">
                                <div class="col-md-3">
                                <i class="far fa-user"></i>
                                </div>
                                <div class="col-md-9">
                                    <h4>Polisi Keamanan Sekolah (PKS)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Tenaga Pendidik -->
    <section id="tenaga-pendidik">
        <div class="container">
            <div class="section-title">
                <h2>Tenaga Pendidik</h2>
            </div>
            <div class="section-body">
                <div id="slider-tools-1"></div>
                <div class="owl-carousel" id="tenaga-pendidik-slider">
                    <?php 
                        $guru = new Guru ($connection);
                        $m_guru = $guru->tampil();
                        while($dt_guru = $m_guru->fetch_object()) {
                    ?>
                    <div class="section-item-slider">
                        <img class="foto-guru" src="admin/assets/img/foto/tmp-guru/<?= $dt_guru->foto_gr; ?>" alt="">
                    <div class="section-item-caption">
                            <h5><?= $dt_guru->nm_gr; ?></h5>
                            <h6><?= $dt_guru->jb_gr; ?> <?= $dt_guru->mp_gr; ?></h6>
                    </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
                <!-- <div class="tombol-selengkapnya">
                    <a href="" class="btn btn-more guru">Lihat Semua Guru</a>
                </div> -->
        </div> 

    </section>

  <!-- Alumni -->
    <section id="alumni"> 
        <div class="container">
            <div class="section-title">
                <h2>Profil Alumni</h2>
            </div>
            <div class="section-body">
                <div id="slider-tools-2"></div>
                    <div class="owl-carousel" id="alumni-slider">
                        <?php
                            $result = $operasi->tampil();
                            while($data = $result->fetch_object()) {
                        ?>
                        <div class="section-item-slider">
                        <div class="row">
                                <div class="col-md-5">
                                    <img class="foto-alumni" src="admin/assets/img/foto/tmp-alumni/<?= $data->foto_al; ?>" alt="">
                                </div>
                                <div class="col-md-7">
                                    <div class="section-item-content">
                                        <a href=""><h3><?= $data->nm_al; ?></h3></a>
                                        <p><?= $data->desk_al; ?></p>
                                        <!-- <a href="" class="more">Selengkapnya <i class="fas fa-arrow-right"></i></a> -->
                                    </div>
                                </div>
                        </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Galeri / Dokumentasi -->
    <section id="galeri">
        <div class="container">
            <div class="section-title">
                <h2>Galeri / Dokumentasi</h2>
            </div>
            <div class="section-body">
                <div id="slider-tools-3"></div>
                <div class="owl-carousel" id="galeri-slider">
                        <?php 
                            $galeri = new Galeri ($connection);
                            $m_galeri = $galeri->tampil();
                            while($dt_galeri = $m_galeri->fetch_object()) {
                        ?>
                    <div class="section-item-slider">
                        
                            <img class="foto-galeri" src="admin/assets/img/foto/tmp-galeri/<?= $dt_galeri->foto_gal; ?>" alt="">
                        <div class="section-item-caption">
                                <h5><?= $dt_galeri->jd_gal; ?></h5>
                                <h6><?= $dt_galeri->tmp_gal; ?></h6>
                        </div>
                        
                    </div>
                    <!-- <div class="section-item-slider">
                            <img class="foto-galeri" src="img/p9.jpg" alt="">
                        <div class="section-item-caption">
                                <h5>paskibra</h5>
                                <h6>pasmayanda</h6>
                        </div>
                    </div>
                    <div class="section-item-slider">
                            <img class="foto-galeri" src="img/p8.jpg" alt="">
                        <div class="section-item-caption">
                                <a href=""><h5>pks</h5></a>
                                <a href=""><h6>smayanda</h6></a>
                        </div>
                    </div> -->
                        <?php 
                        }
                        ?>
                </div>
                </div>
                <!-- <div class="tombol-selengkapnya">
                    <a href="" class="btn btn-more guru">Lihat Galeri Lainnya</a>
                </div> -->
        </div> 
    </section>

  <!-- Berita Terbaru -->
    <section id="berita">
        <div class="container">
            <div class="section-title">
                <h2>Berita Terbaru</h2>
            </div>
            <div class="section-body">
                <div class="row">
                    <?php 
                    $berita = new Berita ($connection);
                    $m_berita = $berita->tampil();
                    while($dt_berita = $m_berita->fetch_object()) {
                    ?>
                    <div class="col-md-4">
                        <div class="section-thumbnail">
                            <img src="admin/assets/img/foto/tmp-brita/<?= $dt_berita->foto_br; ?>" alt="">
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
                        
                        <div class="section-meta">
                            <a href="detail.php?id_br=<?php echo $dt_berita->id_br?>" class="btn btn-class" onclick="readmore()">Read Mores</a>
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
                <a href="views/berita.php" class="btn btn-more guru">Lihat Berita Lainnya</a>
            </div>
        </div>
    </section>
   
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                <div class="footer-col">
                    <div class="brand">
                        <img src="img/logo-toga.png" alt="Logo">
                        <h1>SMA YAYASAN PANDAAN</h1>
                    </div>
                    <p class="tentang">Fenomena merebaknya anak jalanan di Kecamatan Pandaan merupakan persoalan sosial yang kompleks. 
                        hidup menjadi anak jalanan memang bukan merupakan pilihan yang menyenangkan, 
                        karena mereka berada dalam kondisi yang tidak bermasa depan jelas,
                        dan keberadaan mereka tidak jarang menjadi “Masalah” bagi banyak pihak baik bagi keluarga, 
                        masyarakat dan negara.</p>
                    <ul class="sosmed">
                        <li><a href="https://www.facebook.com/smayanda.smayanda.9"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/smayandaa/"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+6282333170320&text=Hallo%20Admin%20"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-col">
                        <h2>Kontak Kami</h2>
                        <p class="alamat">JL PAHLAWAN SUNARYO NO 2</p>
                        <ul class="kontak">
                            <li><i class="fas fa-phone"></i>  034363118 / 0343637250
                        </li>
                        <li><i class="fas fa-envelope"></i>Email : smayayasanpandaan@gmail.com
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-col">
                        <h2>Navigasi</h2>
                        <ul class="footer-nav">
                            <li><a href="#sambutan">Profil</a></li>
                            <li><a href="#">Visi dan Misi</a></li>
                            <li><a href="#">Struktur Organisasi</a></li>
                            <li><a href="#">Sumber Daya Manusia</a></li>
                            <li><a href="#">Pendaftaran PPDB 2023 <span>Info</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
            <div class="footer-copyright">
            <div class="container text-center">
                    <h6>Hak cipta dilindungi. © 2021 <a href="">smayanda.com</a></h6>
            </div>
            </div>
    </section>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        function readmore() {
            var dots = document.getElementById("dots");
            var moretext = document.getElementById('more');
            var btn = document.getElementById('btn');

            if(dots.style.display === "none") {
                dots.style.display = "inline";
                btn.innerHTML = "Read more";
                moretext.style.display = 'none';
            }else{
                dots.style.display = 'none';
                btn.innerHTML = "Read less";
                moretext.style.display = 'inline';
            }
        }
    </script>
 </body>
</html>