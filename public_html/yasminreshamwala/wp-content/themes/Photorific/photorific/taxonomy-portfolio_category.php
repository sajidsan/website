<?php get_header(); ?>

<?php 
$cols = get_option('portfolio_cols');
?>

<div id="mainpage">

	<!-- start page background -->
	<div class="page">

        <div id="content-fullwidth-portfolio">
        
            <?php
            if($cols == "One Column") {
                echo '<div class="one-column">';
            } elseif($cols == "Two Columns") {
                echo '<ul class="two-column">';
            } elseif($cols == "Three Columns") {
                echo '<ul class="three-column">';
            } elseif($cols == "Four Columns") {
                echo '<ul class="four-column">';
            } 
            if($cols == "") {
                echo '<div class="one-column">';
            }
         
			while(have_posts()) { the_post();
			?>
    
                <li>
                
                <?php 
                $lbtitle = get_post_meta(get_the_id(), "_lbtitle", true);
                $url = get_post_meta(get_the_id(), "_lburl", true);	
                $thumb = get_post_thumbnail_id(); 
                if($cols == "0" || $cols == "") {
                    $image = vt_resize( $thumb,'' , 520, 260, true, 70 );
                } elseif($cols == "One Column") {
                    $image = vt_resize( $thumb,'' , 520, 260, true, 70 );
                } elseif($cols == "Two Columns") {
                    $image = vt_resize( $thumb,'' , 380, 200, true, 70 );
                } elseif($cols == "Three Columns") {
                    $image = vt_resize( $thumb,'' , 250, 140, true, 70 );
                } elseif($cols == "Four Columns") {
                    $image = vt_resize( $thumb,'' , 190, 110, true, 70 );
                }
                ?>
                
                <div class="portfolio_thumbnail">
                    <?php echo '<a href="'.$url.'" rel="prettyPhoto"><img src="'.$image[url].'" width="'.$image[width].'" height="'.$image[height].'" alt="'.$lbtitle.'" /></a>'; ?>
                </div>
                
                <?php if($cols == "One Column" || $cols == "") { echo '<div class="portfolio_desc">'; } ?>
          
                	<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                	<?php the_excerpt() ?>
                
                <?php if($cols == "One Column" || $cols == "") { echo '</div>'; } ?>
                
                </li>
        
            <?php } ?>
            
            <?php if($cols == "One Column" || $cols == "") { echo '</div>'; } else { echo '</ul>'; } ?>
            
            <?php wp_pagenavi(); ?>
            
        </div>

	</div>
    
</div>

<?php get_footer(); ?>