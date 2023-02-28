<!DOCTYPE html>
<html lang="en">
<head>
   <!-- untuk membuat toolbar template dari bootstrap  -->
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <!-- @yield('<value>') yield digunakan untuk mengisi value nya itu semisal judul atau deskripsi -->
    <title> Laravel 9 | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
  <!--  untuk memberi warna pada toolbar menggunakan bg-primary untuk background dan 
   navbar-dark untuk mengubah text menjadi white -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-body-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Blade Templating</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
             <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
             <a class="nav-link" href="/students">students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/class">class</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container">
        @yield('content')
    </div>
<!-- <div)</div> dipake buat tab content web agar lebih ke tengah -->
</body>
</html>