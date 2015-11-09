function showCard(event)
{
	event.preventDefault();

	var imgId = $(this).attr('data-carouselCard');

	$(".carouselCard").fadeOut(0);
	$(".carousel").fadeOut(0);

	$('#'+imgId).fadeIn(0);

	event.stopPropagation();
}

function showCarousel(event)
{
	event.preventDefault();

	$(".carouselCard").fadeOut(0);
	$(".carousel").fadeIn(0);

	event.stopPropagation();
}

$('.carouselImg').on('click', showCard);
$('.btnBackToCarousel').on('click', showCarousel);