<?php
/*
Template Name: Fullwidth
*/
get_header(); ?>

<div id="mainpage">
<!-- start page background -->
<div class="page">
	
	<?php while ( have_posts() ) : the_post() ?> 
    	<!-- start post content -->
    	<div class="fullwidth_content">
		<div class="blog_post">
		<?php the_content(); ?>
        </div><!-- end .blog_post -->
        </div>

    <?php endwhile; ?>
    
</div><!-- end .page -->
</div>

<?php get_footer(); ?>