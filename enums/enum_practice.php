<?php

enum Status: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';
}

enum Priority: int {
    case Low = 1;
    case High = 2;
    case Inactive = 3;
}

$userStatus = Status::Inactive;


function setActive(Status &$status)
{

    $status = Status::Pending;
    echo "Status is: " . $status->name;

    $temp = Status::from("inactive");
    echo $temp->name;
}

setActive("inactive");