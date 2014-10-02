jQuery(document).ready(function() {
	// Enable date picker
	jQuery('*[data-datepicker="true"] input[type="text"]').datepicker({
		format: 'yyyy-mm-dd',
		dates: 'daysShort'
	});

	// Confirm Delete
	jQuery('.confirm-delete').click(function() {
		return confirm("Do you want to delete?") ? void 0 : !1;
	});

	//
	jQuery.validator.addClassRules({
		required: {
			required: true
		},
		requiredNum: {
			number: true
		}
	});
	jQuery(".formValidator").validate({
	});

	jQuery("#tbl_students_stu_id").blur(function() {
		var url = location.protocol + '//' + location.host + '/payments/students/showStudent';
		jQuery.ajax({
			url: url,
			type: 'post',
			data: {'student_id': jQuery('#tbl_students_stu_id').val()},
		}).done(function(data) {
			var names = data.split(',');
			jQuery('#student_name_in_latin').val(names[0]);
			jQuery('#name_in_khmer').val(names[1]);
			jQuery('#stu_sex').val(names[2]);
		});
	});

	/**
	 * Register cookie for tab panel
	 * author: Man Math
	 * date: 02.10.2014
	 */
	jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
		//save the latest tab using a cookie:
		jQuery.cookie('ci_last_tab', jQuery(e.target).attr('href'));
	});
	//activate latest tab, if it exists:
	var lastTab = jQuery.cookie('ci_last_tab');
	if (lastTab) {
		jQuery('a[href=' + lastTab + ']').tab('show');
	} else {
		// Set the first tab if cookie do not exist
		jQuery('a[data-toggle="tab"]:first').tab('show');
	}
});