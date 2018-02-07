<?php
/*
Template Name: Ninth Circle
*/

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<meta name="ComicPress" content="<?php echo comicpress_themeinfo('version'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<a href="<?php echo site_url(); ?>">TURN BACK</a>

	<img id="prisoner" 
	src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/ground.png">

	<img id="left-corner" 
	src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/left-corner.png">

	<img id="right-corner" 
	src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/right-corner.png">

	<img id="devil" 
	src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/prisoner.gif">	

	<audio id="silence" 
	src="<?php echo get_stylesheet_directory_uri() ?>/media/Gathering_Darkness.mp3" 
	autoplay loop></audio>

	<!-- You belong to your father, the devil, and you want to carry out your father’s desires. -John 8:44 -->

	<script>
	    var audio = document.getElementById("silence");
	    audio.volume = 0.2
	    ;

	    function imgResize() {
	  	    var myHeight = 0;
		    if( typeof( window.innerWidth ) == 'number' ) {
		      //Non-IE
		      myHeight = window.innerHeight;
		    } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
		      //IE 6+ in 'standards compliant mode'
		      myHeight = document.documentElement.clientHeight;
		    } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		      //IE 4 compatible
		      myHeight = document.body.clientHeight;
		    }
		    var img = document.getElementById('prisoner');
		    var imgheight = myHeight + 'px';
		    img.style.height = imgheight;
	    }
	  
	    imgResize();
	    window.onresize = function () {
		    imgResize()
		};

		function forceLeave() {
			window.location.replace("<?php echo site_url(); ?>");
		}

	</script>

<?php wp_footer(); ?>
</body>
</html>