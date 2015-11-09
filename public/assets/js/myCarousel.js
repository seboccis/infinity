function showCard(event)
{
	event.preventDefault();

	var imgId = $(this).attr('data-carouselCard');

	$(".carouselCard").fadeOut(0);

	$('#'+imgId).fadeIn(0);

	event.stopPropagation();
}

$('.carouselImg').on('click', showCard);