 

$(document).ready(function() {
	$('#categories-data-table').DataTable( {
		"processing": true,
		"serverSide": true,
		"paging":   false,
		"searching": false,
		"info": false,
		"ajax": base_url+"categories/get_list/" 
	} );
} );


function add_form($cat_id) { 
 
	$.alert({
		content: function () {
			var self = this;
			return $.ajax({
				url: base_url+'categories/get_add_form/' +  $cat_id,
				dataType: 'json',
				method: 'post'
			}).done(function (response) {
                    self.setContent(response.content); // appending
                    self.setTitle(response.title); 
                  }).fail(function () {
                   self.setContent('Something went wrong.');
                 });
                },
                
                confirmButton:"Add ",
                confirm: function () {
                  var main_cat_id = $('#main_cat_id').val(); 
                  var title = $('#title').val();  
                  if (main_cat_id!='' && title != '') { 
                    add_done(main_cat_id,title);
                  } else {
                    errorText.show();
                    return false;
                  }
                }
                
              });
}


function add_done(main_cat_id,title) { 
  jQuery.post(base_url + "categories/add_cat", {main_cat_id: main_cat_id,title:title}, function (data) {
    if (data.statu == 'ok') {  
      alert('Added successfully')
      location.reload();

    }else{

      alert('Something is wrong')

    }
  }, "json");

}