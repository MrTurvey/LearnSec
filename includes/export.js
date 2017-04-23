$(document).ready(function(){
  $('#btn-export').on('click', function(){
	$(function() {
				$("#example").table2excel({
					exclude: ".noExl",
					name: "Report",
					filename: "Report",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
  });      
})
		