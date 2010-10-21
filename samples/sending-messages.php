<?php
require_once 'Mailgun.php';

mailgun_init('my-api-key');

// Plain text message
MailgunMessage::send_text("me@myhost", 
     "'John Doe' <you@yourhost>",
     "Hello",
     "Hi!\nI am sending a message using PHP Mailgun API");

// MIME message
$rawMime = 
    "X-Priority: 1 (Highest)\n".
    "Content-Type: text/plain;charset=UTF-8\n".    
    "From: me@myhost\n".
    "To: you@yourhost\n".
    "Subject: Hello!\n".
    "\n".
    "This message is sent by Mailgun";
MailgunMessage::send_raw("me@myhost", "you@yourhost", $rawMime); 

echo "Messages sent\n";

?>
