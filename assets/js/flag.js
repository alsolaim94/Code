$(document).ready(function(){
    
    function flag_property(view = '') {
        $.ajax({
           url:"flag.php",
            method: "POST",
            data: {view:view},
            dataType: "json",
            success: function(data) {
                alert(data.alert);
            }
        });
    }
    
    $(document).on('click', '.flag', function(){
        var propertyID = $(this).attr("value");
        flag_property(propertyID);

    });

});