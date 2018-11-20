<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Kaffie;
use App\Models\User;
use App\Connect\Register;

// Routes for main page
$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withRedirect('/index', $status = null);
});

$app->get('/index', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

//Routes for forms (users)
$app->post('/register', function (Request $request, Response $response, array $args) {
    $user = new User();

    if($user->valid($request->getParam('email'))) {
        $user->email = $request->getParam('email');
    }
    $user->password = $request->getParam('password');
    $user->lastname = $request->getParam('last_name');
    $user->firstname = $request->getParam('first_name');
    $user->address = $request->getParam('address');
    $user->zip = $request->getParam('zip');
    $user->city = $request->getParam('city');

    $user->save();
    return $this->renderer->render($response, 'overview.phtml', $args);
});

$app->post('/login', function (Request $request, Response $response, array $args) {
    //also class login.php will be used here
    //$userLogin = $_POST['email'];

    return $this->renderer->render($response, 'overview.phtml', $args);
});


//Routes with overview and other things that could be useful
$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'overview.phtml', $args);
});

$app->get('/register', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'register.phtml', $args);
});

$app->get('/customer', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'customer.phtml', $args);
});

$app->get('/stock', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'stock.phtml', $args);
});


