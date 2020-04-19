<?php

namespace app\controllers;

use app\resource\Post;
// use yii\rest\ActiveController;


/**
* class ActiveController
*
* @author Ibrahim.h
* @package app\controllers
*/
class PostController extends ActiveController //\yii\web\Controller
{
    // by default ActiveController respond with JSON & XML formats
    /* Yii2 by default doesn't parse JSON body (add JsonParser to config/web.php[component\request])*/
    public $modelClass = Post::class;

}
