<?php 
get_header();
?>

<div id="mainpage">
<div class="page">
<!-- start content area -->
	<div id="content">

<?php
		
		while(have_posts()) {
		the_post();
			echo '<div class="blog_post">';
			echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			
			
			echo '<div class="metaInfo">By ';
			echo get_the_author_link();
			echo ' | ';
				
			echo get_the_time('F, j, Y'); 
			echo ' | <a href="';
				
			echo get_comments_link(); 
			echo '">';
			echo get_comments_number('0','1','%');
			echo ' comments</a></div>';
			
			echo '<div class="portfolio_thumbnail">';
			
			$thumb = get_post_thumbnail_id(); 
			$image = vt_resize( $thumb,'' , 530, 260, true, 70 );
				
			echo '<a href="'.get_permalink().'"><img src="'.$image[url].'" width="'.$image[width].'" height="'.$image[height].'" alt="'.$lbtitle.'" /></a>';
				
			echo '</div>'. the_excerpt();
				
			echo '</div>';
		
		}
	
		wp_pagenavi();
		wp_reset_query(); ?>
		
		</div><!-- end #content -->
    
    <?php get_sidebar(); ?>
    

<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
<?php wp_pagenavi(); // Use PageNavi ?>
<?php } ?>

<?php wp_reset_query(); ?>

</div>
</div>

<?php get_footer(); ?>