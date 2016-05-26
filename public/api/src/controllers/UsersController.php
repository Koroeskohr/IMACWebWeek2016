<?php

require __DIR__.'/../models/User.php';

class PostsController {
	private $app;
	private $post;

	public function __construct($app) {
		$this->app = $app;
		$this->user = new User($app->db); 
	}

	public function createPostOnSubject($request, $response, $args) {
		// $body   = $request->getParsedBody();
		// $titre  = filter_var($body['titre'], FILTER_SANITIZE_STRING);
		// $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
		// $image  = filter_var($body['image'], FILTER_SANITIZE_STRING);
		// $texte  = filter_var($body['contenu'], FILTER_SANITIZE_STRING);

		// $response->status = $this->user->create($titre, $auteur, $image, $texte, $args['id']);
		
		// return $response->withJson(http_response_code());
	}

	public function showAll($request, $response, $args){
		// $result = $this->post->getAll();
		// return $response->withJson($result);
	}

	
	public function deletePost($request, $response, $args){
		$response->status = $this->post->delete($args['id']);
		return $response->withJson(http_response_code());
	}
}

?>
