<?php

class CommentsConstructor {
    public __construct(ContainerInterface ci) {
        $this->ci = ci;
    }

    public function show($body, $request, $response, $args) {
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
