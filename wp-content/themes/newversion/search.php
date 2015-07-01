<?php get_header(); ?>

		<div id="main">
			
			<div class="breadcrumbs">
				<p><?php wpzoom_breadcrumbs(); ?></p>
			</div><!-- end .breadcrumbs -->

			<div id="content">
			
				<h1 class="title title-large">
				<?php _e('Search Results for', 'wpzoom');?>: <strong><em><?php the_search_query(); ?></em></strong>
				</h1>
				
				<div class="divider">&nbsp;</div>

				<?php get_template_part('loop', 'search'); ?>
				
				<div class="cleaner">&nbsp;</div>
			</div><!-- end #content -->
			
			<aside>
			
				<?php get_sidebar(); ?>
				
				<div class="cleaner">&nbsp;</div>
			</aside>
			
			<div class="cleaner">&nbsp;</div>

<?php get_footer(); ?>