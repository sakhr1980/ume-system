jQuery(document).ready(function() {
	// Enable date picker
	jQuery('*[data-datepicker="true"] input[type="text"]').datepicker({
		format: 'yyyy-mm-dd',
		dates: 'daysShort'
	});

	// Confirm Delete
	jQuery('.confirm-delete').click(function() {
		return confirm("Do you want to delete?")?void 0:!1;
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

});