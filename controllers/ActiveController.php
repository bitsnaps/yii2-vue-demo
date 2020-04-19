<?php

namespace app\controllers;

use Yii;
use yii\filters\auth\HttpBearerAuth;
// use yii\filters\auth\HttpBasicAuth;
// use yii\filters\auth\CompositeAuth;
use yii\web\ForbiddenHttpException;

/**
 * Custom ActiveController
 */
class ActiveController extends \yii\rest\ActiveController
{

  /**
  * Override behaviors() to customize the authentication
  */
  public function behaviors(){
    $behaviors = parent::behaviors();

    // you could use one of these authenticators
    // $behaviors['authenticator'] = [
    //   'class' => HttpBasicAuth::className(),
    // ];

    // $behaviors['authenticator'] = [
    //   'class' => HttpBearerAuth::class
    // ];

    // you could also use CompositeAuthenticator
    $behaviors['authenticator']['only'] = ['create','update', 'delete']; //actions
    $behaviors['authenticator']['authMethods'] = [
      HttpBearerAuth::class
    ];

    $behaviors['rateLimiter']['enableRateLimitHeaders'] = false;

    return $behaviors;
  }

  /**
  *
  * Override default checkAccess() to prevent users deleting other's posts.
  *
  * @param string $action
  * @param Post|Comment $model
  * @throws ForbiddenHttpException
  * @param array $params
  */
  public function checkAccess($action, $model = null, $params = [])
  {
    if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id){
      throw new ForbiddenHttpException('You do not have permission to delete or update this record.');

    }
  }

}
