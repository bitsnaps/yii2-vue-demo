<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Post;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionCreatePost()
    {
        $post = $this->createPost('Title 2');
        if ($post->save()){
          echo 'Post saved';
          return ExitCode::OK;
        }
        return ExitCode::UNSPECIFIED_ERROR;
    }

    public function actionCreatePosts()
    {
      for ($i=3; $i < 15; $i++) {
        if (!$this->createPost("Title $i")->save()){
          return ExitCode::UNSPECIFIED_ERROR;
        }
      }
      return ExitCode::OK;
    }

    private function createPost($title)
    {
      $post = new Post();
      $post->title = $title;
      $post->body = "body of $title";
      return $post;
    }

}
