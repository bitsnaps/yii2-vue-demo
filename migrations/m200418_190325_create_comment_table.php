<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m200418_190325_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
          'id' => $this->primaryKey(),
          'title' => $this->string(512)->notNull(),
          'body' => $this->text(),
          'post_id' => $this->integer(),
          'created_at' => $this->integer(),
          'updated_at' => $this->integer(),
          'created_by' => $this->integer(),
        ]);

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk_comment_user_created_by',
            '{{%comment}}',
            'created_by',
            '{{%user}}',
            'id'
            // ,'CASCADE'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk_comment_post_post_id',
            '{{%comment}}',
            'post_id',
            '{{%post}}',
            'id'
            // ,'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      // add foreign key for table `post`
      $this->dropForeignKey(
          'fk_comment_user_created_by',
          '{{%comment}}'
      );
      // add foreign key for table `user`
      $this->dropForeignKey(
          'fk_comment_post_post_id',
          '{{%comment}}'
      );

        $this->dropTable('{{%comment}}');
    }
}
