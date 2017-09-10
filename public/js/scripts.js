jQuery(document).ready(function() {
    jQuery("[rel='tooltip']").each(function() {
        jQuery(this).tooltip();
    });
    jQuery('div.post-content').each(function() {
        jQuery(this).popover({
            trigger: 'hover',placement: 'bottom'
        });
    });
    jQuery("a.ajaxified").each(function() {
        jQuery(this).click(function() {
            var checkConfirm = jQuery(this).attr('data-confirm');
            var dataConfirm = jQuery(this).attr('data-confirmation');
            var proceed = true;
            if(checkConfirm == 'yes') {
                var r = confirm(dataConfirm);
                if(!r) {
                    proceed = false;
                }
            }
            if (proceed) {
                jQuery.ajax({
                    url: jQuery(this).attr('data-href'),
                    type: 'POST',
                    data: '_token=' + encodeURIComponent(jQuery('meta[name=csrf-token]').attr('content')),
                    beforeSend: function () {
                        jQuery('div#update').html('<div class="alert alert-info text-center message"><i class="fa fa-spin fa-spinner"></i></div>');
                        jQuery('div#update div.message').delay(2000).fadeOut('slow');
                    },
                    success: function (s) {
                        jQuery('div#update').html('<div class="alert message alert-success text-center">' + s + '</div>');
                        jQuery('div#update div.message').delay(3000).fadeOut('slow');
                    },
                    error: function (xhr, e) {
                        if(xhr.status == 401) {
                            jQuery('div#update').html('<div class="alert message alert-success text-center">'+ xhr.statusText+'</div>');
                            jQuery('div#update div.message').delay(3000).fadeOut('slow');
                        }
                        console.log(xhr);
                    }
                });
            }
        });
    });
    if(window.location.hash.length > 0) {
        jQuery(window.location.hash).fadeIn(1000).fadeOut(800).fadeIn(600).fadeOut(400).fadeIn(200).css('border', '1px solid rgb(49, 111, 49)');
    }
});