<?php

require __DIR__.'/../models/Tag.php';

class TagsController {
	private $app;
	private $tag;

	public function __construct($app) {
		$this->app = $app;
		$this->tag = new Tag($app->db);
	}

	public function createTag($request, $response, $args){
		    $body  = $request->getParsedBody();
		    $tags = filter_var($body['nomTag'], FILTER_SANITIZE_STRING);
		    $response->satus = $this->tag->create($args['id'], $tags);

		  return $response->withJson(http_response_code());
	}

	public function show($request, $response, $args){
		  $result = $this->tag->show($args['id']);

		  return $response->withJson($result);
	}
}
?>
