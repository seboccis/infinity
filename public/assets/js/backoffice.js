function showCarCard(response)
{
	$('#carTable').fadeOut(500).empty();
	$('.divAddCar').fadeOut(0);
	$('.carCard').html(response).fadeIn(500);
}

function getEditCarCard(event)
{
	event.preventDefault();

	var idCar 	   = $(this).attr('data-ajax-id');
	var path	   = $(this).attr('data-ajax-path');

	$.ajax({
		url: path,
		data:{
			id: idCar,
		} 
	})
	.done(showCarCard);

	event.stopPropagation();
}

function deleteCar(event)
{
	event.preventDefault();

	var idCar 	   = $(this).attr('data-ajax-id');
	var path	   = $(this).attr('data-ajax-path');
	var legendCar  = $(this).attr('data-legend');
	var confirmMsg = "Êtes-vous sûr de vouloir détruire le véhicule :\n"
					+ legendCar;

	if(confirm(confirmMsg)){
		$.ajax({
			url: path,
			data:{
				id: idCar,
			} 
		})
		.done(initCarTable);
	}

	event.stopPropagation();
}

function getAddCarCard(event)
{
	event.preventDefault();

	var path = $(this).attr('data-ajax-path');

	$.ajax({
		url: path, 
	})
	.done(showCarCard);

	event.stopPropagation();
}

function goBackToCarTable(event)
{
	event.preventDefault();

	initCarTable();
	$('.carCard').empty().fadeOut(500);
	$('#carTable').fadeIn(500);
	$('.divAddCar').fadeIn(0);

	event.stopPropagation();
}

function goBackToFrontOffice(event)
{
	event.preventDefault();

	var url = $(this).attr('data-href');
	$(location).attr('href', url);

	event.stopPropagation();
}

function showCarTable(response)
{
	$('#carTable').html(response);
}

function initCarTable()
{
	var path = $('#carTable').attr('data-ajax-path');

	$.ajax({
		url: path, 
	})
	.done(showCarTable);
}

function initPage()
{
	if($('.page-header .navbar-collapse ul.nav li:nth-child(2)').hasClass('active')){
		initCarTable();
	}
}

$('section').on('click', '.anchorEditCarCard', getEditCarCard);
$('section').on('click', '.anchorDeleteCarCard', deleteCar);
$('.btnAddCarCard').on('click', getAddCarCard);
$('section').on('click', '.btnGoBackToCarTable', goBackToCarTable);
$('.btnBackToFrontOffice').on('click', goBackToFrontOffice);
$(window).on('load', initPage);