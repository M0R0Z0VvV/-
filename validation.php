<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

$users = array(
 array(
   "email" => "qwe@123.ru",
    "id" => "1",
    "name" => "Aaaaaaa"
 ),array(
   "email" => "123@123.ru",
    "id" => "2",
    "name" => "Bbbbbbbb"
 ),array(
   "email" => "Asd3@123.ru",
    "id" => "3",
    "name" => "Cccccccc"
 ),array(
   "email" => "123@123.ru",
    "id" => "4",
    "name" => "12322@123.ru"
 )
);

foreach ($users as $users ){
  foreach ($users as $key => $value ){
      if ($key === 'email' && $email === $value){
        file_put_contents('log/proverka.txt', $email . ' уже зарегистрирован');
        $response = [
            "status" => false,
            "message" => "Такой email уже зарегистрирован",
        ];

        echo json_encode($response);
        die();
    }
  }
}


$error = [];

if ($firstName === ''){
  $error[] = 'введите имя';
}

if ($lastName === ''){
  $error[] = 'введите фамилию';
}

if ($email === ''){
  $error[] = 'введите email';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   //можно так же проверить наличие @ через strpos($email, '@')
    $error[] = 'некорректный email';
}

if ($password === ''){
  $error[] = 'введите пароль';
}

if ($repeatPassword === ''){
  $error[] = 'повторите пароль';
}

if (!empty($error)) {
    $response = [
        "status" => false,
        "message" => $error[0],
    ];

    echo json_encode($response);

    die();
}

if ($password === $repeatPassword){
  file_put_contents('log/proverka.txt', $email . ' успешно зарегистрирован');
  $response = [
      "status" => true,
  ];
  echo json_encode($response);
  die();
}else{
  $response = [
      "status" => false,
      "message" => "Пароли не совпадают",
  ];
  echo json_encode($response);
}
