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
    return ['post'];
  }

  /**
   * Gets query for Resource Post.
   *
   * @return \yii\db\ActiveQuery
   */
  public function getPost()
  {
      return $this->hasOne(\app\resource\Post::clas, ['id' => 'post_id']);
  }

}
