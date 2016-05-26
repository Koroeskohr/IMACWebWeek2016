<?php

class CommentsController {
	private $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function showCommentsFromPost($request, $response, $args){
		$sql = "SELECT * FROM Comments WHERE reponse IS NULL AND post = ".$args['ids'];
		$query = $this->app->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	public function showAll($request, $response, $args){
		$sql = "SELECT * FROM Comments";
		$query = $this->app->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	public function create($request, $response, $args){
		try{
   			$body   = $request->getParsedBody();
		    $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
		    $texte  = filter_var($body['contenu'], FILTER_SANITIZE_STRING);

		    $sql = "INSERT INTO Comments (`auteur`, `texte`, `post`) VALUES ('".$auteur."', '".$texte."', '".$args['id']."');";
		    $query = $this->app->db->query($sql);

		    $response->status = 200;
		} catch (Exception $e){
		    $response->status = 400;
		}
		return $response->withJson(http_response_code());
	}

	public function createReponse($request, $response, $args){
		try{
	  	 	$body   = $request->getParsedBody();
		    $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
		    $texte  = filter_var($body['contenu'], FILTER_SANITIZE_STRING);

		    $sql = "INSERT INTO Comments (`auteur`, `texte`, `post`, `reponse`) VALUES ('".$auteur."', '".$texte."', '".$args['id_post']."', '".$args['id_comment']."');";
		    $query = $this->app->db->query($sql);

		    $response->status = 200;
		} catch (Exception $e){
		    $response->status = 400;
		}
	  return $response->withJson(http_response_code());
	}



}

?>
