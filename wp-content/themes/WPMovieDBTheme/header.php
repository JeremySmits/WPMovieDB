<head>
	<title><?php bloginfo('name');?></title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark height:5%;">
  <a class="navbar-brand" href="/WPMovieDB">WPMovieDB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="most-popular-movies">Popular Movies</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" id="txt" name="order" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light" my-2 my-sm-0" type="submit" value="Search movie"
      onclick="location.href=document.getElementById('txt').value">Search</button>
    </div>
</nav>
</body>


