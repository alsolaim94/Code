$(document).ready(function(){


    function filter(max, min) {
        $.ajax({
            url: "filter.php",
            method: "GET",
            data: {
                min: min,
                max: max
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

       filter(max, min);
    });

    // when reset is clicked, reload the page
    $(document).on('click', '#resetFilter', function() {
        location.reload();
    });


});