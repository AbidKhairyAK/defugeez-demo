$('.search-container').hide(false);

$('.search-trigger').click(function(){
	$('.search-container').slideToggle(function(){
		$('.search-input').focus();
	});
});

$('.search-container .dropdown-item').click(function(){
	// window.history.pushState("", "", '?filter='+filter.toLowerCase()+'');
	var filter = $(this).text().replace('Nama ', '');
	$('.search-filter').text(filter);
	$('input[name=filter]').val(filter.toLowerCase());
	$('.search-input').focus();
});

$('[data-toggle="tooltip"]').tooltip(); 
