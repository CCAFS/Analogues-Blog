<?php 
register_nav_menu('primary', 'Main Menu');
register_nav_menu('secondary', 'Secondary Menu');

if ( function_exists( 'add_custom_background'  ) ) { 
	add_custom_background();
}
 
function new_excerpt_length($length) {
	return (int) option::get("excerpt_length") ? (int) option::get("excerpt_length") : 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

//function to replace invalid ellipsis from excerpts
function wpzoom_excerpt($text)
{
   return str_replace(' [...]', '...', $text); // if there is a space before ellipsis
   return str_replace('[...]', '...', $text);
}
add_filter('the_excerpt', 'wpzoom_excerpt');

/*---------------------------------------------------------------*/
/*  Limit Posts						
/*									
/*  Plugin URI: http://labitacora.net/comunBlog/limit-post.phps
/*	Usage: the_content_limit($max_charaters, $more_link)
/*
/*---------------------------------------------------------------*/
 
function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '', $echo = true) {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0 && $thisshouldnotapply) {
      echo $content;
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        if ($echo == true) { echo $content . "..."; } else {return $content; }
   }
   else {
      if ($echo == true) { echo $content . "..."; } else {return $content; }
   }
}

/*----------------------------------*/
/* Breadcrumbs						*/
/*----------------------------------*/

function wpzoom_breadcrumbs() {
 
  $delimiter = ' / ';
  $name = __('Home'); //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
     global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '';
      single_cat_title();
      echo '' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      if (!is_attachment()) {
      $cat = get_the_category(); $cat = $cat[0];
      if ($cat) {
	  	echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	  }
      echo $currentBefore;
      the_title();
      echo $currentAfter; }

    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . __('Search results for &#39;', 'wpzoom') . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . __('Posts tagged &#39;', 'wpzoom');
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . __('Articles posted by ', 'wpzoom') . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . __('Error 404', 'wpzoom') . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
  }
}
 

/*--------------------------------------------*/
/* Comments Custom Template						
/*--------------------------------------------*/


function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="commbody">
	<div class="commleft">
		  <div class="comment-author vcard">
			 <?php echo get_avatar($comment,$size='50' ); ?>

			 <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
		  </div>
 
		  <div class="comment-meta commentmetadata">
			<?php _e('on', 'wpzoom'); ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s <br/> '), get_comment_date('M d, Y'),  get_comment_time()) ?></a>
			<?php _e('at', 'wpzoom'); ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%2$s'), get_comment_date(),  get_comment_time()) ?></a>
			
			
			<?php edit_comment_link(__('{Edit}'),'  ','') ?></div>
      </div>

      <?php comment_text() ?>
		 <?php if ($comment->comment_approved == '0') : ?>
			 <em><?php _e('Your comment is awaiting moderation.', 'wpzoom') ?></em>
			 <br />
		  <?php endif; ?>
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
      <div class="clear"></div>
     </div>
<?php }




function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

/*--------------------------------------------*/
/* Reset [gallery] shortcode aditional styles						
/*--------------------------------------------*/

add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));