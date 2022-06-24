<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма регистрации</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="text-center">
<main class="register w-100 m-auto">
  <form>
    <div class="formRegister">
    <h1 class="h3 mb-3 fw-normal">Форма регистрации</h1>
    <p class="msg none"></p>
    <div class="form-floating">
      <input type="text" class="form-control" id="firstName" placeholder="имя">
      <label for="firstName">имя</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="lastName" placeholder="фамилия">
      <label for="lastName">фамилия</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
      <label for="email">email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password">
      <label for="floatingPassword">пароль</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="repeatPassword" placeholder="Password">
      <label for="floatingPassword">повтор пароля</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="button">Зарегистрироваться</button>
    </div>
  </form>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>
