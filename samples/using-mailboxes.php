<?php
require_once 'Mailgun.php';

mailgun_init('key-afy6amxoo2fnj$u@mc');

$mailbox = new Mailbox("new1", "samples.mailgun.org", "123123");
$mailbox->upsert();

//use resource->p to get and set data!
$mailbox->p->password = "123456";
$mailbox->upsert();

Mailbox::upsert_from_csv("up1@samples.mailgun.org,abc123\nup2@samples.mailgun.org,321bca");

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







