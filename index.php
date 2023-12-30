<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan</title>

<!-- custom css file link  -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="header">

<div class="flex">
   <a href="#home" class="logo">perpus</a>
</div>

<nav class="navbar">
   <a href="create_anggota.php">daftar</a>
   <a href="create_buku.php">daftar buku</a>
   <a href="create_peminjaman.php">peminjaman</a>
</nav>

</section>

<!-- halaman home mulai -->
<section class="home" id="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="box swiper-slide">
            <div class="flex">
               <h3>Perpus</h3>
               <a href="anggota.php" class="btn">daftar anggota</a>
            </div>
         </div>

         <div class="box swiper-slide">
            <div class="flex">
               <h3>buku</h3>
               <a href="buku.php" class="btn">daftar buku</a>
            </div>
         </div>

         <div class="box swiper-slide">
            <div class="flex">
               <h3>minjam</h3>
               <a href="peminjaman.php" class="btn">riwayat peminjaman</a>
            </div>
         </div>

      </div>


   </div>

</section>

  
</body>
</html>