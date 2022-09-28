<?php 

/*
Template Name: Genre page
*/

?>

<?php get_header(); ?> 

<body>

<?php $movieGenre = get_terms('movie_category', array('hide_empty' => 0, 'parent' =>0)); 
   foreach($movieGenre as $movieGenre) {
   ?>
    <main class="container pt-3">
        <ul class="list-group">
        <li class="list-group-item">
            <a href="<?php echo '/WPMovieDB/most-popular-movies/?category=' . $movieGenre->name; ?>" class="stretched-link"><?php echo $movieGenre->name; ?></a>
        </li>
        </ul>
    </main class="pb-5">

    <?php } ?>

</body>
<?php get_footer(); ?>