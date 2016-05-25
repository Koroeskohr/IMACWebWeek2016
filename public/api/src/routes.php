<?php
// Routes


// EXAMPLE
// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

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


/* TOPICS */

$app->get('/topics', function($request, $response, $args) {
    $sql = 'SELECT * FROM Sujet';
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    return $response->withJson($result);
});

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

$app->delete('/topic/{id}', function($request, $response, $args) {
  try{
    $sql = "SELECT * FROM Sujet WHERE id = ".$args["id"];
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    if (count($result) == 1) {
      $sql = "DELETE FROM Sujet WHERE id = ".$args["id"];
      $query = $this->db->query($sql);
    }
    $response->status = 200;
  } catch(Exception $e) {
    $response->status = 400;
  }
  return $response->withJson(http_response_code());
});

/* POSTS */

$app->get('/topic/{id}/posts', function($request, $response, $args) {
    $sql = 'SELECT * FROM Post WHERE sujet = '.$args['id'];
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

$app->post('/topic/{id}/posts', function($request, $response, $args) {
  try{
    $body        = $request->getParsedBody();
    $titre       = filter_var($body['titre'], FILTER_SANITIZE_STRING);
    $author      = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
    $img_url     = filter_var($body['img_url'], FILTER_SANITIZE_STRING);
    $description = filter_var($body['description'], FILTER_SANITIZE_STRING);
    if(empty($image)){
      $sql = "INSERT INTO Post (`titre`, `auteur`,`image`,`texte`,`sujet`) VALUES ('".$titre."','".$author."','".$img_url."','".$description."','".$args['id']."');'";
    } else {
      $sql = "INSERT INTO Post (`titre`, `auteur`,`texte`,`sujet`) VALUES ('".$titre."','".$author."','".$description."','".$args['id']."');'";
    }

    $query = $this->db->query($sql);
    // $result = $query->fetchAll();
    $response->status = 200;
  } catch (Exception $e){
    $result = NULL;
    $response->status = 400;
  }
  // var_dump($result);
  return $response->withJson(http_response_code());
});

$app->get('/posts', function($request, $response, $args) {
  $sql = 'SELECT * FROM Post';
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $response->withJson($result);
});

$app->get('/comments', function($request, $response, $args) {
  $sql = 'SELECT * FROM Comments';
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $response->withJson($result);
});



$app->get('/tag/{id}/posts', function($request, $response, $args) {
  $sql = 'SELECT * FROM Post INNER JOIN Tagge ON idTag='.$args['id'];
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $query;
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
$app->post('/post/{id}/tags', function($request, $response, $args) {

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
		$body  = $request->getParsedBody();
		$id_array = explode(",",$body['tags']);

		for($i = 0; $i < count($id_array)-1; $i++) {
			$sql = "SELECT * FROM Tag WHERE nom='".$id_array[$i]."'";
			$query = $this->db->query($sql);
			$result = $query->fetchAll();
			if (count($result) == 0) {
				$request = "INSERT INTO Tag ('nom') VALUES ('".$id_array[$i]."');";
				$query = $this->db->query($request);
				// INSERT INTO Tagge('idPost','idTag') VALUES (".$args['id'].",".$id_array[$i].");"
			}
		}


		$response->status = 200;
  } catch (Exception $e){
	  var_dump($e);
    $response->status = 400;
  }
  return $response->withJson(http_response_code());
});

// update tags
$app->put('/tags', function($request, $response, $args) {
  $sql = 'SELECT * FROM Tag where id='.args['tag_id'];
  $tag = $this->db->query($sql);

  if($tag->fetch()){
    $post = $app->request()->put();
    $result = $tag->update($post);
    $response->status(200);
  }
  else{
    $response->status(400);
  }
  return $response->withJson(http_response_code());

});
/*
// get like
$app->get('/post/{id}/likes', function($request, $response, $args){
  $sql = 'SELECT likes FROM Post WHERE id='=.args['id'];
  $query = $this->db->query($sql);
  $result = $query->fetchAll();
  return $response->withJson($result);
});

// post like
$app->post('/post/{id}/likes'), function($request, $response, $args){

    $sql = 'SELECT likes FROM Post WHERE id='=.args['id'];
    $query = $this->db->query($sql);
    $result = $query->fetchAll();

    $result+=1;

    return $response->withJson($result);

});*/
