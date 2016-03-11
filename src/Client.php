<?php

namespace mirocow\telegram;

use Zelenin\Telegram\Bot\Api;
use Zelenin\Telegram\Bot\Client as TelegramClient;

class Client
{

    public function sendMessage($token, $chatId, $message)
    {
        $client = new Api($token);

        try {
            return $client->sendMessage([
                'chat_id' => $chatId,
                'text' => $message
            ]);
        } catch (\Zelenin\Telegram\Bot\Exception\NotOkException $e) {

            return $e->getMessage();

        }

    }
}