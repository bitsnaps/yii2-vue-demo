<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200418_183345_create_user_table extends Migration
{

  public function init()
  {
      $this->db = 'db';
      parent::init();
  }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $tableOptions = 'ENGINE=InnoDB';

      $this->createTable(
          '{{%user}}',
          [
              'id'=> $this->primaryKey(11),
              'username'=> $this->string(50)->notNull(),
              'password'=> $this->string(250)->notNull(),
              'email'=> $this->string(255)->null()->defaultValue(null),
              'status'=> $this->integer(11)->notNull()->defaultValue(0),
              'auth_key'=> $this->string(250)->notNull(),
              'access_token'=> $this->string(250)->notNull(),
          ],$tableOptions
      );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
