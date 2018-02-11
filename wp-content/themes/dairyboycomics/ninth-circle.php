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
	<?php } else {

		$t = current_time('H');

		if ($t == 15) {
			$heIsHere = true;
		} else {
			$heIsHere = false;
		} ?>

		<a href="<?php echo site_url(); ?>" id="turnBack">TURN BACK</a>

		<img id="ground" 
		src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/ground.png">

		<img id="left-corner" 
		src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/left-corner.png">

		<img id="right-corner" 
		src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/right-corner.png">

		<?php if ($heIsHere) { ?>

			<img id="prisoner" 
			src="<?php echo get_stylesheet_directory_uri() ?>/img/ninth-circle/prisoner.gif">
			<script> document.getElementById('prisoner').ondragstart = function() { return false; }; </script>	

			<audio id="darkness" 
			src="<?php echo get_stylesheet_directory_uri() ?>/media/Gathering_Darkness.mp3" 
			autoplay loop></audio>

		<?php } else { ?>

			<audio id="darkness" 
			src="<?php echo get_stylesheet_directory_uri() ?>/media/Silence.mp3" 
			autoplay loop></audio>

		<?php } ?>

		<!-- You belong to your father, the devil, and you want to carry out your father’s desires. -John 8:44 -->

		<script>

			document.getElementById('ground').ondragstart = function() { return false; };
			document.getElementById('left-corner').ondragstart = function() { return false; };
			document.getElementById('right-corner').ondragstart = function() { return false; };

		    var audio = document.getElementById("darkness");
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
			    var img = document.getElementById('ground');
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

			function begone(){
				console.log("leave");
				setTimeout(function() {
					forceLeave();
				}, 5000);
			}

			//His mood will determine your fate
			var patience = Math.floor(Math.random() * 9);

			console.log(patience);

			if (patience == 0) {
				var accepted = true;
			}

			//You will know only what he decides
			var messages = Math.floor(Math.random() * 6);

			console.log(messages);

			function verse() {
				setTimeout(function() {
					console.log("yolo");
				}, Math.floor(Math.random() * 10) * 1000)
			}

			function handler(count) {
				var caller = arguments.callee;
			    if (count > 0) {
			        verse();
			        window.setTimeout(function() {
			            caller(count - 1);
			        }, 100);
			    }
			};

			handler(messages);

			


			/*

			Wait 30 seconds before starting challenge

			Begin question dialogue

			User picks yes or no to asking

			User picks question

			Answer provided, jump scare sends user away

			*/

		</script>

	<?php } ?>

<?php wp_footer(); ?>
</body>
</html>