<?php
// Routes
require 'controllers/TopicsController.php';
require 'controllers/PostsController.php';
require 'controllers/CommentsController.php';
require 'controllers/TagsController.php';


// Route for post.
$app->get('/post/search', '\PostsController:showSearch');
$app->get('/topic/{id}/posts', '\PostsController:showPostFromSubject');
$app->get('/post/{id}', '\PostsController:showOnePost');

$app->get('/posts', '\PostsController:showAll');
$app->get('/tag/{id}/posts','\PostsController:showPostFromTags');
$app->post('/post/{id}','\PostsController:showLikePost');
$app->post('/topic/{id}/posts', '\PostsController:createPostOnSubject');
$app->delete('/post/{id}', '\PostsController:deletePost');
 
// Route for comments.
$app->get('/comments','\CommentsController:showAll');
$app->get('/comment/{id}','\CommentsController:showResponse');
$app->get('/post/{ids}/comments', '\CommentsController:showCommentsFromPost');
$app->post('/post/{id_post}/comment/{id_comment}', '\CommentsController:createReponse');
$app->post('/post/{id}/comments','\CommentsController:create');

// Route for topics.
$app->get('/topic/{id}','\TopicsController:showTopic');
$app->get('/topics','\TopicsController:show');
$app->post('/topics', '\TopicsController:create');
$app->put('/topic/{id}','\TopicsController:update');
$app->delete('/topic/{id}','\TopicsController:delete');

// Route for tags.
$app->get('/post/{id}/tags','\TagsController:show');
$app->post('/post/{id}/tags','\TagsController:createTag');


// Route for likes.

// Supprime les tags d'un post
/*$app->delete('/post/{id}/tags', function($request, $response, $args) {
  $body = $request->getParsedBody();

  $sql = "SELECT * FROM Post WHERE id = ".$args["id"];
  $query = $this->db->query($sql);
  $result = $query->fetchAll();

  if (count($result) == 0) { return "Le post n'existe pas";  }

  $tags = filter_var($body['toDeleteTag'], FILTER_SANITIZE_STRING);
  $tabTags = explode(",", $tags);

  foreach($tabTags as $tagCourant){
    $sql = "SELECT * FROM Tagge WHERE idTag = '".$tagCourant."';";
    $query = $this->db->query($sql);
    $result = $query->fetchAll();
    if (count($result) != 0) {
       $reponse = $result[0]['id'];
    }

    $sql = "DELETE FROM Tagge WHERE idPost = ".$args["id"]." && idTag = ".$reponse;
    $query = $this->db->query($sql);
    $result = $query->fetchAll();

  }



  return 'yeah';
}); */
