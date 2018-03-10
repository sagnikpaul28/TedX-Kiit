jQuery(document).ready(function() {

    //window and animation items
    var web_window = jQuery(window);

    //check to see if any animation containers are currently in view
    function check_if_in_view() {
        var animation_elements = jQuery.find('.animation-element:not(.in-view)');
        //get current window information
        var window_height = web_window.height();
        var window_top_position = web_window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        //iterate through elements to see if its in view
        jQuery.each(animation_elements, function() {

            //get the element sinformation
            var element = jQuery(this);
            var element_height = jQuery(element).outerHeight();
            var element_top_position = jQuery(element).offset().top;
            var element_bottom_position = (element_top_position + element_height);

            //check to see if this current container is visible (its viewable if it exists between the viewable space of the viewport)
            if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                element.addClass('in-view');
            }
        });

    }

    //on or scroll, detect elements in view
    jQuery(window).on('scroll resize', function() {
        check_if_in_view()
    })

    //trigger our scroll event on initial load
    jQuery(window).trigger('scroll');
});

