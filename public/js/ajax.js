// $.get(url, function(response) {                     
    
// }).fail(function(xhr, status) {             
//     alert("error"); 
// }); 


// index
function index()  {
    var form = $('#form-index');   
    var url = form.attr('action'); 
    $.ajax({
        url: url,
        type: 'GET',
        data: form.serialize(),
        success: function(response) {   
            console.log('response index: ', response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },

      
    });
}   
// create               
function create() {
    var form = $('#form-create');   
    var url = form.attr('action'); 
    $.ajax({
        url: url,
        type: 'GET',
        data: form.serialize(),
        success: function(response) {   
            console.log('response create: ',response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });
}     
// show               
function show(id) {
    var form = $('#form-show');   
    var url = form.attr('action').replace(':ID',id); 
    $.ajax({
        url: url,
        type: 'GET',
        data: form.serialize(),
        success: function(response) {   
            console.log('response create: ',response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });
} 
// edit               
function edit(id) {
    var form = $('#form-edit');   
    var url = form.attr('action').replace(':ID',id); 
    $.ajax({
        url: url,
        type: 'GET',
        data: form.serialize(),
        success: function(response) {   
            console.log('response create: ',response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });
} 
// store                
function store() {
    var form = $('#form-store');   
    var url = form.attr('action'); 
    $.ajax({
        url: url,
        type: 'POST',
        data: form.serialize(),
        success: function(response) {   
            console.log('response store: ',response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });
}     
// update              
function update(id) {
    var form = $('#form-update');   
    var url = form.attr('action').replace(':ID',id); 
    $.ajax({
        url: url,
        type: 'PUT',
        data: form.serialize(),
        success: function(response) {   
            console.log('response update: ', response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });
}       
// deletes              
function deletes(id) {
    var form = $('#form-deletes');   
    var url = form.attr('action').replace(':ID',id); 
    $.ajax({
        url: url,
        type: 'DELETE',
        data: form.serialize(),
        success: function(response) {   
            console.log('response delete: ', response.msg);
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });
}  
