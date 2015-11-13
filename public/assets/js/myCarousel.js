function redirectToReservation(response)
{
	$(location).attr('href', response);
}

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

function selectCar(event)
{
	event.preventDefault();

	var path = $(this).attr('data-ajax-path');
	var idCar = $(this).attr("data-car-id");
	var pathToReservation = $(this).attr('data-ajax-pathResponse');

	$.ajax({
		url: path,
		data: 	{
					id: idCar,
					pathResponse: pathToReservation
				}
	})
	.done(redirectToReservation);

	event.stopPropagation();
}

$('.carouselImg').on('click', showCard);
$('.btnBackToCarousel').on('click', showCarousel);
$('.btnSelectCar').on('click', selectCar);