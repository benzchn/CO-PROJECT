var manageCategoriesTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navCategories').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchRent.php',
		'order': []
	}); // manage categories Data Table

}); // /document

// edit categories function
function editCategories(categoriesId = null) {
	if(categoriesId) {
		// remove the added categories id 
		$('#editCategoriesId').remove();
		// reset the form text
		$("#editCategoriesForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-categories-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-categories-result').addClass('div-hide');
		//modal footer
		$(".editCategoriesFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedRent.php',
			type: 'post',
			data: {categoriesId: categoriesId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-categories-result').removeClass('div-hide');
				//modal footer
				$(".editCategoriesFooter").removeClass('div-hide');	

				
				$("#editProductCode").val(response.product_code);
                $("#editUser").val(response.fullname);
                $("#RentStatus").val(response.rent_status);
                $("#RentEtc").val(response.rent_etc);
                $("#RentDate").val(response.rent_date);
                $("#ReturnDateFix").val(response.return_datefix);
                $("#ReturnDate").val(response.return_date);
				
				// add the categories id 
				$(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="'+response.rent_id+'" />');


				// submit of edit categories form
				$("#editCategoriesForm").unbind('submit').bind('submit', function() {
					// var editProductCode = $("#editProductCode").val();
                    // var editUser = $("#editUser").val();
                    var RentStatus = $("#RentStatus").val();
                    var RentEtc = $("#RentEtc").val();
                    var RentDate = $("#RentDate").val();
                    var ReturnDateFix = $("#ReturnDateFix").val();
                    // var ReturnDate = $("#ReturnDate").val();
					

                    
                    if(RentStatus == "") {
						$("#RentStatus").after('<p class="text-danger">กรุณาเลือกสถานะ</p>');
						$('#RentStatus').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#RentStatus").find('.text-danger').remove();
						// success out for form 
						$("#RentStatus").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    if(RentEtc == "") {
						$("#RentEtc").after('<p class="text-danger">กรุณากรอกหมายเหตุ</p>');
						$('#RentEtc').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#RentEtc").find('.text-danger').remove();
						// success out for form 
						$("#RentEtc").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    if(RentDate == "") {
						$("#RentDate").after('<p class="text-danger">กรุณาเลือกวันที่ยืม</p>');
						$('#RentDate').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#RentDate").find('.text-danger').remove();
						// success out for form 
						$("#RentDate").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    if(ReturnDateFix == "") {
						$("#ReturnDateFix").after('<p class="text-danger">กรุณาเลือกวันที่กำหนดคืน</p>');
						$('#ReturnDateFix').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#ReturnDateFix").find('.text-danger').remove();
						// success out for form 
						$("#ReturnDateFix").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    // if(ReturnDate == "") {
					// 	$("#ReturnDate").after('<p class="text-danger">กรุณากรอกประเภทครุภัณฑ์</p>');
					// 	$('#ReturnDate').closest('.form-group').addClass('has-error');
					// } else {
						
					// 	$("#ReturnDate").find('.text-danger').remove();
						 
					// 	$("#ReturnDate").closest('.form-group').addClass('has-success');	  	
					// }


					if(RentStatus && RentEtc && RentDate && ReturnDateFix) {
						var form = $(this);
						// button loading
						$("#editCategoriesBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editCategoriesBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageCategoriesTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-categories-messages').html(
									
								'<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages + 
				          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}  // if

							} // /success
						}); // /ajax	
					} // if


					return false;
				}); // /submit of edit categories form

			} // /success
		}); // /fetch the selected categories data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit categories function

// remove categories function
function removeCategories(categoriesId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedRent.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeRent.php',
					type: 'post',
					data: {categoriesId: categoriesId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeCategoriesBtn").button('reset');
							// close the modal 
							$("#removeCategoriesModal").modal('hide');
							// update the manage categories table
							manageCategoriesTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removeCategoriesModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // /ajax function to fetch the categories data
} // remove categories function