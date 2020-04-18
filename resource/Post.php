<?php

namespace app\resource;

use Yii;

/**
 * This is the resource for model class "{{%post}}".
 *
 */
class Post extends \app\models\Post
{

  public function fields()
  {
    return ['id', 'title', 'body'];
  }

}
