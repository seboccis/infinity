function details(event)
{
	event.preventDefault();

	var that = $(this);

	if(that.hasClass('showDetails')){
		that.removeClass('showDetails').addClass('hideDetails');
		that.next().fadeOut(100);
		that.children().removeClass('glyphicon-zoom-in').addClass('glyphicon-zoom-out');
		that.parent().parent().next().removeClass('hidden-xs');		
	}
	else{
		that.removeClass('hideDetails').addClass('showDetails');
		that.next().fadeIn(100);
		that.children().removeClass('glyphicon-zoom-out').addClass('glyphicon-zoom-in');
		that.parent().parent().next().addClass('hidden-xs');		
	}

	event.stopPropagation();
}

function chooseAirportService(event)
{
	event.preventDefault();

	var path 	 = $(this).attr('data-ajax-path');
	var category = $(this).attr('data-ajax-category');
	var url 	 = $(this).attr('data-href');

	$.ajax({
		url: path,
		data: {
			category: category,
		}
	})
	.done(function(){
		$(location).attr('href', url);
	});

	event.stopPropagation();
}

$('.btnDetails').on('click', details);
$('.btnAirportServiceChoice').on('click', chooseAirportService);