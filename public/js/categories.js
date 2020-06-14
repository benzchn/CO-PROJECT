// var manageCategoriesTable;

// $(document).ready(function() {
//     // active top navbar categories
//     $('#navCategories').addClass('active');

//     manageCategoriesTable = $('#manageCategoriesTable').DataTable({
//         'ajax': 'php_action/fetchCategories.php',
//         'order': []
//     }); // manage categories Data Table

//     // on click on submit categories form modal
//     $('#addCategoriesModalBtn').unbind('click').bind('click', function() {
//         // reset the form text
//         $("#submitCategoriesForm")[0].reset();
//         // remove the error text
//         $(".text-danger").remove();
//         // remove the form error
//         $('.form-group').removeClass('has-error').removeClass('has-success');

//         // submit categories form function
//         $("#submitCategoriesForm").unbind('submit').bind('submit', function() {
//             var categories_code = $("#categories_code").val();
//             var categories_name = $("#categories_name").val();

//             if (categories_code == "") {
//                 $("#categories_code").after('<p class="text-danger">กรุณากรอกรหัสประเภทครุภัณฑ์</p>');
//                 $('#categories_code').closest('.form-group').addClass('has-error');
//             } else {
//                 // remov error text field
//                 $("#categories_code").find('.text-danger').remove();
//                 // success out for form
//                 $("#categories_code").closest('.form-group').addClass('has-success');
//             }

//             if (categories_name == "") {
//                 $("#categories_name").after('<p class="text-danger">กรุณากรอกประเภทครุภัณฑ์</p>');
//                 $('#categories_name').closest('.form-group').addClass('has-error');
//             } else {
//                 // remov error text field
//                 $("#categories_name").find('.text-danger').remove();
//                 // success out for form
//                 $("#categories_name").closest('.form-group').addClass('has-success');
//             }

//             if (categories_code && categories_name) {
//                 var form = $(this);
//                 // button loading
//                 $("#createCategoriesBtn").button('loading');

//                 $.ajax({
//                     url: form.attr('action'),
//                     type: form.attr('method'),
//                     data: form.serialize(),
//                     dataType: 'json',
//                     success: function(response) {
//                             // button loading
//                             $("#createCategoriesBtn").button('reset');

//                             if (response.success == true) {
//                                 // reload the manage member table
//                                 manageCategoriesTable.ajax.reload(null, false);

//                                 // reset the form text
//                                 $("#submitCategoriesForm")[0].reset();
//                                 // remove the error text
//                                 $(".text-danger").remove();
//                                 // remove the form error
//                                 $('.form-group').removeClass('has-error').removeClass('has-success');

//                                 $('#add-categories-messages').html('<div class="alert alert-success">' +
//                                     '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
//                                     '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
//                                     '</div>');

//                                 $(".alert-success").delay(500).show(10, function() {
//                                     $(this).delay(3000).hide(10, function() {
//                                         $(this).remove();
//                                     });
//                                 }); // /.alert
//                             } // if

//                         } // /success
//                 }); // /ajax
//             } // if

//             return false;
//         }); // submit categories form function
//     }); // /on click on submit categories form modal

// }); // /document

// // edit categories function
// function editCategories(categoriesId = null) {
//     if (categoriesId) {
//         // remove the added categories id
//         $('#editCategoriesId').remove();
//         // reset the form text
//         $("#editCategoriesForm")[0].reset();
//         // reset the form text-error
//         $(".text-danger").remove();
//         // reset the form group errro
//         $('.form-group').removeClass('has-error').removeClass('has-success');

//         // edit categories messages
//         $("#edit-categories-messages").html("");
//         // modal spinner
//         $('.modal-loading').removeClass('div-hide');
//         // modal result
//         $('.edit-categories-result').addClass('div-hide');
//         //modal footer
//         $(".editCategoriesFooter").addClass('div-hide');

//         $.ajax({
//             url: 'php_action/fetchSelectedCategories.php',
//             type: 'post',
//             data: {
//                 categoriesId: categoriesId
//             },
//             dataType: 'json',
//             success: function(response) {

//                     // modal spinner
//                     $('.modal-loading').addClass('div-hide');
//                     // modal result
//                     $('.edit-categories-result').removeClass('div-hide');
//                     //modal footer
//                     $(".editCategoriesFooter").removeClass('div-hide');

//                     // set the categories code
//                     $("#editcategories_code").val(response.categories_code);
//                     // set the categories name
//                     $("#editcategories_name").val(response.categories_name);

//                     // add the categories id
//                     $(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="' + response.categories_id + '" />');


//                     // submit of edit categories form
//                     $("#editCategoriesForm").unbind('submit').bind('submit', function() {
//                         var categories_code = $("#editcategories_code").val();
//                         var categories_name = $("#editcategories_name").val();


