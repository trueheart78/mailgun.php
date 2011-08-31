<?php
require_once 'Mailgun.php';

mailgun_init('key-afy6amxoo2fnj$u@mc');

// Messages coming to @samples.mailgun.org will be HTTP POSTed to /post page:
$route = new Route(".*@samples.mailgun.org", "http://samples.mailgun.org/post");
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
