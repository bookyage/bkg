<?php get_header(); ?>	
<div id="content">
	<div class="container">
		<?php if(is_category()) { ?>
		<div style="display: none;">
			<div class="archive_title">
				<?php printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
				<div class="clear"></div>
			</div><!--//archive_title-->
		</div>
		<?php } ?>			
		
			<div id="the_mason">		
			<div class="max_cont">
				<?php
				global $wp_query;
				$args = array_merge( $wp_query->query, array( 'posts_per_page' => 20 ) );
				query_posts( $args );        
				while (have_posts()) : the_post(); ?>     		
                    <div class="home_post_thumb <?php if($x % 3 == 0) { echo 'home_post_thumb_last'; } ?>">
                    <h3><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
                                <div class="vid_cont"><iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>" frameborder="0" allowfullscreen></iframe></div>
                            <?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
                                <div class="vid_cont"><iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=02eaff" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
                            <?php } else { ?>
                        <a class="img" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('home-image'); ?>
                        </a>
                        <p><?php echo ds_get_excerpt(150); ?>
                        <?php } ?>
                    </div>
				<?php endwhile; ?>				
				</div><!--//max_cont-->
			</div> <!--//posts_cont -->	
			<div class="clear"></div>		
	</div>
</div><!--//content-->
<?php get_footer(); ?> 		