jQuery(document).ready(function($){

    var mec_elementor_init = function(e, skin, settings){

        if( 'undefined' !== typeof window.elementorFrontend ) {

            var wrap = $('#mec_skin_events_'+settings.id).closest('.elementor-widget-MEC-SHORTCODE-BUILDER');
            jQuery('.elementor-element',wrap).each(function() {
                elementorFrontend.elementsHandler.runReadyTrigger( jQuery( this ) );
            });
        }
    };

    $(document).on('mec_load_more_init', mec_elementor_init);
    $(document).on('mec_search_init', mec_elementor_init);
});
