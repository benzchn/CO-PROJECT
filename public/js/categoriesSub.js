var manageCategoriesSubTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navCategories').addClass('active');	

	manageCategoriesSubTable = $('#manageCategoriesSubTable').DataTable({
		'ajax' : 'php_action/fetchCategoriesSub.php',
		'order': []
	}); // manage categories Data Table

	// on click on submit categories form modal
	$('#addCategoriesModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitCategoriesForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#submitCategoriesForm").unbind('submit').bind('submit', function() {
			var categoriesName = $("#categoriesName").val();
			var subPrice = $("#priceSub").val();
			var subGet = $("#getSub").val();
			var subFiscal = $("#fiscalYear").val();

			if(categoriesName == "") {
				$("#categoriesName").after('<p class="text-danger">กรุณากรอกรายการ</p>');
				$('#categoriesName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#categoriesName").find('.text-danger').remove();
				// success out for form 
				$("#categoriesName").closest('.form-group').addClass('has-success');	  	
			}

			if(subPrice == "") {
				$("#priceSub").after('<p class="text-danger">กรุณากรอกราคาต่อหน่วย</p>');
				$('#priceSub').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#priceSub").find('.text-danger').remove();
				// success out for form 
				$("#priceSub").closest('.form-group').addClass('has-success');	  	
			}

			if(subGet == "") {
				$("#getSub").after('<p class="text-danger">กรุณากรอกวิธีที่ได้มา</p>');
				$('#getSub').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#getSub").find('.text-danger').remove();
				// success out for form 
				$("#getSub").closest('.form-group').addClass('has-success');	  	
			}

			if(subFiscal == "") {
				$("#fiscalYear").after('<p class="text-danger">กรุณาเลือกปีงบประมาณ</p>');
				$('#fiscalYear').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#fiscalYear").find('.text-danger').remove();
				// success out for form 
				$("#fiscalYear").closest('.form-group').addClass('has-success');	  	
			}

			if(categoriesName && subPrice && subGet && subFiscal) {
				var form = $(this);
				// button loading
				$("#createCategoriesBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createCategoriesBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageCategoriesSubTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitCategoriesForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-categories-messages').html('<div class="alert alert-success">'+
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
		}); // submit categories form function
	}); // /on click on submit categories form modal	

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
			url: 'php_action/fetchSelectedCategoriesSub.php',
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

				// set the categories code
				// $("#editCategoriesCode").val(response.categories_code);
				// set the categories name
				$("#editCategoriesName").val(response.sublist_title);
				$("#editpriceSub").val(response.sublist_priceperunit);
				$("#editgetSub").val(response.sublist_get);
				$("#editfiscalYear").val(response.sublist_fiscalyear);
				
				// add the categories id 
				$(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesSubId" id="editCategoriesSubId" value="'+response.sublist_id+'" />');


				// submit of edit categories form
				$("#editCategoriesForm").unbind('submit').bind('submit', function() {
					// var categoriesCode = $("#editCategoriesCode").val();
					var categoriesName = $("#editCategoriesName").val();
					var subPrice = $("#editpriceSub").val();
					var subGet = $("#editgetSub").val();
					var subFiscal = $("#editfiscalYear").val();

					if(categoriesName == "") {
						$("#editCategoriesName").after('<p class="text-danger">กรุณากรอกประเภทครุภัณฑ์</p>');
						$('#editCategoriesName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCategoriesName").find('.text-danger').remove();
						// success out for form 
						$("#editCategoriesName").closest('.form-group').addClass('has-success');	  	
					}

					if(subPrice == "") {
						$("#editpriceSub").after('<p class="text-danger">กรุณากรอกราคาต่อหน่วย</p>');
						$('#editpriceSub').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editpriceSub").find('.text-danger').remove();
						// success out for form 
						$("#editpriceSub").closest('.form-group').addClass('has-success');	  	
					}

					if(subGet == "") {
						$("#editgetSub").after('<p class="text-danger">กรุณากรอกวิธีที่ได้มา</p>');
						$('#editgetSub').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editgetSub").find('.text-danger').remove();
						// success out for form 
						$("#editgetSub").closest('.form-group').addClass('has-success');	  	
					}

					if(subFiscal == "") {
						$("#editfiscalYear").after('<p class="text-danger">กรุณาเลือกปีงบประมาณ</p>');
						$('#editfiscalYear').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editfiscalYear").find('.text-danger').remove();
						// success out for form 
						$("#editfiscalYear").closest('.form-group').addClass('has-success');	  	
					}


					if(categoriesName && subPrice && subGet && subFiscal) {
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
									manageCategoriesSubTable.ajax.reload(null, false);									  	  			
									
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
		url: 'php_action/fetchSelectedCategoriesSub.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeCategoriesSub.php',
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
							manageCategoriesSubTable.ajax.reload(null, false);
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