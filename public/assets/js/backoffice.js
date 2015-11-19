function showCarCard(response)
{
	$('#carTable').fadeOut(500).empty();
	$('.carCard').html(response).fadeIn(500);
}

function showConfirmCarCard(response)
{
	$('.carCard').fadeOut(500);
	$('.confirmCarCard').html(response).fadeIn(500);
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

function getConfirmEditCarCard(event)
{
	event.preventDefault();

	var path = $(this).attr('data-ajax-path');

	$.ajax({
		url: path, 
	})
	.done(showConfirmCarCard);

	event.stopPropagation();
}

function editCar(event)
{
	event.preventDefault();

	var path = $('.btnEditCar').attr('data-ajax-path');

	$.ajax({
		url: path, 
	})
	.done(goBackToCarTable);

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

function getConfirmAddCarCard(event)
{
	event.preventDefault();

	var path = $(this).attr('data-ajax-path');

	$.ajax({
		url: path, 
	})
	.done(showConfirmCarCard);

	event.stopPropagation();
}

function addCar(event)
{
	event.preventDefault();

	var path = $('.btnAddCar').attr('data-ajax-path');

	$.ajax({
		url: path, 
	})
	.done(goBackToCarTable);

	event.stopPropagation();
}

function goBackToCarCard(event)
{
	event.preventDefault();

	$('.confirmCarCard').empty().fadeOut(500);
	$('.carCard').fadeIn(500);

	event.stopPropagation();
}

function goBackToCarTable()
{

	initCarTable();
	$('.carCard').empty().fadeOut(500);
	$('.confirmCarCard').empty().fadeOut(500);
	$('#carTable').fadeIn(500);

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

$(window).on('load', initPage);
$('section').on('click', '.anchorEditCarCard', getEditCarCard);
$('section').on('click', '.btnGetConfirmEditCarCard', getConfirmEditCarCard);
$('section').on('click', '.btnEditCar', editCar);
$('section').on('click', '.anchorDeleteCarCard', deleteCar);
$('section').on('click', '.btnAddCarCard', getAddCarCard);
$('section').on('click', '.btnGetConfirmAddCarCard', getConfirmAddCarCard);
$('section').on('click', '.btnAddCar', addCar);
$('section').on('click', '.btnGoBackToCarCard', goBackToCarCard);
$('section').on('click', '.btnGoBackToCarTable', goBackToCarTable);
$('.btnBackToFrontOffice').on('click', goBackToFrontOffice);