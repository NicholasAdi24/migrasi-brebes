<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" media='screen and (max-width: 768px)' href="./css/mobile.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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

  <header id='showcase'>
    <div class="container">
      <div class="showcase-container">
        <div class="showcase-content">
          <div class="category category-sports">
            Berita Desa
          </div>
          <h1>Prapag Lor</h1>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste deserunt, at laborum accusamus veniam reprehenderit deleniti reiciendis vel animi ipsum obcaecati ex nesciunt ipsa, voluptatibus provident, quas doloribus molestias. Saepe.</p>
        </div>
      </div>
    </div>
  </header>

  <section id="home-articles" class="py-2">
    <div class="container">
      <h2>Editors Picks</h2>
      <div class="articles-container">
        @foreach($beritas as $berita)
          <article class="card">
            @if ($berita->gambar)
              <img src="{{ asset('storage/' . $berita->gambar) }}" alt="photo">
            @endif
            <div>

              <h3>
                <a href="{{ route('beritadetail', $berita->id) }}">{{ $berita->judul }}</a>
              </h3>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 100) }}</p>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  <footer id='main-footer'>
    <div class="container footer-container">
      <div>
        <br>
        <img src="images/logo.png" alt="logo">
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