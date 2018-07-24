<?php
/**
 * Copyright (C) 2018 Shabzz102
 *
 * Shabzz102's plugins are licensed under MIT license!
 * Made by Shabzz102 for the PocketMine-MP Community!
 *
 * @author Shabzz102
 * Twitter: https://twitter.com/Shabzz102
 * GitHub: https://github.com/Shabzz102
 */
declare(strict_types=1);

namespace Shabzz102\Restart;

use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

class RestartTask extends Task{

	/** @var int $seconds */
	private $seconds = 0;

	public function onRun(int $tick) : void{
		$this->seconds++;
		$time = intval(Restart::getInstance()->getConfig()->get("restart-time")) * 60;
		$restartTime = $time - $this->seconds;
		switch($restartTime){
			case 100:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 2 minutes");
				return;
			case 50:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 1 minute");
				return;
			case 25:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 30 seconds");
				return;
			case 10:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 10 seconds");
				return;
			case 5:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 5 seconds");
				return;
			case 4:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 4 seconds");
				return;
			case 3:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 3 seconds");
				return;
			case 2:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 2 seconds");
				return;
			case 1:
				Restart::getInstance()->getServer()->broadcastMessage(Restart::PREFIX . TextFormat::RED . "Server will restart in" . TextFormat::DARK_PURPLE . " 1 second");
				return;
			case 0:
				foreach(Restart::getInstance()->getServer()->getOnlinePlayers() as $player) $player->kick(strval(Restart::getInstance()->getConfig()->get("restart-message")));
				Restart::getInstance()->getServer()->shutdown();
				return;
		}
	}
}