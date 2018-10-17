# Telegram BOT client/sever

This extension helps to create a bot for Telegrams applications.
It is a complete solution to run background tasks allowing to accept, process and respond to the message from the Telegram.

``` php
'modules' => [
	'telegram' => [
		'class' => 'mirocow\telegram\Module',
		'token' => 'api-telegram-token',
		'commands' => [
			'help' => 'app\commands\HelpCommand',
		],
	],
],			
```

After install you can start bot with

```sh
nohup php ./yii telegram/bot/index
```

And after you can run /help in the chat of the Teleram client.
