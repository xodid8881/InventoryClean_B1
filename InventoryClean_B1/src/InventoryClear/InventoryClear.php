<?php

namespace InventoryClear;

// 플러그인
use pocketmine\plugin\PluginBase;
// 이벤트
use pocketmine\event\Listener;
// 커맨드
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class InventoryClear extends PluginBase implements Listener {
	public function onEnable() {
		$this->getServer ()->getPluginManager ()->registerEvents ( $this, $this );
	}
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
		$command = $command->getName ();
		$name = $sender->getName ();
		$tag = "§e§l[ §f인벤토리 §e]§f";
		if ($command == "인벤토리") {
			if (! isset ( $args [0] )) {
				$sender->sendMessage ( $tag . " /인벤토리 청소 ( 인벤을 청소 합니다. )" );
				return true;
			}
			switch ($args [0]) {
				case "청소" :
					$sender->getInventory ()->clearAll();
					$sender->sendMessage ( $tag . " 인벤토리를 청소하였습니다." );
					break;
			}
			return true;
		}
	}
}
