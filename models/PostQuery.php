<?php

namespace app\models;

use app\models\Post;

class PostQuery extends Post
{
    public function allPosts()
    {
        return $query = Post::find();
    }

    public function onePost($id)
    {
        return $query = Post::findOne($id);
    }
}