<?php

add_action('wp_ajax_nopriv_get_movies_from_api', 'get_movies_from_api');
add_action('wp_ajax_get_movies_from_api', 'get_movies_from_api');

wp_schedule_event(time(),'hourly', 'get_movies_from_api');

function get_movies_from_api(){

    $file = get_stylesheet_directory() . '/report.txt';
    $current_page = (! empty($_POST['current_page'])) ? $_POST['current_page'] : 1;
    $movies = [];

    if($current_page == 1)
    {
        $allposts= get_posts( array('post_type'=>'Movie','numberposts'=>-1) );
        foreach ($allposts as $eachpost) {
        wp_delete_post( $eachpost->ID, true );
        }
    }

    $results = wp_remote_retrieve_body(wp_remote_get('https://api.themoviedb.org/3/movie/popular?api_key=624e5443542c015afd10b54caf716fcb&language=en-US&page=' . $current_page));

    file_put_contents($file, "OLD: " . $results. "\n\n", FILE_APPEND);

    $results = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $results), true );

    if(! is_array($results) || empty($results) || $current_page == 4){
        return false;
    }

    $Movies[] = $results;

    foreach($Movies[0] as $result){
        foreach($result as $Movie){
            file_put_contents($file, "New: " . $Movie['title'] . "\n\n", FILE_APPEND);

            $my_post = array(
                'post_name' => $Movie['title'],
                'post_title' => $Movie['title'],
                'post_type' => 'Movie',
                'post_status' => 'publish',
           
               'meta_input' => array(
                 'overview' => $Movie['overview'],
                 'id' => $Movie['id'],
                 'original_title' => $Movie['original_title'],
                 'popularity' => $Movie['popularity'],
                 'release_date' => $Movie['release_date'],
                 'vote_average' => $Movie['vote_average'],
                 'vote_count' => $Movie['vote_count'],
                 'original_language' => $Movie['original_language'],
                 'poster_path' => 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $Movie['poster_path']
               )
             );
             wp_insert_post( $my_post );
        } 
    }

    $current_page = $current_page + 1;
    wp_remote_post(admin_url('admin-ajax.php?action=get_movies_from_api'),[
        'blocking' => false,
        'sslverify' => false,
        'body' => [
            'current_page' => $current_page
        ]
    ]);
}