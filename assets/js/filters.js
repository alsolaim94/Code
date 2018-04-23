$(document).ready(function(){

    // store original html to use if reset button is pressed
    var originalHTML = "<div id='propertyContainer'>" + $('#propertyContainer').html() + "</div>";

    function filter(max, min, city, type, state, bedroom, bathroom) {
        $.ajax({
            url: "filter.php",
            method: "GET",
            data: {
                min: min,
                max: max,
                city: city,
                type: type,
                state: state,
                bedroom: bedroom,
                bathroom: bathroom
            },
            dataType: "json",
            success: function(data) {
                $('#propertyContainer').replaceWith(data.html);
            }
        })
    }

    // when filter is clicked, make ajax call
    $(document).on('click', '#submitFilter', function() {
       var max = $('#maxPrice').val();
       var min = $('#minPrice').val();
       var city = $('#city').val();
       var type = $('#type').val();
       var state = $('#state').val();
       var bedroom = $('#bedroom').val();
       var bathroom = $('#bathroom').val();

       filter(max, min, city, type, state, bedroom, bathroom);
    });

    // when reset is clicked, reload the page
    $(document).on('click', '#resetFilter', function() {
        $('#propertyContainer').replaceWith(originalHTML);
        $('#maxPrice').val("");
        $('#minPrice').val("");
        $('#city').val("none");
        $('#type').val("none");
        $('#state').val("none");
        $('#bedroom').val("none");
        $('#bathroom').val("none");

    });


});