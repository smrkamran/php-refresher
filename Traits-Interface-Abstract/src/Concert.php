<?php
namespace Samee\TraitsInterfaceAbstract;
class Concert extends Event
{
    use HasMenu;
    public function __construct()
    {
        $this->items = [
            "Beer",
            "Ale"
        ];
    }

    public function getPrice()
    {

    }
}