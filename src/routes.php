<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Kaffie;

// Routes for main page
$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withRedirect('/index', $status = null);
});

$app->get('/index', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

//Routes for forms
$app->post('/register', function (Request $request, Response $response, array $args) {
    $user = new Kaffie();

    $array = array(
        //TODO: make an array here with key => value and then make the
        //foreach loop + also check for $args
    );

    //repetitive code, at a later time it will be implemented as an array
    $user::table('user')->name = $_POST['name'];
    $user::table('user')->password = $_POST['password'];
    $user::table('user')->email = $_POST['email'];
    $user::table('user')->address = $_POST['address'];
    $user::table('user')->zip = $_POST['zip'];
    $user::table('user')->city = $_POST['city'];
    $user::table('user')->owner = $_POST['owner'];

    return $this->renderer->render($response, 'customer.phtml', $args); //TODO: needs to direct to a page where customers can be added and be overviewed.
});


//Routes with overview and other things that could be useful
$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->get('/register', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'register.phtml', $args);
});
