<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

// массив зарегистрированных пользователей
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
//проверка не зарегистрирован ли такой email
foreach ($users as $users ){
  foreach ($users as $key => $value ){
      if ($key === 'email' && $email === $value){
        file_put_contents('log/proverka.txt', $email . ' уже зарегистрирован'); //логируем результат проверки
        $response = [
            "status" => false,
            "message" => "Такой email уже зарегистрирован",
        ];

        echo json_encode($response);
        die();
    }
  }
}

//массив в который записываются ошибки (не заполненное поле, некорректный логин...)
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

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   //можно так же проверить наличие @ через if(!strpos($email, '@'))
    $error[] = 'некорректный email';
}

if ($password === ''){
  $error[] = 'введите пароль';
}

if ($repeatPassword === ''){
  $error[] = 'повторите пароль';
}

if ($password !== $repeatPassword){
  $error[] = 'пароли не совпадают';
}

if (!empty($error)) {   //если массив не пустой значит есть какая то ошибка, указываем это в status и выводим ошибку
    $response = [
        "status" => false,
        "message" => $error[0],
    ];
    echo json_encode($response);
    die();
}else{  // если ошибок нет значит пользователь успешно зарегистрирован
  file_put_contents('log/proverka.txt', $email . ' успешно зарегистрирован'); //логируем результат проверки 
  $response = [
      "status" => true,
  ];
  echo json_encode($response);

}
