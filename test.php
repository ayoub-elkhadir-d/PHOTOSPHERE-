<?php 


require_once __DIR__ . '/App/Repositories/User_Repo.php';
require_once __DIR__ . '/App/Repositories/Post_repo.php';
require_once __DIR__ . '/App/Entities/Album.php';
require_once __DIR__ . '/App/Entities/ProUser.php';
require_once __DIR__ . '/App/Entities/Album.php';
require_once __DIR__ . '/App/Repositories/Comment_repo.php';
require_once __DIR__ . '/App/Repositories/Album_repo.php';
require_once __DIR__ . '/App/Repositories/Likes_repo.php';

 $obj7 = new  ProUser(11,'ayoub123','dfghjklmù*','kjhg@hgg.com,','kjhbgvc','Admin');

 $comment_repo = new Comment_repo();
 $pst_repo = new Post_repo();
 $pst_repo = new Album_Repo();
 $user_repo = new User_Repo();
 $like_repo = new Likes_repo();

 $obj2 = new Post(0,1,"Getting 8000","This is a description of the post.","images/post01.jpg","published",0 ,date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),null);

$newComment = new Comment(
 0,
 5,
 7,
 "This is a great post!",
 date('Y-m-d H:i:s'),
 null                
);

$like = new Like(
0,   
1,
10, 
date('Y-m-d H:i:s')
);

// $album = new Album(
//     1,
//     "pub",        
//     "covers/summer.jpg",       
//     25,                       
//     date('Y-m-d H:i:s'),       
//     date('Y-m-d H:i:s')         
// );


$comment_repo -> addComment($newComment);
// $like_repo->addLike($like);


// class Article implements Taggable
// {
//     use TaggableTrait;
// }



?>