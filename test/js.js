function clearForms() {
    var i;
    for (i = 0;
    (i < document.forms.length); i++) {
        document.forms[i].reset();
    }
}

//initial checkCount of zero 
var checkCount = 0;

//maximum number of allowed checked boxes 
var maxChecks = 8;

$(document).ready(function() {

    $("#test").click(function() {
        alert($(':checked').length)
    });

    $(':checkbox[name=checkbox]').change(function() {

        //update checkCount 
        checkCount = $(':checked').length;

        if (checkCount >= maxChecks) {
            //alert('you may only choose up to ' + maxChecks + ' options');
            $(':checkbox[name=checkbox]').not(':checked').attr('disabled', true);
        } else {
            $(':checkbox[name=checkbox]:disabled').attr('disabled', false);
        }

        if (this.checked) {
            $("td.label").append('<label>' + this.value + ' </label>');
        } else {
            $("td.label").find(':contains(' + this.value + ')').remove();
        }

        $('input[name="result"]').val($("td.label").text());

/* 
        I don't know what this code does.
        
        $('input[name="numbers"]').show(function() {
            $(this).val("");
            for (var i = 0; i < array.length; i++) {
                if (i <= 7) {
                    $(this).val($(this).val() + " " + array[i]);
                }
            }
        });
        */
    });

    $('#button2').click(function() {
        alert($('input[name="result"]').val());
    });

});
