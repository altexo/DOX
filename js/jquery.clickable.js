/*!
* jQuery Clickable v1.0b
* http://pixeltango.com
*
* Copyright 2010, PixelTango
* Dual licensed under the MIT or GPL Version 2 licenses.
*
* Date: Fri Aug 20 08:10:07 2010 +0100
*/
jQuery.fn.clickable = function (targetSelector, settings) {
    settings = jQuery.extend({
        hoverClass: 'hover',
        changeCursor: true
    }, settings);

    return this.each(function () {
        var $e = $(this);

        // Find target anchor return if not found --------------------
        var $a = targetSelector != null ?
            $e.find(targetSelector) :
            $e.find('a:first');

        if ($a == null) return;

        // Save targetUrl for later reference ------------------------
        var targetUrl = $a.attr('href');

        // Events ----------------------------------------------------
        var onMouseEnter = function (e) {
            $e.addClass(settings.hoverClass);

            // Remove browser's default outline
            if (e.type != 'focus') $a
                .focus()
                .css('outline', 'none');

            // Update status bar (older browsers only)
            window.status = targetUrl;

            // Change cursor
            if (settings.changeCursor) $e.css('cursor', 'pointer');
        };

        var onMouseLeave = function (e) {
            $e.removeClass(settings.hoverClass);

            if (e.type != 'blur') $a
                .blur()
                .css('outline', 'inherit');

            window.status = '';

            if (settings.changeCursor) $e.css('cursor', 'auto');
        };

        // Event binding ---------------------------------------------
        $e
            .click(function () {
                // Open the targetUrl in existing or new window
                if ($a.attr('target') == '_blank')
                    window.open(targetUrl, '_blank');
                else
                    window.location.href = targetUrl;
            })
            .hover(onMouseEnter, onMouseLeave);

        $a
            .focus(onMouseEnter)
            .blur(onMouseLeave);
    });
};
