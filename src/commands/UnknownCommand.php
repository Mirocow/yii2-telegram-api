<?php

namespace mirocow\telegram\commands;

use mirocow\telegram\interfaces\CommandInterface;

class UnknownCommand implements CommandInterface {

    public function run(\Zelenin\Telegram\Bot\Type\Update $update){

        return <<<HELP

        Unknown coomand

HELP;

    }

}