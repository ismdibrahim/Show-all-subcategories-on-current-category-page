add_shortcode( 'list_subcats', function() {
    ob_start();
    
    $current_cat = get_queried_object();
    $term_id = $current_cat->term_id;

    $categories = get_categories( array( 
        'parent' => $term_id,
        'hide_empty' => false,
    ) );

    echo '<ul class="list-subcats">';

    foreach ( $categories as $category ) {
	echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->name . '</a></li>';
    }

    echo '</ul>';

    return ob_get_clean();
} );
