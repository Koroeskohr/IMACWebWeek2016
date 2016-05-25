<?php

class TopicsController {
	protected $ci; 

	public __construct(ContainerInterface ci) {
		$this->ci = ci;
	}

	public function create($request, $response, $args)
	{
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
		  } catch(Exception $e) {
		    $response->status = 400;
		  }
		  return $response->withJson(http_response_code());
	}

	public function update($request, $response, $args)
	{
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
		} catch(Exception $e) {
			$response->status = 400;
		}
		return $response->withJson(http_response_code());
	}

	public function show($request, $response, $args)
	{
		$sql = "SELECT * FROM Sujet;";
  		$query = $this->db->query($sql);
  		$result = $query->fetchAll();
  		return $response->withJson($result);
	}

	public function delete($request, $response, $args)
	{
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
	}
}

?>