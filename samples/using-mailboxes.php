<?php
require_once 'Mailgun.php';

mailgun_init('my-api-key');

$mailbox = new Mailbox("new1", "myhost.com", "123123");
$mailbox->upsert();

//use resource->p to get and set data!
$mailbox->p->password = "123456";
$mailbox->upsert();

Mailbox::upsert_from_csv("up1@myhost.com,abc123\nup2@myhost.com,321bca");

print_mailboxes();

function print_mailboxes() {
    echo "Mailboxes:\n";
    $mailbox = new Mailbox();
    $mailboxes = $mailbox->find('all');
    foreach ($mailboxes as $m) {
        echo $m->p->user."@".$m->p->domain." ".$m->p->size."\n";
    }
    echo "\n";
}

?>