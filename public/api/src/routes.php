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

$app->get('/jsonTestRoute', function($request, $response, $args) {
  $array = [ "key" => "value" ];
  return $response->withJson($array);
});


/* GET POST UPDATE DELETE*/
///a partir de la
//jointure

$app->get('/tag/{id}/posts', function($request, $response, $args) {
  $sql = 'SELECT * FROM posts INNER JOIN tags ON posts.id=tags.id}';
  $array = $this->db->query($sql);
  return $response->withJson($array);
});

//jointure

// ID topic 

$app->get('/topics/{id}/', function($request, $response, $args) {
  $sql = 'SELECT id FROM topics WHERE id_topics {id}';
    $array = $this->db->query($sql);
  return $response->withJson($array);
});

// tags sur le post

$app->get('/post/{id}/tags/', function($request, $response, $args) {
  	$sql = 'SELECT tags FROM posts WHERE id_tags {id}';
   	$array = $this->db->query($sql);
  return $response->withJson($array);
});


// post - creer un post 
$app->post('/tags/', function($request, $response, $args) {
	$sql = 'SELECT * FROM tags' ;
    $array = $app->request->post();
  return $response->withJson($array);
});


// update post

$app->patch('/post/{id}/tags/', function($request, $response, $args) {
  $array = [ "key" => "value" ];
  return $response->withJson($array);
});

//delete post
$app->delete('/post/{id}/tags/', function($request, $response, $args) {
  $array = [ "key" => "value" ];
  return $response->withJson($array);
});



