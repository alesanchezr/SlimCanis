<?php

require_once 'src/com/4geeks/model/Base.manager.php';

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

    $_SESSION['user'] = new CanisUser(1,$data->username);
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

//GET
$app->get("/sesiones/me", $authenticate($app), function () use ($app) {
   
    try
    {
        if(isset($_SESSION['user']) && $_SESSION['user']->id>0)
        {
            $socio = BaseManager::$EntityManager->find("Entity\Socio",$_SESSION['user']->id);
            
            $result = array(
                array(
                    "id" => $_SESSION['user']->id, 
                    "username" => $_SESSION['user']->name,
                    "socio" => $socio->toArrayMin(),
                    "role_id" => $_SESSION['user']->roleId
                )
            );

            $app->render(200,Utils::renderResult($result));
        }
            
        throw new ErrorException("Invalid user", 1);
        
    }
    catch (ErrorException $e) {
        
        $result = array(
                    "success"  => false, 
                    "response" => array(
                        "message" => $e->getMessage()
                        )
                );
        
        $app->render(200,Utils::renderFault($result));
    }

});