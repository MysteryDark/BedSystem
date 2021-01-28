<?php

/**
 * 
 * 
 * 
 * $$\      $$\                       $$\                                   $$$$$$$\                      $$\       
 * $$$\    $$$ |                      $$ |                                  $$  __$$\                     $$ |      
 * $$$$\  $$$$ |$$\   $$\  $$$$$$$\ $$$$$$\    $$$$$$\   $$$$$$\  $$\   $$\ $$ |  $$ | $$$$$$\   $$$$$$\  $$ |  $$\ 
 * $$\$$\$$ $$ |$$ |  $$ |$$  _____|\_$$  _|  $$  __$$\ $$  __$$\ $$ |  $$ |$$ |  $$ | \____$$\ $$  __$$\ $$ | $$  |
 * $$ \$$$  $$ |$$ |  $$ |\$$$$$$\    $$ |    $$$$$$$$ |$$ |  \__|$$ |  $$ |$$ |  $$ | $$$$$$$ |$$ |  \__|$$$$$$  / 
 * $$ |\$  /$$ |$$ |  $$ | \____$$\   $$ |$$\ $$   ____|$$ |      $$ |  $$ |$$ |  $$ |$$  __$$ |$$ |      $$  _$$<  
 * $$ | \_/ $$ |\$$$$$$$ |$$$$$$$  |  \$$$$  |\$$$$$$$\ $$ |      \$$$$$$$ |$$$$$$$  |\$$$$$$$ |$$ |      $$ | \$$\ 
 * \__|     \__| \____$$ |\_______/    \____/  \_______|\__|       \____$$ |\_______/  \_______|\__|      \__|  \__|
 *              $$\   $$ |                                        $$\   $$ |                                        
 *              \$$$$$$  |                                        \$$$$$$  |                                        
 *               \______/                                          \______/                                         
 * 
 * 
 *  Description: TR [
 *   Eklentinin amacı yatağa yatınca tek kişi sabah yapma ve random yazı yazma eklentisidir.
 *  ];
 *  
 *  Description: EN [
 *   The purpose of the plugin is to make the morning and write randomly when you go to bed.
 *  ];
 * 
 * 
 */



namespace MysteryDark;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\event\player\PlayerBedLeaveEvent;

use pocketmine\utils\TextFormat as Color;
use pocketmine\math\Vector3;


class Main extends PluginBase implements Listener
{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this , $this);
        $this->getLogger()->info("§c
         __  __         _                ___           _   
        |  \/  |_  _ __| |_ ___ _ _ _  _|   \ __ _ _ _| |__
        | |\/| | || (_-<  _/ -_) '_| || | |) / _` | '_| / /
        |_|  |_|\_, /__/\__\___|_|  \_, |___/\__,_|_| |_\_\
                |__/                |__/                   
                ");
    }


    public function BedEnter(PlayerBedEnterEvent $event){
        $p = $event->getPlayer();
        //(0,4) 4 sayısını kaç adet case varsa toplamını yazıcaksınız.
        $rand = mt_rand(0,4);
        switch ($rand) {
            case 0:
                $p->sendMessage("§3"."Uyku ölümün kardeşidir.");
            break;
            case 1:
                $p->sendMessage("§3"."Ölüm ebedi bir uyku değildir. Ölüm ölümsüzlüğün başlangıcıdır.");
            break;
            case 2:
                $p->sendMessage("§3"."Bir insanın yükü ne kadar ağır olursa olsun onu ancak yatma zamanına kadar taşıyabilir.");
            break;
            case 3:
                $p->sendMessage("§3"."Kimine nöbet kimine uyku nasip.");
            break;

            /*
            case 4:
                */
                // YAZI YAZILCAK ALTTAKİ TIRNAK İÇİNE
                $p->sendMessage("Kimine nöbet kimine uyku nasip.");
            /*
            break;
            */
        }

    }

    public function BedLeave(PlayerBedLeaveEvent $event){
        $p = $event->getPlayer();
        $p->getLevel()->setTime(0);
    }

}

?>
