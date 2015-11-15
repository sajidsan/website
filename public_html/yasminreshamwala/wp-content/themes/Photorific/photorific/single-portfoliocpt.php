<?php get_header(); ?>

<div id="mainpage">
<!-- start page background -->
<div class="page">
	
    <!-- start content area -->
	<div id="content">
	<?php while ( have_posts() ) : the_post() ?> 
    	<!-- start post content -->
    	<div class="blog_post">
        <h2><?php the_title(); ?></h2>
		<?php if(has_post_thumbnail()) { ?>
		<div class="post_thumbnail">
			<?php 
			$thumb = get_post_thumbnail_id(); 
			$image = vt_resize( $thumb,'' , 530, 220, true, 70 );
			?>
			<img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" class="front" /></a>
		</div>
        <?php } ?>
		<?php the_content(); ?>
        </div><!-- end .blog_post -->
    <?php endwhile; ?>
    </div><!-- end #content -->
    
    <?php get_sidebar(); ?>
    
</div><!-- end .page -->
</div>

<?php get_footer(); ?>