var manageCategoriesTable;

$(document).ready(function() {
	// active top navbar categories
	$('#navCategories').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchStduser.php',
		'order': []
	}); // manage categories Data Table

}); // /document

// edit categories function
function editStudent(StdId = null) {
	if(StdId) {
// remove the added categories id 
$('#editStdId').remove();
// reset the form text
$("#editStdForm")[0].reset();
// reset the form text-error
$(".text-danger").remove();
// reset the form group errro		
$('.form-group').removeClass('has-error').removeClass('has-success');

// edit categories messages
$("#edit-Std-messages").html("");
// modal spinner
$('.modal-loading').removeClass('div-hide');
// modal result
$('.edit-Std-result').addClass('div-hide');
//modal footer
$(".editStdFooter").addClass('div-hide');		

$.ajax({
    url: 'php_action/fetchSelectedStdUser.php',
    type: 'post',
    data: {StdId: StdId},
    dataType: 'json',
    success:function(response) {

        // modal spinner
        $('.modal-loading').addClass('div-hide');
        // modal result
        $('.edit-Std-result').removeClass('div-hide');
        //modal footer
        $(".editStdFooter").removeClass('div-hide');	

        
        $("#user_id").val(response.user_id);
        $("#Stdpassword").val(response.password);
        $("#Stdfullname").val(response.fullname);
        $("#Stdemail").val(response.email);
        $("#Stdphone").val(response.phone);
        $("#degree").val(response.degree);
        $("#department").val(response.department);
        $("#col_year").val(response.col_year);
        
        // add the categories id 
        $(".editStdFooter").after('<input type="hidden" name="editStdId" id="editStdId" value="'+response.user_id+'" />');

        // submit of edit categories form
        $("#editStdForm").unbind('submit').bind('submit', function() {
            var userId = $("#user_id").val();
            var StdPassword = $("#Stdpassword").val();
            var StdFullname = $("#Stdfullname").val();
            var StdEmail = $("#Stdemail").val();
            var StdPhone = $("#Stdphone").val();
            var degree = $("#degree").val();
            var department = $("#department").val();
            var colYear = $("#col_year").val();

            if(userId == "") {
                $("#user_id").after('<p class="text-danger">กรุณากรอกรหัสนักศึกษา (ตัวอย่าง:60302xxxx-x *ใส่ขีดด้วย*)</p>');
                $('#user_id').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#user_id").find('.text-danger').remove();
                // success out for form 
                $("#user_id").closest('.form-group').addClass('has-success');	  	
            }

            if(StdPassword == "") {
                $("#Stdpassword").after('<p class="text-danger">กรุณากรอกอักษร a-z,A-z และตัวเลข 0-9 จำนวน 6-10ตัวเท่านั้น</p>');
                $('#Stdpassword').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#Stdpassword").find('.text-danger').remove();
                // success out for form 
                $("#Stdpassword").closest('.form-group').addClass('has-success');	  	
            }

            if(StdFullname == "") {
                $("#Stdfullname").after('<p class="text-danger">กรุณากรอกชื่อ - สกุล</p>');
                $('#Stdfullname').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#Stdfullname").find('.text-danger').remove();
                // success out for form 
                $("#Stdfullname").closest('.form-group').addClass('has-success');	  	
            }
            
            if(StdEmail == "") {
                $("#Stdemail").after('<p class="text-danger">กรุณากรอก E-mail (ใช้ @kkumail.com เท่านั้น)</p>');
                $('#Stdemail').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#Stdemail").find('.text-danger').remove();
                // success out for form 
                $("#Stdemail").closest('.form-group').addClass('has-success');	  	
            }

            if(StdPhone == "") {
                $("#Stdphone").after('<p class="text-danger">กรุณากรอกเบอร์โทรศัพท์</p>');
                $('#Stdphone').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#Stdphone").find('.text-danger').remove();
                // success out for form 
                $("#Stdphone").closest('.form-group').addClass('has-success');	  	
            }

            if(degree == "") {
                $("#degree").after('<p class="text-danger">กรุณาเลือกระดับปริญญา</p>');
                $('#degree').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#degree").find('.text-danger').remove();
                // success out for form 
                $("#degree").closest('.form-group').addClass('has-success');	  	
            }

            if(department == "") {
                $("#department").after('<p class="text-danger">กรุณาเลือกหลักสูตร</p>');
                $('#department').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#department").find('.text-danger').remove();
                // success out for form 
                $("#department").closest('.form-group').addClass('has-success');	  	
            }

            if(colYear == "") {
                $("#col_year").after('<p class="text-danger">กรุณากรอกชั้นปี</p>');
                $('#col_year').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#col_year").find('.text-danger').remove();
                // success out for form 
                $("#col_year").closest('.form-group').addClass('has-success');	  	
            }

            if(userId && StdPassword && StdFullname && StdEmail && StdPhone && degree && department && colYear) {
                var form = $(this);
                // button loading
                $("#editStdBtn").button('loading');

                $.ajax({
                    url : form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    success:function(response) {
                        // button loading
                        $("#editStdBtn").button('reset');

                        if(response.success == true) {
                            // reload the manage member table 
                            manageCategoriesTable.ajax.reload(null, false);									  	  			
                            
                            // remove the error text
                            $(".text-danger").remove();
                            // remove the form error
                            $('.form-group').removeClass('has-error').removeClass('has-success');
                        
                        $('#edit-Std-messages').html(
                            
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
		url: 'php_action/fetchSelectedStdUser.php',
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