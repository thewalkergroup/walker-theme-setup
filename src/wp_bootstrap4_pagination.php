<?php
/**
 * WordPress Bootstrap 4 Pagination
*/
function wp_bootstrap4_pagination( $args = array() ) {

    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'Next', 'text-domain' ),
        'before_output'   => '<nav aria-label="Page Navigation"><ul class="pagination">',
        'after_output'    => '</ul></nav>'
    );

    $args = wp_parse_args(
        $args,
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );

    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );

    if ( $count <= 1 )
        return FALSE;

    if ( !$page )
        $page = 1;

    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }

    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );

    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) )
        $echo .= '<li class="page-item first"><a class="page-link" href="' . $firstpage . '">' . __( 'First', 'text-domain' ) . '</a></li>';
    else
        $echo .= '<li class="page-item first disabled"><a class="page-link" href="#">' . __( 'First', 'text-domain' ) . '</a></li>';
    if ( $previous && (1 != $page) )
        $echo .= '<li class="page-item previous"><a class="page-link" href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    else
        $echo .= '<li class="page-item previous disabled"><a class="page-link" href="#" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
            } else {
                $echo .= sprintf( '<li class="page-item"><a class="page-link" href="%s">%s</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }

    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li class="page-item next"><a class="page-link" href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    else
        $echo .= '<li class="page-item next disabled"><a class="page-link" href="#" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage && ($count != $page))  {
        $echo .= '<li class="page-item last"><a class="page-link" href="' . $lastpage . '">' . __( 'Last', 'text-domain' ) . '</a></li>';
    } else {
      $echo .= '<li class="page-item last disabled"><a class="page-link" href="' . $lastpage . '">' . __( 'Last', 'text-domain' ) . '</a></li>';
    }
    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}
