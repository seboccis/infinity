function goBackToFrontOffice(event)
{
	event.preventDefault();

	var url = $(this).attr('data-href');
	$(location).attr('href', url);

	event.stopPropagation();
}

$('.btnBackToFrontOffice').on('click', goBackToFrontOffice);