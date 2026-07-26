<?php
namespace Samee\TraitsInterfaceAbstract;
trait HasAssignedSeats {
    public array $seats = [];
    public function getSeats(): array {
        return $this->seats;
    }
}