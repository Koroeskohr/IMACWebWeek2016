<?php

require __DIR__.'/../models/Topic.php';

class TopicsController {
	private $app;
	private $topic;

	public function __construct($app) {
		$this->app = $app;
		$this->topic = new Topic($app->db);
	}

	public function create($request, $response, $args)
	{
		$body  = $request->getParsedBody();
		$titre = filter_var($body['titre'], FILTER_SANITIZE_STRING);
		$response->status = $this->topic->create($titre);
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
		$body = $request->getParsedBody();
		$id = $args["id"];
		$titre = $body["titre"];
		$response->status = $this->topic->update($id,$titre);
		return $response->withJson(http_response_code());
	}

	public function show($request, $response, $args)
	{
		$result = $this->topic->getAll();
  		return $response->withJson($result);
	}

	public function delete($request, $response, $args)
	{
		  $response->status = $this->topic->delete($args["id"]);
		  return $response->withJson(http_response_code());
	}
}

?>
