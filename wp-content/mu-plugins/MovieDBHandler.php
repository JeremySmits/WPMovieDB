<?php

add_action('wp_ajax_nopriv_get_movies_from_api', 'get_movies_from_api');
add_action('wp_ajax_get_movies_from_api', 'get_movies_from_api');

function get_movies_from_api(){

    $current_page = (! empty($_POST['current_page'])) ? $_POST['current_page'] : 1;

    if($current_page == 1)
    {
        $allposts= get_posts( array('post_type'=>'Movie','numberposts'=>-1) );
        foreach ($allposts as $eachpost) {
        wp_delete_post( $eachpost->ID, true );
        }
    }

    $results = wp_remote_retrieve_body(wp_remote_get('https://api.themoviedb.org/3/movie/popular?api_key=624e5443542c015afd10b54caf716fcb&language=en-US&page=' . $current_page));

    $results = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $results), true );

    if(! is_array($results) || empty($results) || $current_page == 4){
        return false;
    }

    $Movies[] = $results;

    $moviegenres = array(
        '28' => 'Action',
        '12'=> 'Adventure',
        '16'=>'Animation',
        '35'=>'Comedy',
        '80'=>'Crime',
        '99'=>'Documentary',
        '18'=>'Drama',
        '10751'=>'Family',
        '14'=>'Fantasy',
        '36'=>'History',
        '27'=>'Horror',
        '10402'=>'Music',
        '9648'=>'Mystery',
        '10749'=>'Romance',
        '878'=>'Science Fiction',
        '10770'=>'TV Movie',
        '53'=>'Thriller',
        '10752' =>'War',
        '37' =>'Western'
    );

    foreach($Movies[0] as $result){
        $counter = 0;

        foreach($result as $Movie){
            $Genre = array();

            for ($x = 0; $x <= count($Movie['genre_ids']); $x++) {
                array_push($Genre, $moviegenres[$Movie['genre_ids'][$x]]);
            } 


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

             if($current_page != 3){
                $post_id = wp_insert_post( $my_post );
                wp_set_object_terms($post_id, $Genre, 'movie_category');
             }
             elseif($counter < 10 ){
                $post_id = wp_insert_post( $my_post );
                wp_set_object_terms($post_id, $Genre, 'movie_category');
             }
             $counter = $counter +1;
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

// if ( ! wp_next_scheduled( 'prefixhourlyevent' ) ) {
//     wp_schedule_event( time(), 'hourly', 'prefixhourlyevent');
// }
// add_action( 'prefixhourlyevent', 'get_movies_from_api' );