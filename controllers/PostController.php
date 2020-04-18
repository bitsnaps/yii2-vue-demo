<?php

namespace app\controllers;

use app\models\Post;
use yii\rest\ActiveController;

/**
* class ActiveController
*
* @author Ibrahim.h
* @package app\controllers
*/
class PostController extends ActiveController //\yii\web\Controller
{
    /* Yii2 by default doesn't parse JSON body (add JsonParser to config/web.php[component\request])*/
    public $modelClass = Post::class;

}
