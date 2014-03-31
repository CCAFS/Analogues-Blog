<?php 
$loop = new WP_Query( 
	array( 
		'post__not_in' => get_option( 'sticky_posts' ),
		'posts_per_page' => option::get('featured_number'),
		'meta_key' => 'wpzoom_is_featured',
		'meta_value' => 1				
		) );

$m = 0;
?>

<?php if ($loop->have_posts()) { ?>

<div id="featured-posts">

	<a class="prev browse" rel="nofollow"><?php _e('prev', 'wpzoom'); ?></a>
	<a class="next browse" rel="nofollow"><?php _e('next', 'wpzoom'); ?></a>

	<ul class="featured-posts slides">
	
		<?php while ( $loop->have_posts() ) : $loop->the_post(); $m++; ?>
		
		<li class="slide">

			<div class="post-excerpt">
				<article>
					<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php echo substr(get_the_excerpt(), 0, strpos(get_the_excerpt(), ' ', 240)); ?>...
					<p class="read-more"><a href="<?php the_permalink(); ?>" class="button <?php echo strtolower(option::get('featured_more_color')); ?>" rel="nofollow"><?php _e('Continue reading','wpzoom');?> &raquo;</a></p>
				</article>
			</div><!-- end .post-excerpt -->
			
			<?php
			$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
			$image = ui::getImage('600', '300',$cropLocation); 

			if ($image) { ?>
			<div class="post-cover">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" width="600" height="300" /></a>
			</div><!-- end .post-cover -->
			<?php } ?>
	
		</li>
		            
		<?php endwhile; ?>

	</ul><!-- end .featured-posts -->
	
	<div class="cleaner">&nbsp;</div>

</div><!-- end #featured-posts -->

<?php } ?>

<?php if ($m > 0) { ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	
		jQuery('#featured-posts').css({ display : 'block' });
		jQuery("#featured-posts").slides({
		container: 'slides',
		play: <?php if (option::get('featured_rotate') == 'on') { echo option::get('featured_interval'); }  else { ?>0<?php } ?>,
		slideSpeed: 500,
		width: 940,
		generatePagination: false,
 		pause: 1000,
 		effect: 'slide, fade',
 		autoHeight: true,
		hoverPause: true,
		preload: true,
		preloadImage: '<?php bloginfo('template_directory'); ?>/images/loading.gif'
	});		 

});
</script>

<?php } ?>

<?php if ($m == 0) { echo '<div class="post-content"><p><strong>You are now ready to set-up your Slideshow content.</strong></p>
<p>For more information about adding posts to the slider, please <strong><a href="http://www.wpzoom.com/documentation/discovery/">read the documentation</a></strong>.</p></div>'; } ?>