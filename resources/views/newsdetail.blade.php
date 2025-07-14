<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" media='screen and (max-width: 768px)' href="{{ asset('css/mobile.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <script src="https://kit.fontawesome.com/85a5fdd30e.js" async></script>

  <title>Berita Prapag Lor</title>
</head>

<body>
  <nav id="main-nav">
    <div class="container">
      <a href="#" class="logo">Desa Prapag Lor</a>

      <ul>
        <li><a href="/" class="current">Back to Home</a></li>
      </ul>
    </div>
  </nav>

  <section id="article">
    <div class="container">
      <div class="page-container">
            <article class="card">
            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="article">
            @endif
            <h1 class='l-heading'>{{ $berita->judul }}</h1>
            <div class="meta">
                <small>
                <i class="fas fa-user"></i> Ditulis oleh Admin. {{ $berita->created_at->format('d M Y') }}
                </small>
            </div>
            <p>{!! $berita->isi !!}</p>
            </article>

        <!-- <aside class="card bg-secondary">
          <h2>Join Our Club</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, nulla!</p>
          <a href="#" class='btn btn-dak btn-block'>Join Now</a>
        </aside>
        <aside id="categories" class="card">
          <h2>Categories</h2>
          <ul class="list">
            <li><a href="#"><i class="fas fa-chevron-right"></i>Sports</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i>Entertainment</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i>Technology</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i>Fashion</a></li>
          </ul>
        </aside> -->
      </div>
    </div>
  </section>
  
  <footer id='main-footer'>
    <div class="container footer-container">
      <div>
        <br>
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
        <p>Pusat Berita Desa Prapag Lor, Brebes, Jawa Tengah</p>
      </div>
      
      <div>
        <p>
          Desa Prapag Lor &copy; {{ date('Y') }}, All Rights reserved. 
        </p>
      </div>
    </div>
  </footer>
</body>
</html>