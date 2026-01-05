<?php 
require_once  'User.php';

class BasicUser extends User{

       public function getRole(){
         return "basic";
       }
      public function login($username,$password){


      }
    function addComment(Comment $cmt){

      $comment_repo = new Comment_repo();

      $comment_repo->insert($cmt);

    }

    function addPost(Post $pst){

      $post_repo = new Post_repo();

      $post_repo->insert($pst);

    }

    function addPublicAlbum(Album $alb){
     $albumrepo = new Album_repo();
     $albumrepo->insert_public_album($alb);

    }

    public function publish($id) {
        $Post_Repo = new Post_Repo();
        $post = $Post_Repo -> fetch($id);
        $post->setStatus("published");
        $post->published_at = date('Y-m-d H:i:s');
        return $repo->update($post);
    }

  function addLike(Like $like){
     $likerepo = new Likes_Repo();
     $likerepo->add($like);
    }
 

}