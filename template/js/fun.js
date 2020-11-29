  
$(document).ready(function () { 
	get_main_categories(); 
});

function get_main_categories() { 

	$.ajax({
		type: "post",
		url: base_url+"categories/main_categories",
		success: function (data) {
			console.log(data)
			$("#main_cat").html(data); 

		}
	});


}

function get_sub_category(id_num) { 

	$("#sub_cat_id"+id_num).change(function () {
		var sub_cat_id = $("#sub_cat_id"+id_num).val();
		$.ajax({
			type: "post",
			url: base_url+"categories/sub_categories", 
			data: {main_cat_id: sub_cat_id},
			success: function (data) {
				$("#div_"+id_num).html('');
				$("#div_"+id_num).html(data); 
       }
   }); 

	});

}

