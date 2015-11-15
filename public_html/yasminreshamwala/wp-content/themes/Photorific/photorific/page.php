<?php get_header(); ?>

<div id="mainpage">
<!-- start page background -->
<div class="page">
	
    <!-- start content area -->
	<div id="content">
	<?php while ( have_posts() ) : the_post() ?> 
    	<!-- start post content -->
    	<div class="blog_post">
		<?php the_content(); ?>
        </div><!-- end .blog_post -->
    <?php endwhile; ?>
    </div><!-- end #content -->
    
    <?php get_sidebar(); ?>
    
</div><!-- end .page -->
</div>


<?php get_footer(); ?>