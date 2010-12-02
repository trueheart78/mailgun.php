<?php
require_once 'Mailgun.php';

mailgun_init('key-afy6amxoo2fnj$u@mc');

// Plain text message
MailgunMessage::send_text("me@samples.mailgun.org", 
                          "'John Doe' <you@mailgun.info>",
                          "Hello text PHP API!",
                          "Hi!\nI am sending a message using Mailgun PHP API");

// Plain text message + tag
MailgunMessage::send_text("me@samples.mailgun.org", 
                          "'John Doe' <you@mailgun.info>",
                          "Hello text PHP API + tag!",
                          "Hi!\nI am sending a message using Mailgun PHP API",
                          "",
                          array("headers" => array(MAILGUN_TAG => "sample_text_php")));

// MIME message
$rawMime = 
    "X-Priority: 1 (Highest)\n".
    "X-Mailgun-Tag: sample_raw_php\n".
    "Content-Type: text/plain;charset=UTF-8\n".    
    "From: me@samples.mailgun.org\n".
    "To: you@mailgun.info\n".
    "Subject: Hello raw PHP API!\n".
    "\n".
    "This message is sent by Mailgun PHP API";
MailgunMessage::send_raw("me@samples.mailgun.org", "you@mailgun.info", $rawMime); 

echo "Messages sent\n";

?>
