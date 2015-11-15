<?php
$show_footer = get_option('show_footer');
if(!$show_footer) : ?>
<div id="footer">
	<?php 
	$copyright = get_option('copyright');
	if($copyright) {
		echo $copyright;
	} else { ?>
		&copy; 2011 - Photorific WP Theme - All Rights Reserved.
    <?php } ?>
</div>
<?php endif; ?>
<?php wp_footer(); ?>
<?php 
$analytics = get_option('analytics'); 
if($analytics) { echo stripslashes($analytics); } ?>
</body>
</html>