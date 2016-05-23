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
$app->get('/topic/{id}/posts', function($request, $response, $args) {
    $sql = 'SELECT post_id FROM posts WHERE id_topic {id}';
    $array = $this->db->query($sql);
    return $response->withJson($array);
});

// /post/*/comments
$app->get('/post/{id}/comments/', function($request, $response, $args) {
    $sql = 'SELECT id_comment FROM comments WHERE id_post {id}';
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

// /topics POST
$app->post('/topics/', function ($request, $response, $args) {
    $array = $app->request->post();
    return $array;
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

$app->get('/topics/{id}/', function($request, $response, $args) {
  $sql = 'SELECT id FROM topics WHERE id_topics {id}';
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
  return $response->withJson($result);
});

// tags sur le post

$app->get('/post/{id}/tags/', function($request, $response, $args) {
  	$sql = 'SELECT Tag FROM Post WHERE id_tags {id}';
   	$query = $this->db->query($sql);
   	$result = $query->fetchAll();
  return $response->withJson($result);
});


// post - creer un post
$app->post('/tags/', function($request, $response, $args) {
	$sql = 'SELECT * FROM Tag' ;
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


