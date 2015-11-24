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

$('.btnDetails').on('click', details);