jQuery().ready(function($) {
	
	$(document).ready(function(){

		$(document).keydown(function(e){
			if(window.location.href.indexOf("comic") > -1) {
		        if (e.keyCode == 37) { 
		        	e.preventDefault();
			    	$("a.navi-prev-in").trigger("click");
			    }
			    if (e.keyCode == 39) {
			    	e.preventDefault();
			    	$("a.navi-next-in").trigger("click");
			    }
		    }
		});

		//Lightbox
		
		$('.lightbox_trigger').click(function(e) {
		
			e.preventDefault();
			
			var image_href = $(this).attr("href");
			
			var lightbox = 
			'<div id="lightbox">' +
				'<div id="content">' + 
					'<img src="' + image_href +'" />' +
				'</div>' +	
			'</div>';
				
			$('body').append(lightbox);

			var winHeight = $( window ).height();
			var winWidth = $( window ).height();

			$('#lightbox img').css('max-height', winHeight);
			$('#lightbox img').css('max-width', winWidth);
			
		});
		
		$('#lightbox').live('click', function() {
			$('#lightbox').remove();
		});

	});
	
});