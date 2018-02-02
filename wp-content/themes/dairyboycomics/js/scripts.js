jQuery().ready(function($) {
	
	$(document).ready(function(){
		
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