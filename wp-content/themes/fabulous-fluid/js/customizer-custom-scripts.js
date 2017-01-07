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