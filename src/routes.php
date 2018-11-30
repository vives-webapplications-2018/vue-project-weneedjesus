<?php

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use \App\Models\Product;

// Routes for main page
$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withRedirect('/index', $status = null);
});

$app->get('/index', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

//Routes for forms (users)
$app->post('/login', function (Request $request, Response $response, array $args) {
    $user = new User();

    if ($user->valid($request->getParam('email')) ) {
        $user->email = $request->getParam('email');
    }else{
        $this->flash->addMessage('Test', 'This is a message');
        return $this->renderer->render($response, 'register.phtml', $args);
    }

    //TODO: Need to do for other fields aswell
    if(!$request->getParam('password') == null && !$request->getParam('confirmpassword') == null) {
        $user->password = $user->validPw($request->getParam('password'), $request->getParam('confirmpassword'));
    }else{
        $this->flash->addMessage('Test', 'This is a message');
        return $this->renderer->render($response, 'register.phtml', $args);}
  
    $user->lastname = $request->getParam('last_name');
    $user->firstname = $request->getParam('first_name');
    $user->address = $request->getParam('address');
    $user->zip = $request->getParam('zip');
    $user->city = $request->getParam('city');

    $user->save();

    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->post('/overview', function (Request $request, Response $response, array $args) {

    $loginUser = User::where('email', '=', $request->getParam('email'))->first();
    if (password_verify($request->getParam('password'), $loginUser->password)) {
        echo "Logged in!";
        $_SESSION['authorized'] = TRUE;
        $args['email'] = $request->getParam('email');
        $args['firstname'] = $loginUser->firstname;
        return $this->renderer->render($response, 'overview.phtml', $args);
    } else {
        $this->flash->addMessage('Test', 'This is a message');
        return $this->renderer->render($response, 'index.phtml', $args);
    }  
});

//Add routes from add.html
$app->put('/index', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});


//Routes with overview and other things that could be useful
$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->get('/register', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'register.phtml', $args);
});

$app->get('/customers', function (Request $request, Response $response, array $args) {
    $users = User::all();
    $args['users'] = $users;
    return $this->renderer->render($response, 'customers.phtml', $args);
});

$app->get('/stock', function (Request $request, Response $response, array $args) {
    $products = Product::all();
    $args['products'] = $products;
    return $this->renderer->render($response, 'stock.phtml', $args);
});

$app->get('/overview', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'overview.phtml', $args);
});

$app->get('/add', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'add.phtml', $args);
});

$app->get('/profile', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'profile.phtml', $args);
});