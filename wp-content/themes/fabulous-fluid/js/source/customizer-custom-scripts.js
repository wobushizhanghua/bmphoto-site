/**
 * Theme Customizer custom scripts
 */
(function($) {
    //Add Upgrade Button
    $('.preview-notice').prepend('<span id="fabulous_fluid_upgrade"><a target="_blank" class="button btn-upgrade" href="' + fabulous_fluid_misc_links.upgrade_link + '">' + fabulous_fluid_misc_links.upgrade_text + '</a></span>');
    jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
        event.stopPropagation();
    });
})(jQuery);

( function( api ) {

    wp.customize( 'reset_all_settings', function( setting ) {
        setting.bind( function( value ) {
            var code = 'needs_refresh';
            if ( value ) {
                setting.notifications.add( code, new wp.customize.Notification(
                    code,
                    {
                        type: 'info',
                        message: fabulous_fulid_data.reset_message
                    }
                ) );
            } else {
                setting.notifications.remove( code );
            }
        } );
    } );

} )( wp.customize );