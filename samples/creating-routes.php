<?php
require_once 'Mailgun.php';

mailgun_init('my-api-key');

// Messages coming to @myhost.com will be HTTP POSTed to /post page:
$route = new Route("*@myhost.com", "http://myhost.com/post");
$route->upsert();

print_routes();

function print_routes() {
    echo "Routes:\n";
    $route = new Route();
    $routes = $route->find('all');
    foreach ($routes as $r) {
        echo "$r->pattern	$r->destination\n";
    }
    echo "\n";
}

?>
