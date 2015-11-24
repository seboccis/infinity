function initFormReservation()
{
	$('#responseFormReservation').empty().css({'display':'none'}).removeClass('alert-danger').addClass('alert-success');

	$('#inputName').parent().removeClass('has-error');
	$('#inputPhoneNumber').parent().removeClass('has-error');
	$('#inputEmail').parent().removeClass('has-error');
	$('#selectCategory').parent().removeClass('has-error');
	$('#selectCar').parent().removeClass('has-error');
	$('#inputDate').parent().removeClass('has-error');
	$('#inputOrigin').parent().removeClass('has-error');
	$('#inputDestination').parent().removeClass('has-error');

	$('#errorSpanName').empty().css({'display':'none'});
	$('#errorSpanPhoneNumber').empty().css({'display':'none'});
	$('#errorSpanEmail').empty().css({'display':'none'});
	$('#errorSpanCategory').empty().css({'display':'none'});
	$('#errorSpanCar').empty().css({'display':'none'});
	$('#errorSpanDate').empty().css({'display':'none'});
	$('#errorSpanOrigin').empty().css({'display':'none'});
	$('#errorSpanDestination').empty().css({'display':'none'});

}

function showErrorSpan(errorSpans)
{
	if(errorSpans['errorName'].length > 0){
		$('#inputName').parent().addClass('has-error');
		$('#errorSpanName').css({'display':'inline'}).html(errorSpans['errorName']);
	}
	if(errorSpans['errorPhoneNumber'].length > 0){
		$('#inputPhoneNumber').parent().addClass('has-error');
		$('#errorSpanPhoneNumber').css({'display':'inline'}).html(errorSpans['errorPhoneNumber']);
	}
	if(errorSpans['errorEmail'].length > 0){
		$('#inputEmail').parent().addClass('has-error');
		$('#errorSpanEmail').css({'display':'inline'}).html(errorSpans['errorEmail']);
	}
	if(errorSpans['errorCategory'].length > 0){
		$('#selectCategory').parent().addClass('has-error');
		$('#errorSpanCategory').css({'display':'inline'}).html(errorSpans['errorCategory']);
	}
	if(errorSpans['errorCar'].length > 0){
		$('#selectCar').parent().addClass('has-error');
		$('#errorSpanCar').css({'display':'inline'}).html(errorSpans['errorCar']);
	}
	if(errorSpans['errorDate'].length > 0){
		$('#inputDate').parent().addClass('has-error');
		$('#errorSpanDate').css({'display':'inline'}).html(errorSpans['errorDate']);
	}
	if(errorSpans['errorOrigin'].length > 0){
		$('#inputOrigin').parent().addClass('has-error');
		$('#errorSpanOrigin').css({'display':'inline'}).html(errorSpans['errorOrigin']);
	}
	if(errorSpans['errorDestination'].length > 0){
		$('#inputDestination').parent().addClass('has-error');
		$('#errorSpanDestination').css({'display':'inline'}).html(errorSpans['errorDestination']);
	}
}

function showResponseFormReservation(string)
{
	$('#responseFormReservation').text(string).fadeIn(0);
}

function showValidationFormReservation(response)
{
	var arrayResponse = jQuery.parseJSON(response);

	initFormReservation();

	if(arrayResponse['reservation'] == 'novalid'){
		showErrorSpan(arrayResponse['errorSpans']);
		$('#responseFormReservation').text('Veuillez remplir les champs obligatoires.').css({'display':'block'}).removeClass('alert-success').addClass('alert-danger');
	}
	else{
		showResponseFormReservation(arrayResponse['response']);
	}
}

function validateFormReservation(event)
{
	event.preventDefault();

	var path = $('#btnSubmitFormReservation').attr('data-ajax-path');

	$.ajax({
		url: path,
		data: $('#formReservationPersonalInformations').serialize()+'&'+ $('#formReservationRequest').serialize()
	})
	.done(showValidationFormReservation);

	event.stopPropagation();
}

function deleteFormReservationPersonalInformationsInputsValues()
{
	$(':input','#formReservationPersonalInformations')
  	.removeAttr('checked')
  	.removeAttr('selected')
  	.not(':button, :radio, :checkbox')
  	.val('');
}

function cancelFormReservationPersonalInformations(event)
{
	event.preventDefault();

	var path = $(this).attr('data-ajax-path');

	$.ajax({
		url: path
	})
	.done(deleteFormReservationPersonalInformationsInputsValues);

	event.stopPropagation();
}

$('#btnCancelFormReservationPersonalInformations').on('click', cancelFormReservationPersonalInformations);

$('#btnSubmitFormReservation').on('click', validateFormReservation);


//// Partie Request de la réservation

function deleteFormReservationRequestInputsValues()
{
	$(':input','#formReservationRequest')
  	.removeAttr('checked')
  	.removeAttr('selected')
  	.not(':button, :radio, :checkbox')
  	.val('');

  	$(':input option[class="defaultOption"]','#formReservationRequest').prop('selected', true);
}

function cancelFormReservationRequest(event)
{
	event.preventDefault();

	var path = $(this).attr('data-ajax-path');

	$.ajax({
		url: path
	})
	.done(deleteFormReservationRequestInputsValues);

	event.stopPropagation();
}

$('#btnCancelFormReservationRequest').on('click', cancelFormReservationRequest);

function initRequest()
{
	var category = $('#selectCategory option:selected').attr('value');
	
	$('.hiddenFormGroup').fadeOut(0);

	if(category == 1){
		$('.formGroupTransfert').fadeIn(0);
	}
	else if(category == 2){
		$('.formGroupDisposition').fadeIn(0);
	}
	else if(category == 3){
		$('.formGroupExcursion').fadeIn(0);
	}
	else if(category == 4){

	}
	else if(category == 5){
		$('.formGroupConciergerie').fadeIn(0);
	}
}

$('#selectCategory').on('change', initRequest);

google.maps.event.addDomListener(window, 'load', function() {
			var inputAddress 	 = new google.maps.places.Autocomplete(document.getElementById('inputAddress'), { types: ['geocode'], componentRestrictions: {country: 'fr'} });
			var inputOrigin 	 = new google.maps.places.Autocomplete(document.getElementById('inputOrigin'), { types: ['geocode'], componentRestrictions: {country: 'fr'} });
			var inputDestination = new google.maps.places.Autocomplete(document.getElementById('inputDestination'), { types: ['geocode'], componentRestrictions: {country: 'fr'} });
			initRequest();
		});


// Calendrier

/* French initialisation for the jQuery UI date picker plugin. */
/* Written by Keith Wood (kbwood{at}iinet.com.au),
			  Stéphane Nahmani (sholby@sholby.net),
			  Stéphane Raimbault <stephane.raimbault@gmail.com> */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../jquery.ui.datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {
	datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin',
			'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
		monthNamesShort: ['janv.', 'févr.', 'mars', 'avril', 'mai', 'juin',
			'juil.', 'août', 'sept.', 'oct.', 'nov.', 'déc.'],
		dayNames: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
		dayNamesShort: ['dim.', 'lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.'],
		dayNamesMin: ['D','L','M','M','J','V','S'],
		weekHeader: 'Sem.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	datepicker.setDefaults(datepicker.regional['fr']);

	return datepicker.regional['fr'];

}));

function showCalendar(event)
{
	event.preventDefault();
	$( "#inputDate" ).focus();
	event.stopPropagation();
}

$( "#inputDate" ).datepicker();
$('.showCalendar').on('click',showCalendar);


//////