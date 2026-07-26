<?php
namespace Samee\TraitsInterfaceAbstract;

class Play extends Event
{
    use HasMenu, HasAssignedSeats;
    public function __construct()
    {
        $this->items = [
            "Popcorn",
            "Chips"
        ];
        $this->seats = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
        ];
    }
    public function getPrice()
    {

    }
}