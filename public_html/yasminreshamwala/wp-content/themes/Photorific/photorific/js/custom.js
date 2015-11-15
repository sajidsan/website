jQuery(document).ready(function() {
	$('a').hover(function() {
		$(this).children('.front').stop().animate({"opacity": ".7"}, "slow");
	}, function() {
		$(this).children('.front').stop().animate({"opacity": "1"}, "slow");
	});
});
jQuery(document).ready(function(){
	jQuery(".toggle_title").toggle(
	function(){
		jQuery(this).addClass('toggle_active');
		jQuery(this).siblings('.toggle_content').slideDown("fast");
	},
	function(){
		jQuery(this).removeClass('toggle_active');
		jQuery(this).siblings('.toggle_content').slideUp("fast");
	}
);
});
function menu_pos() {
	$('#header').fadeIn("fast");
}
$(document).ready(function() {
	menu_pos();
});