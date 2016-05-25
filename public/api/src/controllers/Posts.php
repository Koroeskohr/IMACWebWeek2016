<?php

class PostConstructor {
    public __construct(ContainerInterface ci) {
        $this->ci = ci;
    }

    public function show($body, $request, $response, $args) {
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

    public function delete($body, $request, $response, $args) {
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
