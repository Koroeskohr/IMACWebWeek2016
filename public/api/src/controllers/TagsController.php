<?php 

class TagsController {
	protected $ci;

	public __construct(ContainerInterface ci) {
		$this->ci = ci;
	}

	public function create($request, $response, $args)
	{
		try{
		    $body  = $request->getParsedBody();
		    $tags = filter_var($body['nomTag'], FILTER_SANITIZE_STRING);

		    $sql = "SELECT * FROM Post WHERE id = ".$args["id"];
		    $query = $this->db->query($sql);
		    $result = $query->fetchAll();

		    if (count($result) == 0) { return "Le post n'existe pas";  }

		    $tabTags = explode(",", $tags);

		    foreach($tabTags as $tagCourant){
		      $sql = "SELECT id FROM Tag WHERE nom = '".$tagCourant."';";
		      $query = $this->db->query($sql);
		      $result = $query->fetchAll();
		      if (count($result) == 0) {
		         $sql = "INSERT INTO Tag (`nom`) VALUES ('".$tagCourant."');";
		         $query = $this->db->query($sql);
		         $reponse = $this->db->lastInsertId();
		      } else {
		        $reponse = $result[0]['id'];
		      }

		      $sql = "SELECT * FROM Tagge WHERE idPost = ".$args["id"]." && idTag = ".$reponse;
		      $query = $this->db->query($sql);
		      $result = $query->fetchAll();

		      if (count($result) == 0) {
		         $sql = "INSERT INTO Tagge VALUES ('".$args["id"]."','".$reponse."');";
		         $query = $this->db->query($sql);
		      }
		      $response->status = 200;
		    }
		  } catch(Exception $e) {
		    $response->status = 200;
		  }
		  return $response->withJson(http_response_code());
	}

	public function show($request, $response, $args)
	{
		$sql = "SELECT * FROM Tag INNER JOIN Tagge ON Tagge.idTag = Tag.id WHERE Tagge.idPost = ".$args["id"].";";
		  $query = $this->db->query($sql);
		  $result = $query->fetchAll();
		  return $response->withJson($result);
	}
}

?>