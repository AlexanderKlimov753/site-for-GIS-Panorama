<?php
$to = "sano17493@gmail.com";//Почтовый ящик на который будет отправленно сообщение
$subject = "Тема сообщения";//Тема сообщения
$message = "Message, сообщение!";//Сообщение, письмо
$headers = "Content-type: text/plain; charset=utf-8 \r\n";//Шапка сообщения, 
//содержит определение типа письма, от кого, и кому отправить ответ на письмо

// Проверяем или метод запроса POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Поочередно проверяем или были переданные параметры формы, или они не пустые

    if(isset($_POST["feedbackusername"])){
      //Если параметр есть, присваеваем ему переданое значение
      $name     = trim(strip_tags($_POST["feedbackusername"]));
    }

    if(isset($_POST["feedbackuseremail"])){
      $number   = trim(strip_tags($_POST["feedbackuseremail"]));
    }

    if (isset($_POST["feedbackquestion"])) {
      $question   = trim(strip_tags($_POST["feedbackquestion"]));
    }

      // Формируем письмо
      $message  = "<html>";
        $message .= "<body>";
        $message .= "Телефон: ".$number;
        $message .= "<br />";
        $message .= "Имя: ".$name;
        $message .= "<br />";
        $message .= "Вопрос: ".$question;
        $message .= "</body>";
      $message .= "</html>";
      // Окончание формирования тела письма
      // Посылаем письмо
      mail ($to, $subject, $message, $headers);
      echo "Ваше сообщение успешно отправлено! Вы получите ответ в ближайшее время";
      //header('location: ../auth.html');

} else {
    exit;
}