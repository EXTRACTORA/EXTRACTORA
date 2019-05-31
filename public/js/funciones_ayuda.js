
// $(this).data("id")
// console.log($(this).find('td:eq(1)').text());
// $("#codigo_perfil").val($(this).find('td:eq(0)').text());
$(document).ready( function () {    


    


    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // })
} );
 // nthTabs = $("#main-tabs").nthTabs();

 //    nthTabs.addTab({
 //        id: 'home',
 //        title: 'Home',
 //        url: "https://www.jqueryscript.net",
 //        active: true,
 //        allowClose: false
 //    });

 //    nthTabs.addTab({
 //        id: 'menu-manage',
 //        title: 'Menu',
 //        active: false,
 //        content: 'Menu Content'
 //    }).addTab({
 //        id: 'role-manage',
 //        title: 'Role',
 //        active: false,
 //        content: 'Role Content'
 //    });

 //    $("#add-tab-content").on("click", function () {
 //        var id = Math.ceil(Math.random() * 1000);
 //        nthTabs.addTab({
 //            id: "nth-tab-" + id,
 //            title: 'Tab-' + id,
 //            content: 'Tab Content ' + id,
 //            active: true,
 //            allowClose: true,
 //            location: true,
 //            fadeIn: false
 //        })
 //    });

 //    $("#add-tab-url").on("click", function () {
 //        var id = Math.ceil(Math.random() * 1000);
 //        nthTabs.addTab({
 //            id: "nth-tab-" + id,
 //            title: 'URL Tab-' + id,
 //            url: "https://www.jqueryscript.net",
 //            active: true,
 //            allowClose: true,
 //            location: false,
 //            fadeIn: true
 //        });
 //    });

 //    $("#add-tabs").on("click", function () {
 //        nthTabs.addTabs([{
 //            id: 'user-manage',
 //            title: 'User',
 //            content: 'User Content'
 //        }, {
 //            id: 'auth-manage',
 //            title: 'Auth',
 //            content: 'Auth Content'
 //        }]);
 //    });

 //    $("#tab-plantacioness").on('click', function() {

 //     var form = $('#form-index');   
 //     var url = form.attr('action'); 
 //     $.ajax({
 //        url: url,
 //        type: 'GET',
 //        data: form.serialize(),
 //        success: function(response) {   
 //            console.log('response index: ', response.msg);
 //        },
 //        error: function(xhr, status) {
 //            errorAjax(xhr, status);
 //        },
 //    });


 // });   




 // opciones_perfil()


 // $("#nombre_perfil").prop('disabled', false);
 //    $("#descripcion_perfil").prop('disabled', false);
 //    $("#nombre_perfil").attr('disabled','disabled');
 // on click perfiles - INDEX
 // $(".buscar").on('click', function() {   	
 // });

// switch(name) {                    
	// 	case 'perfil': 
	// 	var form = $('#form-index-perfiles');   
	// 	var url = form.attr('action'); 
	// 	$.ajax({
	// 		url: url,
	// 		type: 'GET',
	// 		data: form.serialize(),
	// 		success: function(response) {   
	// 			console.log('response index: ', response.msg);
	// 			$("#modal_perfiles").modal("show");
	// 		},
	// 		error: function(xhr, status) {
	// 			errorAjax(xhr, status);
	// 		},
	// 	});
	// 	break;
	// }

	//				var data =[];
//var CSRF_TOKEN = $("meta[name='csrf-token']").attr("content"); 
	// { _token:CSRF_TOKEN, name: "John", location: "Boston" }


		// var form = $('#form-show-perfiles');   
		// 	var url = form.attr('action').replace(':ID',0); 

		// 	table = $('#example2').DataTable({
			
		// 		"ajax": {
		// 			"type": "GET",
		// 			"url": url ,
		// 			"dataType": "json",
		// 			"headers": {
		// 				"Accept": "application/json;odata=verbose"
		// 			},
		// 			"dataSrc": function (json) {
		// 		                //Make your callback here.
		// 		                return json.data;
		// 		            }				
		// 		        },
		// 		        "lengthChange": false,
  		//       "iDisplayLength": 30,
		// 		    });