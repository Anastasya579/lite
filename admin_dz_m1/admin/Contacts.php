<?php

include "../autoload.php"; 
include "../src/Model/Contact.php"; 


use Model\Contact;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = new Contact($_POST['name'], $_POST['mail'], $_POST['mob']);
    $contact->save();
}
echo '<pre>';
print_r(Contact::getAll());
echo '</pre>';

?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form</title>
            <link rel="stylesheet" href="style.css">
  </head>
  <body>
            <form action="Base.php" class="back-alert" method="post">
            <h1>Форма заявки</h1>
            <div class="form-alert"> 
          <div>
              <label>Полное ФИО</label>
              <input type="text" id="name" name="username" required><span>(обязательно для ввода)</span>
            </div>
          <div>
              <label>Адрес электронной почты</label>
              <input type="text" id="mail" name="usermail" required><span>(обязательно для ввода)</span>
            </div>
          <div>
              <label>Номер телефона</label>
              <input type="text" id="mob" name="numbermob" required><span>(обязательно для ввода)</span>
          </div>
              <input class="bot-send-mail" type="submit" value="Отправить заявку">
              <input class="bot-send-mail" type="reset" value="Очистить форму">
        </div></form>
  </body>
  </html>

