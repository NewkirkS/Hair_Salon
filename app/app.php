<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";


    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost;dbname=hair_salon'; //Check port for localhost in mamp
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

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

    $app->get("/stylists/{id}/update", function($id) use ($app){
        $stylist = Stylist::find($id);
        return $app['twig']->render("update_stylist.html.twig", array('stylist' => $stylist));
    });

    //patch route to change stylist, goes back to index

    $app->patch("/stylists/{id}", function($id) use ($app) {
        $new_name = $_POST['name'];
        $stylist = Stylist::find($id);
        $stylist->update($new_name);
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //delete route for deleting a single stylist, goes back to index



    //CLIENT ROUTES

    //get route for displaying all clients of a particular stylist, goes to clients page

    $app->get("/clients/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //post route for adding a client, goes to client page

    $app->post("/create_client", function() use ($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $new_client = new Client($name, $stylist_id);
        $new_client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //get route for going to update client page

    $app->get("/clients/{id}/update", function($id) use ($app){
        $client = Client::find($id);
        return $app['twig']->render("update_client.html.twig", array('client' => $client));
    });

    //update route for updating client, goes back to client page

    $app->patch("/clients/{id}", function($id) use ($app) {
        $new_name = $_POST['name'];
        $client = Client::find($id);
        $client->update($new_name);
        $stylist_id = $client->getStylistId();
        $stylist = stylist::find($stylist_id);
        return $app['twig']->render('clients.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    //delete route for individual client, goes back to client page



    return $app;
?>
