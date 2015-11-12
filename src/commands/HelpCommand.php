<?php

namespace mirocow\telegram\commands;

use mirocow\telegram\interfaces\CommandInterface;

class HelpCommand implements CommandInterface {

    public function run(\Zelenin\Telegram\Bot\Type\Update $update){

        return <<<HELP

        Help coomand

HELP;

    }

}