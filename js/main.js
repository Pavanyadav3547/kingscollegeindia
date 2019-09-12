//Form Submit//

$(function () {
    $('.error').hide();
    $("#youth-form").submit(function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var gender = $("#gender").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var dob = $("#dob").val();
        var address = $("#address").val();
        var dataString = 'name='+ name + '&gender=' + gender + '&phone=' + phone +  '&email=' + email +  '&dob=' + dob + '&address=' + address;


        if(name === "" || gender === ""  || phone === "" || email === "" || dob === "" ||  address === "" ){
            $('.error').show();

            return false;
        }

        else{
            $('.error').hide();
        }

        $.ajax({
            type: "POST",
            url: 'mail/data.php',
            data: dataString,
            success: function () {
                $('#youth-form').html("<div style='color: black;padding: 2rem 0rem;' id='message' class='text-center'></div>");
                $('#message').html("<h2 class='text-center'>Thank you for contacting us </h2>").append("<p>We will get back to you</p>").show();
            },
            error: function(request, status, error){
                alert("Error: Could not delete");
            }
        });
        return false;
    });
});