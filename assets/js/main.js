$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let first_name = $('input[name="first_name"]').val(),
        last_name = $('input[name="last_name"]').val(),
        login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
              $('.msg').removeClass('none').text(data.message);
        }
        
        }
    });
});
