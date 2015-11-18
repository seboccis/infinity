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

function addCar(event)
{
	event.preventDefault();

// Implémenter l'ajout d'un véhicule

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

$('section').on('click', '.anchorDeleteCarCard', deleteCar);
$('.btnAddCar').on('click', addCar);
$('.btnBackToFrontOffice').on('click', goBackToFrontOffice);
$(window).on('load', initPage);