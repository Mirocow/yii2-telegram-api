<?php

namespace mirocow\telegram;

use Zelenin\Telegram\Bot\Api;
use Zelenin\Telegram\Bot\Client as TelegramClient;

class Client
{

    public function sendMessage($chatId, $message)
    {
        $telegram = \Yii::$app->getModule('telegram');

        $client = new Api($telegram->token);

        try {
            return $client->sendMessage([
                'chat_id' => $chatId,
                'text' => $message
            ]);
        } catch (\Zelenin\Telegram\Bot\NotOkException $e) {
            echo $e->getMessage();
        }

    }
}