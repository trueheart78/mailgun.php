<?php
require_once 'Mailgun.php';

mailgun_init('key-afy6amxoo2fnj$u@mc');

// Plain text message
MailgunMessage::send_text("me@samples.mailgun.org", 
     "'John Doe' <you@mailgun.info>",
     "Hello",
     "Hi!\nI am sending a message using Mailgun PHP API");

// MIME message
$rawMime = 
    "X-Priority: 1 (Highest)\n".
    "Content-Type: text/plain;charset=UTF-8\n".    
    "From: me@samples.mailgun.org\n".
    "To: you@mailgun.info\n".
    "Subject: Hello!\n".
    "\n".
    "This message is sent by Mailgun PHP API";
MailgunMessage::send_raw("me@samples.mailgun.org", "you@mailgun.info", $rawMime); 

echo "Messages sent\n";

?>
