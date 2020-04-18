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
    public $modelClass = Post::class;

}
