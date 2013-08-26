<?php

require_once 'src/com/4geeks/model/Base.manager.php';

//POST
$app->post("/sesiones/iniciar", function () use ($app) {
    
    $data = json_decode($app->request()->getBody());

    try
    {
        $errors = array();
        if ($data->username != "123456") {
            $errors['username'] = "Username is not found.";
        } else if ($data->password != "88ea39439e74fa27c09a4fc0bc8ebe6d00978392") {
            $errors['password'] = "Password does not match.";
        }

        if (count($errors) > 0) {
            throw new ErrorException("Error iniciando sesion.", 1);
        }

        $_SESSION['user'] = new CanisUser(1,$data->username);
        $app->render(200,Utils::renderResult(array(
            array(
                "usuario" => array(
                    "id" => $_SESSION['user']->id,
                    "username" => $_SESSION['user']->name,
                    "role_id" => $_SESSION['user']->roleId
                ),
                "url" => "reservar"
            )
        )));
    }
    catch (ErrorException $e)
    {
        $app->render(200,Utils::renderFault($e->getMessage()));
    }
});

//GET
$app->get("/sesiones/cerrar", function () use ($app) {
   
   try
   {
       unset($_SESSION['user']);
       $app->view()->setData('user', null);
       $app->render(200,Utils::renderResult(array("La sesion se ha eliminado.")));
    }
    catch (ErrorException $e)
    {
        $app->render(200,Utils::renderFault($e->getMessage()));
    }

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
        $app->render(200,Utils::renderFault($e->getMessage()));
    }

});