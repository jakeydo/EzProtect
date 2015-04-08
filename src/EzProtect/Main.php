<?php

namespace EzProtect;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\network\protocol\ChatPacket;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;


class Main extends PluginBase implements Listener{

        public function onLoad(){
                $this->getLogger()->info("onLoad() has been called in EzProtect!");
        }

        public function onEnable(){
                $this->getLogger()->info("onEnable() has been called in EzProtect!");
                $this->getServer()->getPluginManager()->registerEvents($this,$this);
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
                    $sender->sendMessage("Not a player called the EzProtect command.");
                  }

                return true;
                }
        }

        public function onBlockBreak(BlockBreakEvent $event){

          // foreach($this->getConfig()->get("levels") as $levels){
          //     if($levels === $event->getPlayer()->getLevel()->getName()){
          //         if($event->getPlayer()->hasPermission("globalshield.action.break")){
          //         }
          //         else{
          //             $event->setCancelled();
          //         }
          //     }
          // }

          $this->getLogger()->info("A BlockBreakEvent happened: ". $event->getEventName());
          $this->getLogger()->info("X: ".$event->getBlock()->getFloorX());
          $this->getLogger()->info("Y: ".$event->getBlock()->getFloorY());
          $this->getLogger()->info("Z: ".$event->getBlock()->getFloorZ());

          $player = $event->getPlayer();

          if(!(strtolower($player->getName()) === "jake")){
            $player->sendMessage("Only Jake can break this stuff");
            $event->setCancelled();
          }



          return true;
        }

    // return false;
}
