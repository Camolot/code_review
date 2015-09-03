<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php"

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_if_contacts'] = array();
    }

    $app = new Silex\Application();
    $app['debug'] = false;
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__."/../views"));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('add_contact.html.twig');
    });

    $app->post('/added', function() use ($app) {

        $contact = new Contact($_POST['contact']);
        $contact->save();
        return $app['twig']->render('delete_contact.html.twig');
    });

    $app->post("/delete_contact", function() use ($app) {
        Place::deleteAll();
        return $app['twig']->('delete_contact.html.twig');
  });

    return $app;
?>
