<?php

namespace BanQuery\Text;

use BanQuery\BanQuery;
use pocketmine\Player;

class Text{

    /** @var BanQuery */
    private $plugin;

    /**
     * @var string[]
     */
    private $codes = [
        "{user}",
        "&",
        "{line}",
        "{admin}"
    ];

    public function __construct(BanQuery $plugin){
        $this->plugin = $plugin;
    }

    /**
     * @param string $text
     * @param Player $admin
     * @param string|null $player
     * @return string
     */
    public function convertCodeInTheText(string $text, Player $admin, string $player = null): string{
        $config = $this->plugin->getConfigData();
        return str_replace($this->codes, [$player, "§", "\n", $admin->getName()], $config->get("Prefix")) . str_replace($this->codes, [$player, "§", "\n", $admin->getName()], $text);
    }
}
