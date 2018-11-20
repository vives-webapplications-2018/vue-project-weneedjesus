<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Kaffie;
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
    $user = new Kaffie();
    $register = new Register();
    echo "Hello test"; //test failing
    $register->registration($_POST['email'], $_POST['password'],$_POST['confirmpassword'] ,$_POST['first_name'], $_POST['last_name'], $_POST['address'], 
$_POST['zip'], $_POST['city']/*, $_POST['owner']*/);
    /*$array = array(
        //TODO: make an array here with key => value and then make the
        //foreach loop + also check for $args
    );
/*
    //repetitive code, at a later time it will be implemented as an array
    $user::table('users')->name = $_POST['name'];
    $user::table('users')->lastname = $_POST['lastname'];
    /*We need to check the validation + if already exist in db 
    We will use other class register.php*/
/*
    $user::table('users')->email = $_POST['email'];
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT).
    $user::table('users')->password = $hash;
    /**//*
    $user::table('users')->address = $_POST['address'];
    $user::table('users')->zip = $_POST['zip'];
    $user::table('users')->city = $_POST['city'];
    $user::table('users')->owner = $_POST['owner'];
    */
    //TODO: needs to direct to a page where customers can be added and be overviewed.
    return $this->renderer->render($response, 'overview.phtml', $args);
});

$app->post('/login', function (Request $request, Response $response, array $args) {
    //also class login.php will be used here
    //$userLogin = $_POST['email'];

    return $this->renderer->render($response, 'overview.phtml', $args);
});


//Routes with overview and other things that could be useful
$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'login.phtml', $args);
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


