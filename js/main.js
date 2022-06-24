$('button').click(function (e) {
  e.preventDefault();

let firstName = $('input[id="firstName"]').val(),
    lastName = $('input[id="lastName"]').val(),
    email = $('input[id="email"]').val(),
    password = $('input[id="password"]').val(),
    repeatPassword = $('input[id="repeatPassword"]').val();

$.ajax({
    url: '/validation.php',
    type: 'POST',
    dataType: 'json',
    data: {
      firstName: firstName,
      lastName: lastName,
      email: email,
      password: password,
      repeatPassword: repeatPassword
    },
    success: function(data) {
      if (data.status === true) {
        $(".formRegister").hide(1);
        setTimeout(()=>alert('Вы успешно зарегистрированы !'),2);
      }else {
          $('.msg').removeClass('none').text(data.message);
      }
    }});
});
