<?php get_header(); ?>


<div id="mainpage">
<div class="page">
<div id="content">
<div class="blog_post">

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
        <?php
        while(have_posts()) {
		the_post();
		?>

	<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    
    <div class="metaInfo">Posted By <?php the_author_link(); ?> / <?php the_time('F, j, Y'); ?> / <a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?> comments</a></div>
    
	<?php if(has_post_thumbnail()) { ?>
		<div class="portfolio_thumbnail">
		<?php 
		$thumb = get_post_thumbnail_id(); 
		$image = vt_resize( $thumb,'' , 510, 280, true, 70 );
		?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" class="front" /></a>
		</div>
	<?php } ?>
			
	<?php the_content(); ?>
    
    <?php } ?>
    

    </div>
    <?php wp_reset_query(); ?>
    <?php wp_pagenavi(); ?>
	</div>	
	<?php get_sidebar(); ?>
</div>

</div>




<?php get_footer(); ?>