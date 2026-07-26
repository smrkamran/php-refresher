<?php
namespace Samee\TraitsInterfaceAbstract;
trait HasMenu {

public array $items;
    public function getMenu() {
        return $this->items;
    }
}