<?php
namespace Samee\TraitsInterfaceAbstract;
class Movie extends Event
{
    use HasAssignedSeats;
    public function __construct()
    {

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