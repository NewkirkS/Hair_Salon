<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=hair_salon'; //Check port for localhost in mamp
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    //STYLIST ROUTES

    //home, includes form for creating stylists and lists stylists

    $app->get("/", function() use ($app) {
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    // post route for creating a stylist, goes back to index

    $app->post("/create_stylist", function() use ($app) {
        $new_stylist = new Stylist($_POST['name']);
        $new_stylist->save();
        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    //get route for going to update page for particular stylist



    //update route to change stylist, goes back to index



    //delete route for deleting a single stylist, goes back to index



    //CLIENT ROUTES

    //get route for displaying all clients of a particular stylist, goes to clients page



    //post route for adding a client, goes to client page



    //get route for going to update client page



    //update route for updating client, goes back to client page



    //delete route for individual client, goes back to client page



    return $app;
?>
