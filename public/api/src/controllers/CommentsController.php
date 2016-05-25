<?php

class CommentsController {
	protected $ci;

	public __construct(ContainerInterface ci) {
		$this->ci = ci;
	}

	public function showCommentsFromPost($request, $response, $args){
		$id_array = explode(",", $args["ids"]);
		$sql = "SELECT * FROM Comments WHERE ";
		for ($i = 0; $i < count($id_array)-1; $i++) {
		$sql .= "id = ".$id_array[$i]." OR ";
		}
		$sql .= "id = ".$id_array[$i].";";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	public function showAll($request, $response, $args){
		$sql = "SELECT * FROM Comments";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $response->withJson($result);
	}

	public function create($request, $response, $args){
		try{
   			$body   = $request->getParsedBody();
		    $auteur = filter_var($body['auteur'], FILTER_SANITIZE_STRING);
		    $texte  = filter_var($body['contenu'], FILTER_SANITIZE_STRING);

		    $sql = "INSERT INTO Comments (`auteur`, `texte`, `post`, `reponse`) VALUES ('".$auteur."', '".$texte."', '".$args['id']."');";
		    $query = $this->db->query($sql);

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
		    $query = $this->db->query($sql);

		    $response->status = 200;
		} catch (Exception $e){
		    $response->status = 400;
		}
	  return $response->withJson(http_response_code());
	}



}

?>