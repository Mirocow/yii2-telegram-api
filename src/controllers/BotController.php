<?php

namespace mirocow\telegram\controllers;

use mirocow\telegram\commands\UnknownCommand;
use mirocow\telegram\commands\DefaultMessage;
use \Zelenin\Telegram\Bot\Api;
use \Zelenin\Telegram\Bot\Daemon\Daemon;
use \Zelenin\Telegram\Bot\Type\Update;
use yii\console\Controller;
use Yii;

class BotController extends Controller
{

	public function options($actionID)
	{
        	return $this->module->options;
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
                        $command = 'mirocow\telegram\commands\\' . ucfirst($command) . 'Command';
                    }

                    if(class_exists($command)){
                        $message = (new $command)->run($update);
                    } else {
                        if(class_exists($this->module->unknownCommand)) {
                            $message = (new $this->module->unknownCommand)->run($update);
                        } else {
                            $message = (new UnknownCommand)->run($update);
                        }
                    }

                } else {
                        if(class_exists($this->module->defaultMessage)) {
                            $message = (new $this->module->defaultMessage)->run($update);
                        } else {
                            $message = (new DefaultMessage)->run($update);
                        }
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
