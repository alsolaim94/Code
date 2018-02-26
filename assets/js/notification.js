// This is taken from this website: https://www.cloudways.com/blog/real-time-php-notification-system/

$(document).ready(function(){

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {
        $.ajax({
            url:"Notifications/fetchNoti.php",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data) {
               $('.dropdown-menu').html(data.notification);
               if(data.unseen_notification > 0) {
                   $('.count').html(data.unseen_notification);
               }
            }
        });
    }

    load_unseen_notification();

    // submit form and get new records
    $('#comment_form').on('submit', function(event){
        event.preventDefault();
        if($('#subject').val() != '' && $('#comment').val() != '') {
            var form_data = $(this).serialize();
            $.ajax({
                url:"Notifications/insertNoti.php",
                method:"POST",
                data:form_data,
                success:function(data) {
                    $('#comment_form')[0].reset();
                    load_unseen_notification();
                    document.getElementById("notiSuccess").innerHTML = "Your message has been sent to the property owner.";
                }
            });
         } else {
            alert("Both Fields are Required");
         }
    });

    // load new notifications
    $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notification('yes');
    });

    setInterval(function(){
        load_unseen_notification();;
    }, 5000);
});