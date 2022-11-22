jQuery(document).ready(function() {
    jQuery(document).on("scroll", onScroll);
    onepageNavLinks = jQuery('.onepage .t4-navbar .nav-link');

    function onScroll(event){
        var scrollPos = jQuery(document).scrollTop();
        onepageNavLinks.each(function () {
            var currLink = jQuery(this);
            var refElement = jQuery(currLink.attr("href"));
            if (refElement.position().top <= scrollPos /* && refElement.position().top + refElement.height() > scrollPos*/ ) {
                onepageNavLinks.removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }

    // Add Placeholder form contact
    var formContact = jQuery('.com_contact');
    if (formContact.length > 0) {
        jQuery('#jform_contact_name', formContact).attr('placeholder',Joomla.JText._('TPL_CONTACT_CONTACT_EMAIL_NAME_LABEL'));
        jQuery('#jform_contact_email', formContact).attr('placeholder',Joomla.JText._('TPL_CONTACT_EMAIL_LABEL'));
        jQuery('#jform_contact_emailmsg', formContact).attr('placeholder',Joomla.JText._('TPL_CONTACT_CONTACT_MESSAGE_SUBJECT_LABEL'));
        jQuery('#jform_contact_message', formContact).attr('placeholder',Joomla.JText._('TPL_CONTACT_CONTACT_ENTER_MESSAGE_LABEL'));  
    }
})


jQuery(document).ready(function(){
  var checkSd = jQuery('.t4-col').hasClass('sidebar-l') || jQuery('.t4-col').hasClass('sidebar-r');

  if (checkSd) {
      jQuery('#t4-main-body').addClass('has-sidebar');
  }
  else {
    jQuery('#t4-main-body').addClass('no-sidebar');
  }
});


