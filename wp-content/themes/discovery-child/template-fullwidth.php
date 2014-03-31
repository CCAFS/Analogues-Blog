<?php
/*
Template Name: Full-width Page
*/
?>
<?php get_header(); ?>

		<div id="main" class="full-width">
			
			<div class="breadcrumbs">
				<p><?php wpzoom_breadcrumbs(); ?></p>
			</div><!-- end .breadcrumbs -->

			<?php while (have_posts()) : the_post();
			$show_gallery = get_post_meta($post->ID, 'wpzoom_gallery_show', true);
			$featured_image = get_post_meta($post->ID, 'wpzoom_featured_show', true);
			$cropLocation = get_post_meta($post->ID, 'wpzoom_thumb_crop', true); // get crop location from post meta

			if ($featured_image != 'Don\'t Show') {
				$image = ui::getImage('940', '300',$cropLocation);
			}
			?>

			<?php
			if ($image) { ?>
			<img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" class="cover" />
			<?php } ?>

			<div id="content" class="single-post">
			
				<h1 class="title title-large"><?php the_title(); ?></h1>
				
				<?php edit_post_link( __('Edit page', 'wpzoom'), '<p class="postmetadata">', '</p>'); ?>
				
				<div class="post-content">
					<?php the_content(); ?>
					
					<div class="cleaner">&nbsp;</div>
					
					<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
				</div><!-- end .post-content -->
				
				<?php
				if ($show_gallery == 'on') { 
					get_template_part('gallery', 'full');
				} // if show gallery
				?>

				<?php if (option::get('page_comments') == 'on') { ?>
				<div class="divider">&nbsp;</div>
				
				<div id="comments">
					<?php comments_template(); ?>  
				</div>

				<?php } ?>
				
				<div class="cleaner">&nbsp;</div>
			</div><!-- end #content -->
			
			<?php endwhile; ?>

			<div class="cleaner">&nbsp;</div>

<?php get_footer(); ?>