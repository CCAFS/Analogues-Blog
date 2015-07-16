<?php

/* 
 * Copyright (C) 2015 JGALLEGO
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


		
                $ops = array(
                        'post_type' => 'post',
                        'post_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC'
                );

                $loop = new WP_Query($ops);
                $i = 0;
                while( $loop->have_posts() && $i< 3):
                        $loop->the_post();
                        
                        if( has_post_thumbnail() )
			{
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			}
                        echo has_post_thumbnail();
                        $featured_image_id = get_post_meta( $post_id, '_thumbnail_id', true );
                        echo $featured_image_id;
		
		?>
                    <div class="news">
                        <div class="newsmedia">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                                } else {
                                    ?>
                                        <div class="img-news" style="background: url('<?php bloginfo('template_directory'); ?>/img/logo_ccafs.png'); background-size: 250px 150px; background-repeat: no-repeat;"></div>
                                        <!--<img src="<?php bloginfo('template_directory'); ?>/img/logo_ccafs.png" alt="<?php the_title(); ?>" />-->
                            <?php } ?>
                            <!--<a href="<?php the_permalink(); ?>"><img src="<?php echo $img[0]; ?>"/></a>-->
                        </div>
                        <div class="news-content">
                            <div class="newstitle">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="type-post">Video</div>
                            <div id="news-excerpt">
                                <?php echo substr(get_the_excerpt(), 0, strpos(get_the_excerpt(), ' ', 250)); ?>
                            </div>
                            <div class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
                        </div>
                    </div>			
		<?php $i++;endwhile; ?>