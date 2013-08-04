<?php


require_once "bootstrap.php";

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim(array(
    'debug' => true
));
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));

$authenticate = function ($app) {
    return function () use ($app) {
        if (!isset($_SESSION['user'])) {
            //$app->flash('error', 'Login required');
            $app->render(200,array(
                'error' => false,
                'msg'   => 'You need to login.',
            ));
        }
    };
};

 $app->get('/', function() use ($app) {
        $app->render(200,array(
                'msg' => 'Welcome to APIGolf! V 0.1',
            ));
    });

// POST route
$app->post('/', function () use ($entityManager) {

    //require_once "src/model/User.php";
	//$user = new User();
	//$user->setEmail("holis");
	//$entityManager->persist($user);
	//$entityManager->flush();

});

// POST route
$app->post('/crear_equipo', $authenticate($app), function () use ($entityManager) {

    $app->render(200,'
			{ 
			    "success": true, 
			    "response": [{ 
			        "id": 1,
			        "creador": 1111, 
			        "handicap_promedio": 12,
			        "integrantes": [ 
			            {"perfil_id": 2222},
			            {"perfil_id": 3333}
			        ]
			    }]
			}
    	');

});


$app->post("/sesiones/iniciar", function () use ($app) {
    
    $data = json_decode($app->request()->getBody());

    $errors = array();

    if ($data->username != "brian@nesbot.com") {
        $errors['email'] = "Email is not found.";
    } else if ($data->password != "aaaa") {
        $app->flash('email', $data->username);
        $errors['password'] = "Password does not match.";
    }

    if (count($errors) > 0) {
        $app->render(404,$errors);
    }

    $_SESSION['user'] = $email;

    if (isset($_SESSION['urlRedirect'])) {
       $tmp = $_SESSION['urlRedirect'];
       unset($_SESSION['urlRedirect']);
       $app->redirect($tmp);
    }

    $app->render(200,array(
            'msg' => "Se ha iniciado sesion",
        ));
});

$app->get("/logout", function () use ($app) {
   unset($_SESSION['user']);
   $app->view()->setData('user', null);
   //$app->render('logout.php');
   ///$app->response()->status(200);
   echo "Sesion cerrada..";
});


/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();