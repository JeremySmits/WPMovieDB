<?php 

/*
Template Name: Popular Movies
*/

?>

<?php get_header(); ?> 

<body>
    
<main class="container">


<?php

$args = array( 'posts_per_page' => 6,
'paged' => $paged,
'post_type' => 'Movie',
'orderby' => 'publish_date',
'order' => 'ASC'
);

    $postslist = new WP_Query( $args );

    if ( $postslist->have_posts() ) :
        while ( $postslist->have_posts() ) : $postslist->the_post(); 

        ?>
        <div >
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">World</strong>
                <h3>
                    <a href="<?php the_permalink() ?>"><?php the_title();?></a>
                </h3>
                <div class="mb-1 text-muted"><?php echo get_post_meta($post->ID, 'release_date', TRUE) ?></div>
                <p class="card-text mb-auto"><?php echo get_post_meta($post->ID, 'overview', TRUE) ?></p>
                <a href="<?php the_permalink() ?>" class="stretched-link">Continue reading</a>
                </div>
                <img class="img-responsive img-rounded" src="<?php echo get_post_meta($post->ID, 'poster_path', TRUE) ?>"width="200" height="280" alt="">
            </div>
            </div>
        </div>
        <?php

         endwhile;  
        wp_reset_postdata();
    endif;
 ?>

<?php
       $total_pages = $postslist -> max_num_pages;
       
       if ($total_pages > 1) {
       
           $current_page = max(1, get_query_var('paged'));
       
           ?> <h4><?php 
           echo paginate_links(array(
               'base' => get_pagenum_link(1).
               '%_%',
               //'format' => '/page/%#%',
               'current' => $current_page,
               'total' => $total_pages,
               'prev_text' => __('<i class="fas fa-chevron-left page-prev"></i>'),
               'next_text' => __('<i class="fas fa-chevron-right page-next"></i>'),
           )); ?>
           </h4>
       <?php } ?>

</body>
<?php get_footer(); ?>