<?php
require 'vendor/autoload.php'; // Подключаем автозагрузчик Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $user_name = $_POST["user_name"];
    $user_phone = $_POST["user_phone"];
    $product_type = $_POST["productType"];

    // Создаем объект PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Настройки сервера SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Замените на адрес вашего SMTP-сервера
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abdulborijazizov92@gmail.com'; // Замените на ваше имя пользователя SMTP
        $mail->Password   = 'agiyaxfzvbjvnuml'; // Замените на ваш пароль SMTP
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Настройки письма
        $mail->setFrom('abdulborijazizov92@gmail.com', 'Name'); // Замените на ваш адрес электронной почты и имя
        $mail->addAddress('abdulborijazizov@gmail.com'); // Замените на адрес получателя

        $mail->isHTML(true);
        $mail->Subject = 'Новая заявка от ' . $user_name;
        $mail->Body    = "Имя: $user_name<br>Телефон: $user_phone<br>Тип товара: $product_type";

        // Отправляем письмо
        $mail->send();

        echo "Данные успешно отправлены!";
    } catch (Exception $e) {
        echo "Ошибка при отправке письма: {$mail->ErrorInfo}";
    }
} else {
    // Если форма не была отправлена, выводим сообщение об ошибке
    echo "Ошибка: Форма не отправлена!";
}
?>
