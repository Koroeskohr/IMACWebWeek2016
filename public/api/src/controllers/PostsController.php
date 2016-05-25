<?php

class PostsController {
	private $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function createPostOnSubject($request, $response, $args){
		try{
		    $body   = $request->getParsedBody();
		    $titre  = filter_var($body['titre'], FILTER_SANITIZE_STRING);
		    $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
		    $image  = filter_var($body['image'], FILTER_SANITIZE_STRING);
		    $texte  = filter_var($body['contenu'], FILTER_SANITIZE_STRING);

		    if (empty($image)){
		      $sql = "INSERT INTO Post (`titre`, `auteur`, `image`, `texte`, `sujet`) VALUES ('".$titre."', '".$auteur."', 'NULL', '".$texte."', '".$args["id"]."');";
		    } else {
		      $sql = "INSERT INTO Post (`titre`, `auteur`, `image`, `texte`, `sujet`) VALUES ('".$titre."', '".$auteur."', '".$image."', '".$texte."', '".$args["id"]."');";
		    }
		    $query = $this->app->db->query($sql);

		    $response->status = 200;
		} catch (Exception $e){
		    $response->status = 400;
		}
		return $response->withJson(http_response_code());

	}

	public function showAll($request, $response, $args){
		$sql = "SELECT * FROM Post";
		$query = $this->app->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	public function showOnePost($request, $response, $args){
		  $sql = "SELECT * FROM Post WHERE id = ".$args["id"].";";
		  $query = $this->app->db->query($sql);
		  $result = $query->fetchAll();
		  return $response->withJson($result);
	}

	public function showPostFromSubject($request, $response, $args){
		$sql = "SELECT * FROM Post WHERE sujet =".$args["id"].";";
		$query = $this->app->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	public function showPostFromTags($request, $response, $args){
		  $sql = "SELECT * FROM Post INNER JOIN Tagge ON Tagge.idTag = ".$args["id"]." WHERE Tagge.idPost = Post.id;";
		  $query = $this->app->db->query($sql);
		  $result = $query->fetchAll();
		  return $response->withJson($result);
	}

	public function deletePost($request, $response, $args){
		$sql = "SELECT * FROM Post WHERE id = ".$args["id"].";";
		$query = $this->app->db->query($sql);
		$result = $query->fetchAll();
		if (count($result) == 1) {
			$sql = "DELETE FROM Post WHERE id = ".$args["id"];
			$query = $this->app->db->query($sql);
			$response->status = 200;
		} else {
			$response->status = 400;
		}
		return $response->withJson(http_response_code());
	}
}

?>
