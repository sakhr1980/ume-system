jQuery(document).ready(function() {
	// Enable date picker
	jQuery('*[data-datepicker="true"] input[type="text"]').datepicker({
		format: 'yyyy-mm-dd',
		dates: 'daysShort'
	});
});