<?php get_header(); ?>

<?php 
$cols = get_option('gallery_cols');
?>

<div id="mainpage">
	<!-- start page background -->
	<div class="page">
        <div class="fullwidth_content">
        	<div class="blog_post">
            	<div id="gallery">
					<?php
                    if($cols == "Two Columns") {
                    echo '<ul class="gallery-two-column">';
                    } elseif($cols == "Three Columns") {
                    echo '<ul class="gallery-three-column">';
                    } elseif($cols == "Four Columns") {
                    echo '<ul class="gallery-four-column">';
                    } 
                    if($cols == "") {
                   	echo '<ul class="gallery-two-column">';
                    } 
					
					
                    while(have_posts()) { the_post();

                    ?>
                    <li>
                        <?php 
                        $lbtitle = get_post_meta(get_the_id(), "_lbtitle", true);
                        $url = get_post_meta(get_the_id(), "_lburl", true);	
                        $thumb = get_post_thumbnail_id(); 
                        if($cols == "0" || $cols == "") {
                            $image = vt_resize( $thumb,'' , 390, 240, true, 70 );
                        } elseif($cols == "One Column") {
                            $image = vt_resize( $thumb,'' , 390, 240, true, 70 );
                        } elseif($cols == "Two Columns") {
                            $image = vt_resize( $thumb,'' , 390, 240, true, 70 );
                        } elseif($cols == "Three Columns") {
                            $image = vt_resize( $thumb,'' , 250, 170, true, 70 );
                        } elseif($cols == "Four Columns") {
                            $image = vt_resize( $thumb,'' , 190, 130, true, 70 );
                        }
                        ?>
                        <?php echo '<a href="'.$url.'" rel="prettyPhoto"><img src="'.$image[url].'" width="'.$image[width].'" height="'.$image[height].'" alt="'.$lbtitle.'" /></a>'; ?>           
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php wp_pagenavi(); ?>
            </div>
        </div>
	</div>  
</div>

<?php get_footer(); ?>