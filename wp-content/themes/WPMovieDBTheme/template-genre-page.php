<?php 

/*
Template Name: Genre page
*/

?>

<?php get_header(); ?> 

<body>

<?php $movieGenre = get_terms('movie_category', array('hide_empty' => 0, 'parent' =>0)); 
   foreach($movieGenre as $movieGenre) : 
   ?>
<ul>
   <li>
      <a href="<?php echo '/WPMovieDB/most-popular-movies/?category=' . $movieGenre->name; ?>"><?php echo $movieGenre->name; ?></a>
      <ul>
         <?php
            $wsubargs = array(
               'hierarchical' => 1,
               'show_option_none' => '',
               'hide_empty' => 0,
               'parent' => $movieGenre->term_id,
               'taxonomy' => 'movie_category'
            );
            ?>  
      </ul>
   </li>
</ul>
<?php 
   endforeach; 
   ?>

</body>
<?php get_footer(); ?>