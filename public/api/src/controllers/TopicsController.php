<?php

class TopicsController {
	private $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function create($request, $response, $args)
	{
		try{
		    $body  = $request->getParsedBody();
		    $titre = filter_var($body['titre'], FILTER_SANITIZE_STRING);
		    $sql = "SELECT * FROM Sujet WHERE titre = '".$titre."';";
		    $query = $this->app->db->query($sql);
		    $result = $query->fetchAll();
		    if (count($result) == 0) {
		       $sql = "INSERT INTO Sujet (`titre`) VALUES ('".$titre."');";
		       $query = $this->app->db->query($sql);
		       $response->status = 200;
		    } else {
		    	$response->status = 202;
		    }
		  } catch (Exception $e){
		    $response->status = 400;
		  }
		  return $response->withJson(http_response_code());
	}

	public function showTopic($request,$response,$args)
	{
		$sql = "SELECT * FROM Sujet WHERE id = ".$args["id"].";";
  		$query = $this->app->db->query($sql);
  		$result = $query->fetchAll();

  		$sql = "SELECT * FROM Post WHERE sujet =".$args["id"].";";
  		$query = $this->app->db->query($sql);
  		$resultSecond = $query->fetchAll();

  		$result = $result[0];
  		$result["countPost"] = count($resultSecond);
  		return $response->withJson($result);
	}

	public function update($request, $response, $args)
	{
		try {
			$body = $request->getParsedBody();
			$sql = "SELECT * FROM Sujet WHERE id = '".$args["id"]."';";
			$query = $this->app->db->query($sql);
			$result = $query->fetchAll();
			if (count($result) == 1) {
			    $sql = "UPDATE Sujet SET titre ='".$body["titre"]."' WHERE id=".$args['id'].";";
			    $query = $this->app->db->query($sql);
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
  		$query = $this->app->db->query($sql);
  		$result = $query->fetchAll();
  		return $response->withJson($result);
	}

	public function delete($request, $response, $args)
	{
		  try{
		    $sql = "SELECT * FROM Sujet WHERE id = ".$args["id"];
		    $query = $this->app->db->query($sql);
		    $result = $query->fetchAll();
		    if (count($result) == 1) {
		      $sql = "DELETE FROM Sujet WHERE id = ".$args["id"];
		      $query = $this->app->db->query($sql);
		    }
		    $response->status = 200;
		  } catch(Exception $e) {
		    $response->status = 400;
		  }
		  return $response->withJson(http_response_code());
	}
}

?>
