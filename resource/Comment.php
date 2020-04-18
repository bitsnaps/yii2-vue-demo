<?php

namespace app\resource;

use Yii;

/**
 * This is the resource for model class "{{%post}}".
 *
 */
class Comment extends \app\models\Comment
{

  public function fields()
  {
    return ['id', 'title', 'body'];
  }

  public function extraFields()
  {
    return ['created_at', 'updated_at'];
  }

}
