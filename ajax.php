<?php
date_default_timezone_set("Asia/Colombo");
$timestamp = date("F j, Y, g:i a");

if (isset($_REQUEST['route']) && $_REQUEST['route'] === 'email') {

  // posted data
  $senderName = $_POST['senderName'];
  $senderEmail = $_POST['senderEmail'];
  $senderMobileNumber = $_POST['senderMobileNumber'];
  $operator = $_POST['operator'];
  $options = explode('|', $_POST['options']);
  $options[] = 'additional';

  $optionBody = array(
    'sms' => array(
      'title' => 'Spam calls to '.$senderMobileNumber.' from '.$operator,
      'body' => '<p>These automated recorded calls usually come from general helpline number or in some cases random numbers without context. <em>I would like this to stop immediately</em> as I did not opt-in to receive these calls.</p>'
    ),
    'calls' => array(
      'title' => 'Spam SMS to '.$senderMobileNumber.' from '.$operator,
      'body' => '<p>It is one thing to send a message about a promotion, but I receive the same message several times on a daily basis. <em>I would like this to stop immediately</em> as I did not opt-in for advertising and promotional SMS.</p><p>I hope you will intervene in this issue and fix this for me. I have copied '.$operator.' customer care service as well. </p>'
    ),
    'additional' => array(
      'title' => 'Review and regulate on-network advertising practices of '.$operator.' and other network operators',
      'body' => '<p>As a concerned citizen it is my understanding that this spamming issues is not limited to me or other users of '.$operator.' services; it is a common problem for all the Sri Lankan mobile users (). I believe Sri Lankan mobile operators use their position to force advertising in the following ways.</p>
        <ul>
          <li>Playing audio advertisements before the selection menu on helpline, essentially forcing the users to listen to the advertisements.</li>
          <li>Place your advertisements at the bottom of the balance notification message and other utility messages forcing users to read through the advertisement in order to read the balance</li>
        </ul>
        <p>As the only body that regulate the ICT operators services that run on citizens money , I would like you to review the forceful advertising practices among Sri Lankan mobile network operators and regulate this practice.</p>
      '
    )
  );

  $optionsHtml = '';
  foreach ($options as $key=>$option) {
    $index = $key + 1;
    $optionsHtml .= '<p>'.$index.'. '.$optionBody[$option]['title'].'</p>';
    $optionsHtml .= $optionBody[$option]['body'];
  }

  // Multiple recipients..
  $to = 'mailtokasun@gmail.com, pathumego@gmail.com';

  // Subject
  $subject = 'Stop SMS and voice call spamming from '. $operator;

  // Message
  $message = "
  <html>
  <head>
    <title>".$subject."</title>
  </head>
  <body>
    <div>
      <p>To whom it may concern,</p>

      <p>I use the mobile connection ".$senderMobileNumber." from ".$operator." and they are spamming me on a daily basis violating my rights, reducing my productivity and disrupting my daily routine. I am formally writing to get your attention to this issue and would like immediately stop this spamming.</p>

      <p>I request your attention to the following matters,</p>

      ".$optionsHtml."

      <p>I would like to receive a reference number for this complaint and hoping to hear from you soon!</p>

      <p>Kind regards,<br/>
      ".$senderName."
      </p>
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