//                         if (categories_code == "") {
//                             $("#editcategories_code").after('<p class="text-danger">กรุณากรอกรหัสประเภทครุภัณฑ์</p>');
//                             $('#editcategories_code').closest('.form-group').addClass('has-error');
//                         } else {
//                             // remov error text field
//                             $("#editcategories_code").find('.text-danger').remove();
//                             // success out for form
//                             $("#editcategories_code").closest('.form-group').addClass('has-success');
//                         }

//                         if (categories_name == "") {
//                             $("#editcategories_name").after('<p class="text-danger">กรุณากรอกประเภทครุภัณฑ์</p>');
//                             $('#editcategories_name').closest('.form-group').addClass('has-error');
//                         } else {
//                             // remov error text field
//                             $("#editcategories_name").find('.text-danger').remove();
//                             // success out for form
//                             $("#editcategories_name").closest('.form-group').addClass('has-success');
//                         }


//                         if (categories_code && categories_name) {
//                             var form = $(this);
//                             // button loading
//                             $("#editCategoriesBtn").button('loading');

//                             $.ajax({
//                                 url: form.attr('action'),
//                                 type: form.attr('method'),
//                                 data: form.serialize(),
//                                 dataType: 'json',
//                                 success: function(response) {
//                                         // button loading
//                                         $("#editCategoriesBtn").button('reset');

//                                         if (response.success == true) {
//                                             // reload the manage member table
//                                             manageCategoriesTable.ajax.reload(null, false);

//                                             // remove the error text
//                                             $(".text-danger").remove();
//                                             // remove the form error
//                                             $('.form-group').removeClass('has-error').removeClass('has-success');

//                                             $('#edit-categories-messages').html(

//                                                 '<div class="alert alert-success">' +
//                                                 '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
//                                                 '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
//                                                 '</div>');

//                                             $(".alert-success").delay(500).show(10, function() {
//                                                 $(this).delay(3000).hide(10, function() {
//                                                     $(this).remove();
//                                                 });
//                                             }); // /.alert
//                                         } // if

//                                     } // /success
//                             }); // /ajax
//                         } // if


//                         return false;
//                     }); // /submit of edit categories form

//                 } // /success
//         }); // /fetch the selected categories data

//     } else {
//         alert('Oops!! Refresh the page');
//     }
// } // /edit categories function

// // remove categories function
// function removeCategories(categoriesId = null) {

//     $.ajax({
//         url: 'php_action/fetchSelectedCategories.php',
//         type: 'post',
//         data: {
//             categoriesId: categoriesId
//         },
//         dataType: 'json',
//         success: function(response) {

//                 // remove categories btn clicked to remove the categories function
//                 $("#removeCategoriesBtn").unbind('click').bind('click', function() {
//                     // remove categories btn
//                     $("#removeCategoriesBtn").button('loading');

//                     $.ajax({
//                         url: 'php_action/removeCategories.php',
//                         type: 'post',
//                         data: {
//                             categoriesId: categoriesId
//                         },
//                         dataType: 'json',
//                         success: function(response) {
//                                 if (response.success == true) {
//                                     // remove categories btn
//                                     $("#removeCategoriesBtn").button('reset');
//                                     // close the modal
//                                     $("#removeCategoriesModal").modal('hide');
//                                     // update the manage categories table
//                                     manageCategoriesTable.ajax.reload(null, false);
//                                     // udpate the messages
//                                     $('.remove-messages').html('<div class="alert alert-success">' +
//                                         '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
//                                         '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
//                                         '</div>');

//                                     $(".alert-success").delay(500).show(10, function() {
//                                         $(this).delay(3000).hide(10, function() {
//                                             $(this).remove();
//                                         });
//                                     }); // /.alert
//                                 } else {
//                                     // close the modal
//                                     $("#removeCategoriesModal").modal('hide');

//                                     // udpate the messages
//                                     $('.remove-messages').html('<div class="alert alert-success">' +
//                                         '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
//                                         '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
//                                         '</div>');

//                                     $(".alert-success").delay(500).show(10, function() {
//                                         $(this).delay(3000).hide(10, function() {
//                                             $(this).remove();
//                                         });
//                                     }); // /.alert
//                                 } // /else


//                             } // /success function
//                     }); // /ajax function request server to remove the categories data
//                 }); // /remove categories btn clicked to remove the categories function

//             } // /response
//     }); // /ajax function to fetch the categories data
// } // remove categories function

// $(document).ready(function() {
//     $('#editCategoriesModal').on('show.bs.modal', function(event) {
//         var button = $(event.relatedTarget)
//         var id = button.data('id')
//         var code = button.data('code')
//         var name = button.data('name')

//         modal.find('.modal-body #categories_id').val(id);
//         modal.find('.modal-body #categories_code').val(code);
//         modal.find('.modal-body #categories_name').val(name);

//     })
// })