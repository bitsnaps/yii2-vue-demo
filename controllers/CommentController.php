<?php

namespace app\controllers;

use app\resource\Comment;
// use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;

/**
* class ActiveController
*
* @author Ibrahim.h
* @package app\controllers
*/
class CommentController extends ActiveController //\yii\web\Controller
{
    // by default ActiveController respond with JSON & XML formats
    /* Yii2 by default doesn't parse JSON body (add JsonParser to config/web.php[component\request])*/
    public $modelClass = Comment::class;

    /**
    * Override request actions and write a custom one
    */
    public function actions(){
      $actions = parent::actions();

      // remove the default implementations
      // unset($actions['index']);

      // override the ActiveDataProvider
      $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
      return $actions;
    }


    public function prepareDataProvider(){
      return new ActiveDataProvider([
        // andWhere() is generally more save than where()
        'query' => Comment::find()->andWhere([
          'post_id' => \Yii::$app->request->get('postId')
        ])
      ]);
    }

}
