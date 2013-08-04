<?php

//POST
$app->post("/sesiones/iniciar", function () use ($app) {
    
    $data = json_decode($app->request()->getBody());

    $errors = array();

    if ($data->username != "123456") {
        $errors['username'] = "Username is not found.";
    } else if ($data->password != "dRs32sdlaSAds") {
        $errors['password'] = "Password does not match.";
    }

    if (count($errors) > 0) {
        $app->render(404,$errors);
    }

    $_SESSION['user'] = $data->username;
    $app->render(200,array(
            'msg' => "Se ha iniciado sesion",
        ));
});

//GET
$app->get("/sesiones/cerrar", function () use ($app) {
   
   unset($_SESSION['user']);
   $app->view()->setData('user', null);
   $app->render(200,array(
            'msg' => "Le sesion se ha eliminado",
        ));

});