<?php

namespace EzProtect;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\network\protocol\ChatPacket;
use pocketmine\Player;

class Main extends PluginBase{

        public function onLoad(){
                $this->getLogger()->info("onLoad() has been called in EzProtect!");
        }

        public function onEnable(){
                $this->getLogger()->info("onEnable() has been called in EzProtect!");
        }

        public function onDisable(){
                $this->getLogger()->info("onDisable() has been called in EzProtect!");
        }

        public function onCommand(CommandSender $sender, Command $command, $label, array $args){
                if(strtolower($command->getName()) === "ezprotect"){
                // Execute logic
                // $this->getLogger()->info("You called the EzProtect command! Good work!");

                if($sender instanceof Player){
                  $senderName = $sender->getName();
                  // $pk = new ChatPacket();
                  // $pk->message = "You called the EzProtect command! Good work, " . $senderName . "!";
                  // $sender->dataPacket($pk);
                  $sender->sendMessage("You called the EzProtect command!!! Good work, " . $senderName . "!");
                }
                else{
                  $this->getLogger()->info("Not a player called the EzProtect command.");
                }

                return true;
        }

    return false;
}
}
