<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace mirocow\commands;

use \Zelenin\Telegram\Bot\Api;
use \Zelenin\Telegram\Bot\Daemon\Daemon;
use \Zelenin\Telegram\Bot\Type\Update;
use yii\console\Controller;

class BotController extends Controller
{
	public function actionIndex()
	{

        $client = new Api($token);

        $daemon = new Daemon($client);

        $daemon
            ->onUpdate(function (Update $update) {
                print_r($update);
            });

        $daemon->run();

	}
}