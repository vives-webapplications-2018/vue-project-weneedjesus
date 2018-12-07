<?php

use App\Models\User;
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(function ($request, $response, $next) {


    if($this->session->get('user_id')) {
        $this->user = User::find($this->session->get('user_id'));
        $request = $request->withAttribute('user', $this->user);
    }
    $response = $next($request, $response);
    return $response;
});