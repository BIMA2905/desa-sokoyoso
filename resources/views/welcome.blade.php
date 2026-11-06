<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemerintah Desa Sokoyoso</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
  /* Sembunyikan tombol hamburger di desktop */
  .menu-toggle {
      display: none;
      cursor: pointer;
      flex-direction: column;
      justify-content: space-between;
      width: 28px;
      height: 20px;
  }
  .menu-toggle span {
      display: block;
      height: 3px;
      width: 100%;
      background-color: #ffffff;
      border-radius: 3px;
      transition: all 0.3s ease;
  }

  /* Pengaturan Mobile Menu */
  @media (max-width: 950px) {
    
    .navbar {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: center !important;
        position: relative !important;
        padding: 15px 20px !important;
    }

    
    .navbar .logo {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
    }

    
    .menu-toggle {
        display: flex !important;
    }

    
    .navbar .menu {
        display: none !important;
        flex-direction: column !important;
        position: absolute !important;
        top: 100% !important; 
        right: 20px !important;
        width: 200px !important;
        background-color: #004d40 !important;
        border-radius: 12px !important;
        padding: 10px 0 !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3) !important;
        text-align: left !important;
        z-index: 9999 !important;
    }


    .navbar .menu.active {
        display: flex !important;
    }

    .navbar .menu li {
        margin: 0 !important;
        width: 100% !important;
    }

    .navbar .menu li a {
        display: block !important;
        padding: 10px 20px !important;
        color: #ffffff !important;
        font-size: 15px !important;
        text-decoration: none !important;
    }

    .navbar .menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

   
    .menu-toggle.is-active span:nth-child(1) {
        transform: translateY(8.5px) rotate(45deg);
    }
    .menu-toggle.is-active span:nth-child(2) {
        opacity: 0;
    }
    .menu-toggle.is-active span:nth-child(3) {
        transform: translateY(-8.5px) rotate(-45deg);
    }
}
</style>
</head>
<body>

  <!-- Navbar -->
  <header>
    <nav class="navbar">
  <div class="logo">
    <img src="{{ asset('images/Logo_Sokoyoso-removebg-preview.png') }}" alt="Logo Desa">
    <h2>Desa Sokoyoso</h2>
  </div>

  <!-- Tombol Hamburger (Khusus Mobile) -->
  <div class="menu-toggle" id="mobile-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <ul class="menu nav-menu" id="menu-list">
    <li><a href="#home">Home</a></li>
    <li><a href="#profil">Profil Desa</a></li>
    <li><a href="#layanan">Layanan</a></li>
    <li><a href="#berita">Berita</a></li>
    <li><a href="#agenda">Agenda</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
</nav>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="hero-content">
      <h1>Selamat Datang di Website Resmi Desa Sokoyoso</h1>
      <p>Melayani masyarakat dengan cepat, transparan, dan modern.</p>
      <a href="#profil" class="btn">Lihat Profil Desa</a>
    </div>
  </section>

  <!-- Profil Desa -->
  <section class="profil" id="profil">
    <h2>Profil Desa</h2>
    <div class="profil-container">
      <div class="card">
        <i class="fa-solid fa-landmark"></i>
        <h3>Sejarah Desa</h3>
        <p>
          Seperti banyak desa di tanah Jawa, sejarah penamaan Sokoyoso sering dikaitkan dengan nilai-nilai luhur, babad tanah, atau kondisi geografis zaman dahulu. Dalam cerita tutur masyarakat (legenda lokal), nama Sokoyoso sering diidentikkan dengan filosofi "Soko" (tiang atau pondasi) dan "Yoso" (membangun atau membuat), yang melambangkan semangat gotong royong para leluhur dalam membangun fondasi kehidupan bermasyarakat di wilayah tersebut.
        </p>
      </div>

      <div class="card">
        <i class="fa-solid fa-bullseye"></i>
        <h3>Visi & Misi</h3>
        <p>
          Mewujudkan desa yang sejahtera, aman, dan berbasis teknologi digital.
        </p>
      </div>

      <div class="card">
        <i class="fa-solid fa-users"></i>
        <h3>Jumlah Penduduk</h3>
        <p>
          Berdasarkan data kependudukan, jumlah penduduk Desa Sokoyoso di Kecamatan Kajen, Kabupaten Pekalongan adalah sebanyak 1.342 jiwa.
          Berikut adalah rincian data demografi Desa Sokoyoso:
          <p></p>
                    -Laki-laki: 673 orang.
          <p></p>
                    -Perempuan: 669 orang.

          <p></p>
          Catatan: Angka ini berdasarkan rekapitulasi sensus dan data resmi yang dirilis oleh pemerintah setempat.
        </p>
      </div>
    </div>
  </section>
  <!-- Kepengurusan Desa -->
