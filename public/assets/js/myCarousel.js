function redirectToReservation(response)
{
	$(location).attr('href', response);
}

function showCarouselCard(response)
{
	$(".carousel").fadeOut(500);
	$(".carouselCard").html(response).fadeIn(500);

}

function getCarouselCard(event)
{
	event.preventDefault();

	var path 		   = $(this).attr('data-ajax-path');
	var carouselCardId = $(this).attr('data-ajax-carouselCardId');

	$.ajax({
		url: path,
		data: 	{
					id: carouselCardId,
				}
	})
	.done(showCarouselCard);

	event.stopPropagation();
}

function showCarousel(event)
{
	event.preventDefault();


	$(".carouselCard").fadeOut(500);
	$(".carousel").fadeIn(500);
	$(".carouselCard").empty();

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

$('.carouselImg').on('click', getCarouselCard);
$('.carouselCard').on('click','.btnBackToCarousel', showCarousel);
$('.carouselCard').on('click','.btnSelectCar', selectCar);