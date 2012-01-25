<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(name =>'sidebar1','before_widget' => '','after_widget' => '',));
	register_sidebar(array('name'=>'sidebar2',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	
/* 为了给分类加上样式，重写整个函数。完全是笨办法 */
function vf_the_category( $separator = '', $parents='', $post_id = false ) {
	        echo vf_get_the_category_list( $separator, $parents, $post_id );
	}	

function vf_get_the_category_list( $separator = '', $parents='', $post_id = false ) {
	global $wp_rewrite;
	$categories = get_the_category( $post_id );
	if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
		return apply_filters( 'the_category', '', $separator, $parents );

	if ( empty( $categories ) )
		return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );

	$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->cat_name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $categories as $category ) {
			if ( 0 < $i )
				$thelist .= $separator;
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . 'class="node">' . $category->cat_name.'</a>';
					break;
				case 'single':
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . 'class="node">';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= "$category->cat_name</a>";
					break;
				case '':
				default:
					$thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . 'class="node">' . $category->name.'</a>';
			}
			++$i;
		}
	}
	return apply_filters( 'the_category', $thelist, $separator, $parents );
}
	
	
function vf_get_the_tag_list( $before = '', $sep = '', $after = '' ) {
	return apply_filters( 'the_tags', vf_get_the_term_list( 0, 'post_tag', $before, $sep, $after ), $before, $sep, $after);
}

/**
 * Retrieve the tags for a post.
 *
 * @since 2.3.0
 *
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 * @return string
 */
function vf_the_tags( $before = null, $sep = ', ', $after = '' ) {
	if ( null === $before )
		$before = __('Tags: ');
	echo vf_get_the_tag_list($before, $sep, $after);
}

function vf_get_the_term_list( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	foreach ( $terms as $term ) {
		$link = get_term_link( $term, $taxonomy );
		if ( is_wp_error( $link ) )
			return $link;
		$term_links[] = '<a href="' . $link . '" rel="tag" class="node">' . $term->name . '</a>';
	}

	$term_links = apply_filters( "term_links-$taxonomy", $term_links );

	return $before . join( $sep, $term_links ) . $after;
}

function vf_get_search_form($echo = true) {
	do_action( 'get_search_form' );

	$search_form_template = locate_template(array('searchform.php'));
	if ( '' != $search_form_template ) {
		require($search_form_template);
		return;
	}

	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<div>
		<input class="sl" type="text" value="' . get_search_query() . '" name="s" id="s" />
		<div align="right"><input type="submit" id="searchsubmit" class="super normal button" value="'. esc_attr__('Search') .'" /></div>
		
	</div>
	</form>';

	if ( $echo )
		echo apply_filters('get_search_form', $form);
	else
		return apply_filters('get_search_form', $form);
}
function vfm_get_search_form($echo = true) {
	do_action( 'get_search_form' );

	$search_form_template = locate_template(array('searchform.php'));
	if ( '' != $search_form_template ) {
		require($search_form_template);
		return;
	}

	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<div>
		<input class="sl" type="text" value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" id="searchsubmit" class="super normal button" value="'. esc_attr__('Search') .'" />
		
	</div>
	</form>';

	if ( $echo )
		echo apply_filters('get_search_form', $form);
	else
		return apply_filters('get_search_form', $form);
}
function vf_get_previous_posts_link( $label = '&laquo; Previous Page' ) {
	global $paged;

	if ( !is_single() && $paged > 1 ) {
		$attr = apply_filters( 'previous_posts_link_attributes', '' );
		return '<a class="super normal button" href="' . previous_posts( false ) . "\" $attr>". preg_replace( '/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label ) .'</a>';
	}
}

/**
 * Display the previous posts page link.
 *
 * @since 0.71
 * @uses get_previous_posts_link()
 *
 * @param string $label Optional. Previous page link text.
 */
function vf_previous_posts_link( $label = '&laquo; Previous Page' ) {
	echo vf_get_previous_posts_link( $label );
}
function vf_get_next_posts_link( $label = 'Next Page &raquo;', $max_page = 0 ) {
	global $paged, $wp_query;

	if ( !$max_page )
		$max_page = $wp_query->max_num_pages;

	if ( !$paged )
		$paged = 1;

	$nextpage = intval($paged) + 1;

	if ( !is_single() && ( empty($paged) || $nextpage <= $max_page) ) {
		$attr = apply_filters( 'next_posts_link_attributes', '' );
		return '<a class="super normal button" href="' . next_posts( $max_page, false ) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
	}
}

/**
 * Display the next posts pages link.
 *
 * @since 0.71
 * @uses get_next_posts_link()
 *
 * @param string $label Content for link text.
 * @param int $max_page Optional. Max pages.
 */
function vf_next_posts_link( $label = 'Next Page &raquo;', $max_page = 0 ) {
	echo vf_get_next_posts_link( $label, $max_page );
}
?>