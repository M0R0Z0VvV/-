<?php
session_start();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

//массив пользователей
$users = [
    "email" => "123123@123.ru",
    "id" => "1",
    "name" => "123"
];

if ($login === $users["email"]) { //проверка не зарегистрирован ли пользователь с таким логином

  file_put_contents('proverka.txt', $login . ' уже зарегистрирован'); //результат проверки в текстовом файле

    $response = [  //если есть ошибка, она записывается в этот массив и выводится пользователю
        "status" => false,
        "message" => "Такой логин уже существует",
    ];

    echo json_encode($response);
    die();
}
//валидация данных формы
$error_fields = [];


if ($first_name === '') {
    $error_fields[] = 'Ведите имя';
}

if ($last_name === '') {
    $error_fields[] = 'Ведите фамилию';
}

if ($login === '') {
    $error_fields[] = 'Введите email';
}

if (!filter_var($login, FILTER_VALIDATE_EMAIL)) { //проверка email
    $error_fields[] = 'Неверный email';
}

if ($password === '') {
    $error_fields[] = 'Введите пароль';
}

if ($password_confirm === '') {
    $error_fields[] = 'Повторите пароль';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "message" => $error_fields[0],
    ];

    echo json_encode($response);

    die();
}
//проверка правильности пароля
if ($password === $password_confirm) {
    $_SESSION['count'] = true;
    file_put_contents('proverka.txt', $login . ' зарегистрирован'); //результат проверки в текстовом файле
    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);



} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
    echo json_encode($response);
}

?>
