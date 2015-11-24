function details(event)
{
	event.preventDefault();

	var that = $(this);

	if(that.hasClass('showDetails')){
		that.removeClass('showDetails').addClass('hideDetails');
		that.next().fadeOut(300);
		that.children().removeClass('glyphicon-zoom-in').addClass('glyphicon-zoom-out');
		that.parent().parent().next().fadeIn(300);		
	}
	else{
		that.removeClass('hideDetails').addClass('showDetails');
		that.next().fadeIn(300);
		that.children().removeClass('glyphicon-zoom-out').addClass('glyphicon-zoom-in');
		that.parent().parent().next().fadeOut(300);		
	}

	event.stopPropagation();
}

$('.btnDetails').on('click', details);