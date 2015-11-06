function initFormReservation()
{
	$('#responseFormReservation').empty().css({'display':'none'}).removeClass('alert-danger').addClass('alert-success');

	$('#inputName').parent().removeClass('has-error');
	$('#inputPhoneNumber').parent().removeClass('has-error');
	$('#inputEmail').parent().removeClass('has-error');
	$('#inputOrigin').parent().removeClass('has-error');
	$('#inputDestination').parent().removeClass('has-error');

	$('#errorSpanName').empty().css({'display':'none'});
	$('#errorSpanPhoneNumber').empty().css({'display':'none'});
	$('#errorSpanEmail').empty().css({'display':'none'});
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
	if(errorSpans['errorOrigin'].length > 0){
		$('#inputOrigin').parent().addClass('has-error');
		$('#errorSpanOrigin').css({'display':'inline'}).html(errorSpans['errorOrigin']);
	}
	if(errorSpans['errorDestination'].length > 0){
		$('#inputDestination').parent().addClass('has-error');
		$('#errorSpanDestination').css({'display':'inline'}).html(errorSpans['errorDestination']);
	}
}

function showDistance(string)
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
		showDistance(arrayResponse['response']);
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

	// $.ajax({
	// 	url: "../assets/functions/cancelPersonalInformations.php"
	// })
	// .done(deleteFormReservationPersonalInformationsInputsValues);

	event.stopPropagation();
}

function cancelFormReservationRequest(event)
{
	event.preventDefault();

	// $.ajax({
	// 	url: "../assets/functions/cancelPersonalInformations.php"
	// })
	// .done(deleteFormReservationPersonalInformationsInputsValues);

	////// Prévoir une requête AJAX pour vider la session des informations sur la demande

	event.stopPropagation();
}

$('#btnCancelFormReservationPersonalInformations').on('click', cancelFormReservationPersonalInformations);
$('#btnCancelFormReservationRequest').on('click', cancelFormReservationRequest);

$('#btnSubmitFormReservation').on('click', validateFormReservation);

google.maps.event.addDomListener(window, 'load', function() {
			var inputOrigin 	 = new google.maps.places.Autocomplete(document.getElementById('inputOrigin'), { types: ['geocode'], componentRestrictions: {country: 'fr'} });
			var inputDestination = new google.maps.places.Autocomplete(document.getElementById('inputDestination'), { types: ['geocode'], componentRestrictions: {country: 'fr'} });
		});