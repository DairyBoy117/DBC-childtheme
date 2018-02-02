jQuery().ready(function($) {
	
	$(document).ready(function(){
		
		$('.lightbox_trigger').click(function(e) {
		
			e.preventDefault();
			
			var image_href = $(this).attr("href");

			if ($('#lightbox').length > 0) {
				$('#lightbox').show();
			}
			
			else { 
				var lightbox = 
				'<div id="lightbox">' +
					'<div id="content">' + //insert clicked link's href into img src
						'<img src="' + image_href +'" />' +
					'</div>' +	
				'</div>';
					
				//insert lightbox HTML into page
				$('body').append(lightbox);

				var winHeight = $( window ).height();

				$('#lightbox img').css('max-height', winHeight);
			}
			
		});
		
		//Click anywhere on the page to get rid of lightbox window
		$('#lightbox').live('click', function() { //must use live, as the lightbox element is inserted into the DOM
			$('#lightbox').hide();
		});

	});
	
});