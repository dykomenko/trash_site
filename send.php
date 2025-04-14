<?php


// Адрес получателя
$to = 'infohimedia@ya.ru';
// $to = 'legionerx14@yandex.ru';

// Тема письма
$subject = 'Новая заявка с формы';



if (!empty($_POST['phone'])) {

    // Сбор всех POST-данных в строку
    $message = "Получены следующие данные из формы:\n\n";
    foreach ($_POST as $key => $value) {
        // Обрабатываем массивы (например, checkbox с несколькими значениями)
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        $message .= htmlspecialchars($key) . ": " . htmlspecialchars($value) . "\n";
    }

    // Заголовки письма
    $headers = "From: no-reply@" . $_SERVER['SERVER_NAME'] . "\r\n" .
              "Reply-To: no-reply@" . $_SERVER['SERVER_NAME'] . "\r\n" .
              "Content-Type: text/plain; charset=utf-8\r\n";

    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Спасибо! Ваши данные отправлены.";
    } else {
        echo "Произошла ошибка при отправке данных.";
    }

} else {
  echo "<p>Пожалуйста, заполните все поля.</p>";
}



?>
