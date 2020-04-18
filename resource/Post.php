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
  return ['id', 'title', 'body'/*, 'comments'*/];
  }

  public function extraFields()
  {
    return ['comments', 'created_at', 'updated_at'];
  }

  /**
   * Gets query for Resource Comments.
   *
   * @return \yii\db\ActiveQuery
   */
  public function getComments()
  {
      return $this->hasMany(\app\resource\Comment::class, ['post_id' => 'id']);
  }


}
