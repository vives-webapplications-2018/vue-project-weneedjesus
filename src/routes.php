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
    
    return $this->renderer->render($response, 'customer.phtml', $args); //TODO: needs to direct to a page where customers can be added and be overviewed.
});


//Routes with overview and other things that could be useful
$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->get('/register', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'register.phtml', $args);
});
