<?php

namespace Makhnanov\Telegram81\Api\Enumeration;

enum ChatType
{
    case private;
    case group;
    case supergroup;
    case channel;
}
