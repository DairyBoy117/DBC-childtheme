<?php
/*
Template Name: Shrek Souls
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

	<?php
	if ( wp_is_mobile() ) { ?>
	    <h1>Only a desktop can fathom the information contained within this page. Redirecting you back to home...</h1>

	    <a href="<?php echo site_url(); ?>">
	    	<h1>If redirection doesn't work, click here</h1>
	    </a>

	    <script>
	    	function forceLeave() {
				window.location.replace("<?php echo site_url(); ?>");
			}
			setTimeout(function () {
		        forceLeave();
		    }, 3000);
	    </script>
	<?php } else { ?>

		<a href="<?php echo site_url(); ?>" id="turnBack">Leave this place knowing more than you did before</a>

		<img id="shrekSouls" onclick="importantMessage()"" 
		src="<?php echo get_stylesheet_directory_uri() ?>/img/shrek-souls.jpg" 
		alt="There is undeniable proof that Shrek and Dark Souls takes place in the same universe"
		title="There is undeniable proof that Shrek and Dark Souls takes place in the same universe">

		<audio id="shrekSong" 
		src="<?php echo get_stylesheet_directory_uri() ?>/media/Im_On_My_Way.mp3" 
		autoplay loop></audio>

		<!-- If you're seeing this message, you deserve to know the truth. Garbage memes have been slowly deteriorating my state of mind since high school and there's no going back. I'm scared. -->

		<script>
		    var audio = document.getElementById("shrekSong");
		    audio.volume = 0.1;

		    function importantMessage() {
		    	alert("You better check yourself before you Shrek yourself");
		    }

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
			    var img = document.getElementById('shrekSouls');
			    var imgheight = myHeight + 'px';
			    img.style.height = imgheight;
		    }
		  
		    imgResize()
		    window.onresize = function () {
			    imgResize()
			};

			function forceLeave() {
				window.location.replace("<?php echo site_url(); ?>");
			}

		</script>

	<?php } ?>

<?php wp_footer(); ?>
</body>
</html>