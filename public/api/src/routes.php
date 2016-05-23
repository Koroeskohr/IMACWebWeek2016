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
    $array = $this->db->query($sql);
    return $response->withJson($array);
});

// /topics GET
$app->get('/topics/', function($request, $response, $args) {
    $sql = 'SELECT * FROM topics';
    $array = $this->db->query($sql);
    return $response->withJson($array);
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
