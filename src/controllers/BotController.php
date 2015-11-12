<?php

namespace mirocow\telegram\controllers;

use \Zelenin\Telegram\Bot\Api;
use \Zelenin\Telegram\Bot\Daemon\Daemon;
use \Zelenin\Telegram\Bot\Type\Update;
use yii\console\Controller;
use Yii;

class BotController extends Controller
{
    public function options($actionID)
    {
        return ['sales-center'];
    }

	public function actionIndex()
	{

        $client = new Api($this->module->token);

        $daemon = new Daemon($client);

        $daemon
            ->onUpdate(function (Update $update) use ($client) {

                if(isset($update->message->text) && substr($update->message->text, 0,1) == '/' && $command = str_replace('/','', $update->message->text)) {

                    if(isset($this->module->commands[$command])) {
                        $command = $this->module->commands[$command];
                    } else {
                        $command = 'mirocow\\telegram\\commands\\' . ucfirst($command) . 'Command';
                    }

                    if(class_exists($command)){
                        $message = (new $command)->run($update);
                    } else {
                        $message = Yii::t('app', 'Uncknow command');
                    }

                } else {

                    $message = '';

                }

                if($message) {
                    $response = $client->sendMessage([
                        'chat_id' => $update->message->chat->id,
                        'text' => $message
                    ]);
                }

            });

        $daemon->run();

	}
}