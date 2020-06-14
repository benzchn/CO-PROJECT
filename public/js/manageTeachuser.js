var manageCategoriesTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navCategories').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchTeachuser.php',
		'order': []
	}); // manage categories Data Table

}); // /document

// edit categories function
function editTeach(TeachId = null) {
	if(TeachId) {
		// remove the added categories id 
		$('#editTeachId').remove();
		// reset the form text
		$("#editTeachForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-Teach-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-Teach-result').addClass('div-hide');
		//modal footer
		$(".editTeachFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedTeachUser.php',
			type: 'post',
			data: {TeachId: TeachId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-Teach-result').removeClass('div-hide');
				//modal footer
				$(".editTeachFooter").removeClass('div-hide');	

				
                $("#Teachemail").val(response.email);
                $("#Teachpassword").val(response.password);
                $("#Teachfullname").val(response.fullname);
				$("#Teachphone").val(response.phone);
				
				// add the categories id 
				$(".editTeachFooter").after('<input type="hidden" name="editTeachId" id="editTeachId" value="'+response.user_id+'" />');
                // $(".editCategoriesFooter").after('<input type="hidden" name="role" id="role" value="'+response.role_id+'" />');

				// submit of edit categories form
				$("#editTeachForm").unbind('submit').bind('submit', function() {
                    var TeachEmail = $("#Teachemail").val();
                    var TeachPassword = $("#Teachpassword").val();
					var TeachFullname = $("#Teachfullname").val();
					var TeachPhone = $("#Teachphone").val();

					if(TeachEmail == "") {
						$("#Teachemail").after('<p class="text-danger">กรุณากรอก E-mail (ใช้ xx@kku.ac.th เท่านั้น)</p>');
						$('#Teachemail').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#Teachemail").find('.text-danger').remove();
						// success out for form 
						$("#Teachemail").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    if(TeachPassword == "") {
						$("#Teachpassword").after('<p class="text-danger">กรุณากรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10ตัวเท่านั้น</p>');
						$('#Teachpassword').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#Teachpassword").find('.text-danger').remove();
						// success out for form 
						$("#Teachpassword").closest('.form-group').addClass('has-success');	  	
					}

					if(TeachFullname == "") {
						$("#Teachfullname").after('<p class="text-danger">กรุณากรอกชื่อ - สกุล</p>');
						$('#Teachfullname').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#Teachfullname").find('.text-danger').remove();
						// success out for form 
						$("#Teachfullname").closest('.form-group').addClass('has-success');	  	
                    }
                    
                    if(TeachPhone == "") {
						$("#Teachphone").after('<p class="text-danger">กรุณากรอกเบอร์โทรศัพท์</p>');
						$('#Teachphone').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#Teachphone").find('.text-danger').remove();
						// success out for form 
						$("#Teachphone").closest('.form-group').addClass('has-success');	  	
					}

					if(TeachEmail && TeachPassword && TeachFullname && TeachPhone) {
						var form = $(this);
						// button loading
						$("#editTeachBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editTeachBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageCategoriesTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-Teach-messages').html(
									
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
		url: 'php_action/fetchSelectedTeachUser.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeUser.php',
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