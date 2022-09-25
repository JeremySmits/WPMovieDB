<?php get_header(); ?>
<main class="container pt-3">
<div >
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h1>
                        <a href="<?php the_permalink() ?>"><?php the_title();?></a>
                    </h1>
                <div class="mb-1 text-muted">Release date: <?php echo get_post_meta($post->ID, 'release_date', TRUE) ?></div>
                <h5 class="card-text mb-auto"><?php echo get_post_meta($post->ID, 'overview', TRUE) ?></h5>
                <h5 class="card-text mb-auto">Original language: <?php echo get_post_meta($post->ID, 'original_language', TRUE) ?></h5>
                <h5 class="card-text mb-auto">Original title: <?php echo get_post_meta($post->ID, 'original_title', TRUE) ?></h5>
                <h5 class="card-text mb-auto">Popularity: <?php echo get_post_meta($post->ID, 'popularity', TRUE) ?></h5>
                <h5 class="card-text mb-auto">Vote average: <?php echo get_post_meta($post->ID, 'vote_average', TRUE) ?></h5>
                <h5 class="card-text mb-auto">Vote count: <?php echo get_post_meta($post->ID, 'vote_count', TRUE) ?></h5>
                <a href="most-popular-movies" class="stretched-link">back</a>
                </div>
                <img class="img-responsive img-rounded" src="<?php echo get_post_meta($post->ID, 'poster_path', TRUE) ?>"width="500" height="800" alt="">
            </div>
        </div>
    </div>
<?php get_footer(); ?>