<div id="special-blocks">

<?php

$i = 0;
$m = 4;
$z = 0;

while ($i < 3) {

	$i++;
	$optionid = 'featured_page_' . $i;
	$pagid = option::get($optionid); 
	if ($pagid > 0)
	{
		$z++;
		query_posts("page_id=$pagid&showposts=1");
						
		//The Loop
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				<div class="column<?php if ($i == 4) {echo ' column-last';} ?>">
					
					<?php
					$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta
					$image = ui::getImage('180', '120',$cropLocation); 
	
					if ($image) { ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" width="180" height="120" /></a>
					<?php } ?>
	
					<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>

			<div class="cleaner">&nbsp;</div>
				</div><!-- end .column -->
	
		<?php endwhile; endif; 
	} // if page is set 
	?>
<?php } // while ?>

<?php if ($z == 0) {
	echo '<p class="title-xsmall">Please choose 4 static pages (or disable this block) from <strong>WPZOOM Theme Options page > Homepage > Featured Services</strong>.</p>';
} ?>
				
	<div class="cleaner">&nbsp;</div>
</div><!-- end #special-blocks -->