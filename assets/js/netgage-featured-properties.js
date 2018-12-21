// In your Javascript (external .js resource or <script> tag)
jQuery(document).ready(function() {
    jQuery('.js-example-basic-single').select2();

});

var selected_options = [];

var check_select_values = function() {
    selected_options = [];
    jQuery('select option').attr('disabled', false);

    jQuery("select[name='properties[]']").each(function() {
        if(jQuery(this).val()) {
            selected_options.push(jQuery(this).val());

        }

    });

    selected_options.forEach(function(obj_element) {
        jQuery('option[value=' + obj_element + ']').attr('disabled', true);
    });

    console.log(selected_options);
}

check_select_values();

var after_submition = function() {
    $("#updating-spinner").css("display", "block");
}



