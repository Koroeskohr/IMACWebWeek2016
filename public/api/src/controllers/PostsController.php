<?php

require __DIR__.'/../models/Post.php';

class PostsController {
	private $app;
	private $post;

	public function __construct($app) {
		$this->app = $app;
		$this->post = new Post($app->db); 
	}

	public function createPostOnSubject($request, $response, $args) {
		$body   = $request->getParsedBody();
		$titre  = filter_var($body['titre'], FILTER_SANITIZE_STRING);
		$auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
		$image  = filter_var($body['image'], FILTER_SANITIZE_STRING);
		$texte  = filter_var($body['contenu'], FILTER_SANITIZE_STRING);

		$response->status = $this->post->create($titre, $auteur, $image, $texte, $args['id']);
		
		return $response->withJson(http_response_code());
	}

	public function showAll($request, $response, $args){
		$result = $this->post->getAll();
		return $response->withJson($result);
	}

	public function showOnePost($request, $response, $args){
		$result = $this->post->getById($args['id']);
		return $response->withJson($result);
	}
	
	public function showSearch($request, $response, $args){
		$search=$_GET["id"];
		$sql = "SELECT Post.* FROM Post INNER JOIN Tagge ON Post.id = Tagge.idPost INNER JOIN Tag ON Tagge.idTag = Tag.id INNER JOIN Sujet ON Post.sujet = Sujet.id WHERE Post.titre LIKE '%".$search."%' OR Post.texte LIKE '%".$search."%' OR Post.auteur LIKE '%".$search."%'";
		$query = $this->app->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	
	public function showPostFromSubject($request, $response, $args){
		$result = $this->post->getBySubject($args['id']);
		return $response->withJson($result);
	}

	public function showPostFromTags($request, $response, $args){
		$result = $this->post->getByTag($args['id']); 
		return $response->withJson($result);
	}
	
	public function showLikePost($request, $response, $args){
		  $sql = "SELECT likes FROM Post WHERE id = ".$args["id"];
		  $query = $this->app->db->query($sql);
		  $result = $query->fetchAll();
		  if(count($result) == 1){
			  $sql = "UPDATE Post SET likes =".(intval($result[0]['likes'])+1)." WHERE id = ".$args["id"];
			  $query = $this->app->db->query($sql);
			  $response->status = 200;
		  } else {
			  $response->status = 400;
		  }
		  return  $response->withJson(http_response_code());
	}

	public function deletePost($request, $response, $args){
		$response->status = $this->post->delete($args['id']);
		return $response->withJson(http_response_code());
	}
}

?>
