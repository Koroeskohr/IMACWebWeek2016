<?php
// Routes


// EXAMPLE
// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

// topic/*/posts
$app->get('/topic/{id}/posts', function($request, $response, $args) {
    $sql = 'SELECT * FROM Post WHERE sujet = '.$args['id'];
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});

// /post/*/comments
$app->get('/post/{id}/comments', function($request, $response, $args) {
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
$app->get('/topics', function($request, $response, $args) {
    $sql = 'SELECT * FROM Sujet';
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});


// /topics POST
// $app->post('/topics', function ($request, $response, $args) {
//     $array = $request->getQueryParams();
//     $array = $request->getParams();
//     return $response->withJson($array);
// });

// /topics PATCH
$app->put('/topics', function($request, $response, $args) {
  $sql = 'SELECT * FROM Sujet WHERE id='.$args['id'];
  $topic = $this->db->query($sql);

  if($topic->fetch()){
    $post = $app->request()->put();
    $result = $topic->update($post);
    return $app->response->setStatus(200);
  }
  else{
    return $app->response->setStatus(418); //Trololololol
  }

});


/* GET POST UPDATE DELETE*/
///a partir de la
//jointure

$app->delete('/topics', function($request, $response, $args) {
  $query = 'DELETE FROM Sujet WHERE id='.$args['id'];
  $query = $app->request->post();
  $result = $query->fetchAll();
  return $app->response->setStatus(200);
});


$app->get('/tag/{id}/posts', function($request, $response, $args) {
  $sql = 'SELECT * FROM Post INNER JOIN Tagge ON idTag='.$args['id'];
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $query;
});

//jointure

// ID topic


$app->post('/topics', function($request,$response,$args) use ($app) {
  try{
    $titre = $app->request->post('titre');
    var_dump($titre);
    $sql = 'INSERT INTO Sujet VALUES '.$titre;
    $query = $this->db->exec($sql);
    $response->setStatus(200);
  } catch (Exception $e) {
    $response->setStatus(400);
  }
  return $response;
});

// tags sur le post
$app->get('/post/{id}/tags', function($request, $response, $args) {
	$sql = 'SELECT * FROM Tagge WHERE idPost='.$args['id'];
 	$query = $this->db->query($sql);
 	$result = $query->fetchAll();
  return $response->withJson($result);
});
//delete post->tag

$app->delete('/post/{id}/tags', function($request, $response, $args) {
  $query = 'DELETE FROM Tagge WHERE idPost='.args['id'].' AND idTag='.$args['tag_id'];
  $query = $app->request->post();
  $result = $query->fetchAll();
  return $app->response->setStatus(200);
});


// post - creer un post
$app->post('/tags', function($request, $response, $args) {
	$sql = 'SELECT * FROM Post WHERE idPost='.$args['id'];
  $query = $app->request->post();
  $result = $query->fetchAll();
  return $response->withJson($result);
});


// update post

$app->patch('/post/{id}/tags', function($request, $response, $args) {
  $query = [ "key" => "value" ];
   $result = $query->fetchAll();
  return $response->withJson($result);
});

//delete post
$app->delete('/posts', function($request, $response, $args) {
  $query = 'DELETE FROM Post WHERE idPost='.args['id'];
  $query = $app->request->post();
  $result = $query->fetchAll();
  return $app->response->setStatus(200);
});


