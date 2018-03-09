jQuery(document).ready(function(){
	var sortlist = jQuery('ul#custom-type-list');
	var animation = jQuery('#loading-animation');
	var pageTitle = jQuery('div h2');
	animation.hide();

	sortlist.sortable({

		update: function(event, ui){
			animation.show();

			jQuery.ajax({
				url: ajaxurl,
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'save_post',
					order: sortlist.sortable('toArray'),
					security: WP_SPEAKERS_LISTING.security
				},
				success: function(response){
					animation.hide();
					if (true == response.success){
						pageTitle.after('<div class="updated"><p>'+WP_SPEAKERS_LISTING.success+'</p></div>');
					}else{
						pageTitle.after('<div class="updated"><p>'+WP_SPEAKERS_LISTING.failure+'</p></div>');
					}
				},
				error: function(error){
					animation.hide();
					pageTitle.after('<div class="error"><p>'+WP_SPEAKERS_LISTING.failure+'</p></div>');
				}
			});
		}
	});
})