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
		$texte  = filter_var($body['texte'], FILTER_SANITIZE_STRING);

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

	public function showPostFromSubject($request, $response, $args){
		$result = $this->post->getBySubject($args['id']);
		return $response->withJson($result);
	}

	public function showPostFromTags($request, $response, $args){
		$result = $this->post->getByTag($args['id']);
		return $response->withJson($result);
	}

	public function deletePost($request, $response, $args){
		$response->status = $this->post->delete($args['id']);
		return $response->withJson(http_response_code());
	}

	public function createLikePost($request, $response, $args){
		$response->status = $this->post->likePost($args['id']);
		return $response->withJson(http_response_code());
	}

	public function showSearch($request, $response, $args){
		$search=$_GET["id"];
		$result = $this->post->showSearchPosts($search);
		return $response->withJson($result);
	}
}

?>
