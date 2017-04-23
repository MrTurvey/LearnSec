


$(document).ready(function() {
        $(':button').click(function() {
            var searchString = $(this).attr("value")
			$("#example tr td:contains('" + searchString + "')").each(function() {
				if ($(this).text() == searchString) {
					$(this).parent().remove();
				}
			});
        });
   });
	
	
	