<<section class="pengurus" id="pengurus">
  <h2>Struktur Kepengurusan Desa</h2>

  <div class="pengurus-container">
    @forelse($penguruses as $pengurus)
      <div class="pengurus-card">
        @if($pengurus->foto && file_exists(public_path($pengurus->foto)))
          <img src="{{ asset($pengurus->foto) }}" alt="{{ $pengurus->nama }}">
        @else
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Default">
        @endif
        <h3>{{ $pengurus->nama }}</h3>
        <p>{{ $pengurus->jabatan }}</p>
      </div>
    @empty
      <p class="text-center text-muted">Belum ada data kepengurusan.</p>
    @endforelse
  </div>
</section>

 
<!-- Layanan -->
<section class="layanan" id="layanan">
    <h2>Layanan Desa</h2>

    <div class="layanan-container">

        <!-- Surat Domisili -->
        <a href="{{ route('layanan.domisili') }}" class="layanan-box">
            <i class="fa-solid fa-file"></i>
            <h3>Surat Domisili</h3>
            <p>Pengajuan surat domisili secara online.</p>
        </a>

        <!-- Surat Usaha -->
        <a href="{{ route('layanan.usaha') }}" class="layanan-box">
            <i class="fa-solid fa-briefcase"></i>
            <h3>Surat Usaha</h3>
            <p>Layanan pembuatan surat usaha warga.</p>
        </a>

        <!-- Pengaduan Warga -->
        <a href="{{ route('layanan.pengaduan') }}" class="layanan-box">
            <i class="fa-solid fa-comments"></i>
            <h3>Pengaduan Warga</h3>
            <p>Masyarakat dapat mengirim laporan secara online.</p>
        </a>

        <!-- Riwayat & Cek Status Surat -->
        <a href="{{ route('layanan.riwayat') }}" class="layanan-box">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <h3>Riwayat & Cek Status</h3>
            <p>Cek riwayat dan cetak surat yang telah diajukan.</p>
        </a>

    </div>
</section>


  <!-- Berita -->
  <section class="berita" id="berita">
    <h2>Berita Terbaru</h2>

    <div class="berita-container">
    @forelse($beritas as $item)
        <div class="berita-card">
            @if($item->gambar && file_exists(public_path($item->gambar)))
    <img src="{{ asset($item->gambar) }}" alt="Foto Berita">
@else
    <img src="{{ asset('images/default.jpg') }}" alt="Default">
@endif
            
            <div class="berita-content">
                <h3>{{ $item->judul }}</h3>
                <p>{{ Str::limit($item->isi, 100) }}</p>
                <small class="text-muted">{{ $item->created_at->format('d/m/Y') }}</small>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">Belum ada berita yang diunggah.</p>
    @endforelse
    </div>
  </section>

  <!-- Agenda Tahunan -->
<section class="agenda" id="agenda">

  <!-- Card Judul -->
  <div class="agenda-header-card">
    <h2>Agenda Tahunan Desa</h2>

    <p>
      Berikut merupakan agenda dan kegiatan tahunan Pemerintah Desa Sokoyoso tahun 2026.
    </p>
  </div>

  <!-- Isi Agenda Dinamis -->
  <div class="agenda-container">
    @forelse($agendas as $agenda)
      <div class="agenda-card">
        <div class="agenda-date">
          <h3>{{ $agenda->bulan }}</h3>
          <span>{{ $agenda->tahun }}</span>
        </div>

        <div class="agenda-content">
          <h4>{{ $agenda->judul }}</h4>

          <p>
            {{ $agenda->deskripsi }}
          </p>
          @if($agenda->lokasi)
            <p>
              Lokasi : {{ $agenda->lokasi }}
            </p>
          @endif
        </div>
      </div>
    @empty
      <p class="text-center text-muted">Belum ada agenda desa yang diunggah.</p>
    @endforelse
  </div>
</section>

  <!-- Kontak -->
  <section class="kontak" id="kontak">
    <h2>Kontak Desa</h2>

    <div class="kontak-container">
      <div class="kontak-info">
        <p><i class="fa-solid fa-location-dot"></i> Jl. Raya Sokoyoso, Kajen</p>
        <p><i class="fa-solid fa-phone"></i> 0812-3456-7890</p>
        <p><i class="fa-solid fa-envelope"></i> desasokoyoso@gmail.com</p>
        <p> <i class="fa-solid fa-map-location-dot"></i>
 
             <a href="https://share.google/49GLDUFC47NDR6G2U" target="_blank">
      Google Maps Desa Sokoyoso
  </a>
</p>
      </div>

      <form action="{{ route('pesan.store') }}" method="POST">
    @csrf
 
    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama..." required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email..." required>
    <textarea name="pesan" class="form-control mb-3" placeholder="Tulis pesan..." rows="3" required></textarea>
    
    <button type="submit" class="btn btn-success w-100">Kirim Pesan</button>
</form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2026 Pemerintah Desa Sokoyoso | All Rights Reserved</p>
  </footer>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const mobileMenu = document.getElementById('mobile-menu');
    const navMenu = document.getElementById('menu-list');

    if (mobileMenu && navMenu) {
      mobileMenu.addEventListener('click', function () {
        navMenu.classList.toggle('active');
        mobileMenu.classList.toggle('is-active');
      });
    }
  });
</script>
</body>
</html>