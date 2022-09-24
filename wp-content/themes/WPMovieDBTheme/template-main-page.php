<?php 

/*
Template Name: Main Page
*/

?>

<?php get_header(); ?>

<!-- Jumbotron -->
<div class="pt-5 pb-5 text-center bg-image rounded-3" style="
    background-image: url('https://wallpaper.dog/large/20493433.jpg');
    height: 90%;
  ">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.9);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Welcome to WPMovieDB!</h1>
        <h4 class="mb-3">A website made to show the most popular movies.</h4>
        <a class="btn btn-outline-light btn-lg" href="most-popular-movies" role="button">Pupular movies</a>
      </div>
    </div>
  </div>
</div>
<!-- Jumbotron -->

<?php get_footer(); ?>