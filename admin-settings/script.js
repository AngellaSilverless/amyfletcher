jQuery(document).ready(function($) {
	
	$(".show_on_contact input[type=radio]:not(:disabled)").change(function() {
		
		$(".show_on_contact label").not(this.parentElement).removeClass("selected");
		$(".show_on_contact input[type=radio]:not(:disabled)").not(this).prop("checked", false);;
	});
	
});