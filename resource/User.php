<?php

namespace app\resource;

use Yii;

/**
 * This is the resource for model class "{{%post}}".
 *
 */
class User extends \app\models\User
{

  public function fields()
  {
  return ['id', 'username' /*, 'email'*/];
  }

  /**
   * Gets query for [[Posts]].
   *
   * @return \yii\db\ActiveQuery
   */
  public function getPosts()
  {
      return $this->hasMany(\app\resource\Post::class, ['created_by' => 'id']);
  }


}
