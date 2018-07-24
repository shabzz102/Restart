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

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Restart extends PluginBase{

	public const VERSION = "v1.0.0";
	public const PREFIX = TextFormat::WHITE . "Elixir§dPvP" . TextFormat::GOLD . " > ";

	/** @var self $instance */
	private static $instance;

	public function onEnable() : void{
		self::$instance = $this;
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getScheduler()->scheduleRepeatingTask(new RestartTask(), 20);
		$this->getLogger()->info("Restart " . self::VERSION . " by Shabzz102 is enabled");
	}

	public static function getInstance() : self{
		return self::$instance;
	}
}