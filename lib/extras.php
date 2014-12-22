<?php

function header_logo($class=NULL){
	$home_url = esc_url(get_home_url());
	$bloginfo = get_bloginfo( 'name' );
	$header_logo = audacity_get_option('logo_head');
	$header_image = ($header_logo) ? '<img src="'.$header_logo.'" class="logo img-responsive" />' : $bloginfo;
	$class = ($header_logo) ? $class.' image' : '';
	echo '<a class="navbar-brand header_logo '.$class.'" href="'. $home_url .'">'.$header_image.'</a>';
}


// Custom Excerpt
function trim_words( $text, $num_words = 55, $more = null ) {
    if ( null === $more )
        $more = __( '&hellip;' );

    $original_text = $text;
    $text = strip_shortcodes( $text );
    // Add tags that you don't want stripped
    $text = strip_tags( $text, '<strong>, <b>, <em>, <i>, <ul>, <li>, <blockquote>, <h1>, <h2>, <h3>, <h4>, <h5>, <h6>, <a>, <br>, <p>' );

    if ( 'characters' == _x( 'words', 'word count: words or characters?' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
        $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
        preg_match_all( '/./u', $text, $words_array );
        $words_array = array_slice( $words_array[0], 0, $num_words + 1 );
        $sep = '';
    } else {
        $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
        $sep = ' ';
    }

    if ( count( $words_array ) > $num_words ) {
        array_pop( $words_array );
        $text = implode( $sep, $words_array );
        $text = $text . $more;
    } else {
        $text = implode( $sep, $words_array );
    }

    return apply_filters( 'trim_words', $text, $num_words, $more, $original_text );
}