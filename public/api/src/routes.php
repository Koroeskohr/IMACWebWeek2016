<?php
// Routes


// EXAMPLE
// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

$app->get('/route/{id}', function($request, $response, $args) {
  $array = [ "id" => $args['id'] ];
  return $response->withJson($array);
});

// topic/*/posts
$app->get('/topic/{id}/posts/', function($request, $response, $args) {
    $sql = 'SELECT DISTINCT * FROM Post INNER JOIN Sujet ON Post.sujet = '.$args['id'];
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});

// /post/*/comments
$app->get('/post/{id}/comments/', function($request, $response, $args) {
    $id_array = explode(",",$args['id']);
    $sql = 'SELECT * FROM Comments WHERE ';
    for($i = 0; $i < count($id_array)-1; $i++) {
        $sql .= 'id = '.$id_array[$i].' OR ';
    }
    $sql .= 'id = '.$id_array[$i].';';
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});

$app->get('/post/{id}', function($request, $response, $args) {
    $sql = 'SELECT * FROM Post WHERE id='.$args['id'];
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});

// /topics GET
$app->get('/topics/', function($request, $response, $args) {
    $sql = 'SELECT * FROM Sujet';
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});

// /topics PATCH
// $app->patch('/topics/', function($request, $response, $args) {

// });

$app->get('/jsonTestRoute', function($request, $response, $args) {
  $array = [ "key" => "value" ];
  return $response->withJson($array);
});


/* GET POST UPDATE DELETE*/
///a partir de la
//jointure

$app->get('/tag/{id}/posts', function($request, $response, $args) {
  $sql = 'SELECT * FROM Post INNER JOIN Tagge ON idPost=idTag';
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $response->withJson($result);
});

//jointure

// ID topic

$app->get('/topic/{id}/', function($request, $response, $args) {
  $sql = 'SELECT * FROM Sujet WHERE id='.$args['id'];
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
  return $response->withJson($result);
});	

// tags sur le post

$app->get('/post/{id}/tags/', function($request, $response, $args) {
	$sql = 'SELECT * FROM Tagge WHERE idPost='.$args['id'];
   	$query = $this->db->query($sql);
   	$result = $query->fetchAll();
  return $response->withJson($result);
});


// post - creer un post
$app->post('/tags/', function($request, $response, $args) {
	$sql = 'SELECT * FROM Post WHERE idPost='.$args['id'];
    $query = $app->request->post();
    $result = $query->fetchAll();
  return $response->withJson($result);
});


// update post

$app->patch('/post/{id}/tags/', function($request, $response, $args) {
  $query = [ "key" => "value" ];
   $result = $query->fetchAll();
  return $response->withJson($result);
});

//delete post
$app->delete('/post/{id}/tags/', function($request, $response, $args) {
  $query = [ "key" => "value" ];
    $result = $query->fetchAll();
  return $response->withJson($result);
});


