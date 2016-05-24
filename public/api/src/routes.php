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
// $app->put('/topics', function($request, $response, $args) {
//   $sql = 'SELECT * FROM Sujet WHERE id='.$args['id'];
//   $topic = $this->db->query($sql);

//   if($topic->fetch()){
//     $post = $app->request()->put();
//     $result = $topic->update($post);
//     return $app->response->setStatus(200);
//   }
//   else{
//     return $app->response->setStatus(418); //Trololololol EN FAIT C'EST (400)
//   }

// });


/* GET POST UPDATE DELETE*/
///a partir de la
//jointure

// $app->delete('/topics', function($request, $response, $args) {
//   $query = 'DELETE FROM Sujet WHERE id='.$args['id'];
//   $query = $app->request->post();
//   $result = $query->fetchAll();
//   return $app->response->setStatus(200);
// });

$app->post('/topics', function($request, $response, $args) {
  try{
    $body  = $request->getParsedBody();
    $titre = filter_var($body['titre'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM Sujet WHERE titre = '".$titre."';";
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    if (count($result) == 0) {
       $sql = "INSERT INTO Sujet (`titre`) VALUES ('".$titre."');";
       $query = $this->db->query($sql);
    } else {
      return "ALREADY EXIST";
    }
    $response->status = 200;
  } catch (Exception $e){
    $response->status = 400;
  }
  return $response->withJson(http_response_code());
});

$app->put('/topic/{id}', function($request, $response, $args) {
  try {
    $body = $request->getParsedBody();
    $sql = "SELECT * FROM Sujet WHERE id = '".$args["id"]."';";
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    if (count($result) == 1) {
        $sql = "UPDATE Sujet SET titre ='".$body["titre"]."' WHERE id=".$args['id'].";";
        $query = $this->db->query($sql);
    }
    $response->status = 200;
  } catch (Exception $e){
    $response->status = 400;
  }
  return $response->withJson(http_response_code());
});

// $app->delete('/topic/{id}', function($request, $response, $args) {
//   try {
//     $sql = "SELECT * FROM Sujet WHERE id = ".$args["id"];
//     $query = $this->db->query($sql);
//     $result = $query->fetchAll();
//     if (count($result) == 1) {
//         $sql = "DELETE FROM Sujet WHERE id=".$args['id'];
//         $query = $this->db->query($sql);
//     }
//     $response->status = 200;
//   } catch (Exception $e){
//     $response->status = 400;
//   }
//   return $response->withJson(http_response_code());
// });

$app->get('/tag/{id}/posts', function($request, $response, $args) {
  $sql = 'SELECT * FROM Post INNER JOIN Tagge ON idTag='.$args['id'];
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $query;
});

$app->delete('/topic/{id}', function($request, $response, $args) {
  $sql = "SELECT * FROM Sujet WHERE id = ".$args["id"];
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  if (count($result) == 1) {
    $sql = "DELETE FROM Sujet WHERE id = ".$args["id"];
    $query = $this->db->query($sql);
    return "deleted";
  }
  return "beurk";
});

//jointure

// ID topic


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
	/* $id_array = explode(",",$args['id']);
    $sql = 'SELECT * FROM Comments WHERE ';
    for($i = 0; $i < count($id_array)-1; $i++) {
        $sql .= 'id = '.$id_array[$i].' OR ';
    }
    $sql .= 'id = '.$id_array[$i].';';
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);*/
	try{
		$id_array = explode(",",$args['id']);
		$sql = 'SELECT * FROM Tag WHERE ';
		for($i = 0; $i < count($id_array)-1; $i++) {
			$sql .= 'nom = '.$id_array[$i].' OR ';
		}
		$sql .= 'id = '.$id_array[$i].';';
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		if (count($result) == 0) {
			for($i = 0; $i < count($id_array)-1; $i++) {
				$request .= "INSERT INTO Tag ('nom') VALUES('".$id_array[$i]."');";
			}
		$query = $this->db->query($request);
		$response->status = 200;
  } catch (Exception $e){
    $response->status = 400;
  }
  return $response->withJson(http_response_code());
});

// update post

$app->put('/tags', function($request, $response, $args) {
  $sql = 'SELECT * FROM Tag where id='.args['tag_id'];
  $tag = $this->db->query($sql);

  if($tag->fetch()){
    $post = $app->request()->put();
    $result = $tag->update($post);
    return $app->response->setStatus(200);
  }
  else{
    return $app->response->setStatus(418); //Trololololol EN FAIT C'EST (400)
  }

});

//delete post
$app->delete('/posts', function($request, $response, $args) {
  $query = 'DELETE FROM Post WHERE idPost='.args['id'];
  $query = $app->request->post();
  $result = $query->fetchAll();
  return $app->response->setStatus(200);
});
