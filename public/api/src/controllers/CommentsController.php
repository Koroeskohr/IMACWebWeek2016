<?php

require __DIR__.'/../models/Comment.php';

class CommentsController {
	private $app;
	private $comment;

	public function __construct($app) {
		$this->app = $app;
		$this->comment = new Comment($app->db);
	}

	public function showCommentsFromPost($request, $response, $args){
		$result = $this->comment->getCommentsByPost($args['ids']);
		return $response->withJson($result);
	}

	public function showResponse($request, $response, $args){
		$result = $this->comment->getResponse($args['id']);
		return $response->withJson($result);
	}

	public function showAll($request, $response, $args){
		$result = $this->comment->getAll();
		return $response->withJson($result);
	}

	public function create($request, $response, $args){
		$body   = $request->getParsedBody();
	    $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
	    $texte  = filter_var($body['texte'], FILTER_SANITIZE_STRING);

		$response->status = $this->comment->create($args['id'],$auteur,$texte);
		return $response->withJson(http_response_code());
	}

	public function createReponse($request, $response, $args){
  	 	$body   = $request->getParsedBody();
	    $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
	    $texte  = filter_var($body['texte'], FILTER_SANITIZE_STRING);

		$response->status = $this->comment->createResponse($args['id_post'],$args['id_comment'],$auteur,$texte);
		return $response->withJson(http_response_code());
	}

}

?>
