<?php
date_default_timezone_set("Asia/Colombo");
$timestamp = date("F j, Y, g:i a");

if (isset($_POST['route']) && $_POST['route'] === 'email') {
  // Multiple recipients..
  $to = 'mailtokasun@gmail.com, pathumego@gmail.com';

  // Subject
  $subject = 'Stop Spams!';

  $senderName = $_POST['senderName'];
  $senderEmail = $_POST['senderEmail'];
  $operator = $_POST['operator'];
  $options = $_POST['options'];

  // Message
  $message = "
  <html>
  <head>
    <title>".$subject."</title>
  </head>
  <body>
    <p>".$subject."</p>
    <div>
      <p>Hello!</p>
    </div>
  </body>
  </html>
  ";

  // To send HTML mail, the Content-type header must be set
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';

  // Additional headers
  $headers[] = 'To: R1 <mailtokasun@gmail.com>, R2 <pathumego@gmail.com>';
  $headers[] = 'From: '.$senderName.' <'.$senderEmail.'>';
  $headers[] = 'Cc: '. $senderEmail;

  // Mail it
  mail($to, $subject, $message, implode("\r\n", $headers));
}

// eof.