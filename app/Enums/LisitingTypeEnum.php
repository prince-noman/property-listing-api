<?php

namespace App\Enums;

enum LisitingTypeEnum: string{
    case OPEN = 'Open Lisitng';
    case SELL = 'Sell Listing';
    case EXCLUSIVE = 'Exclusive Agency Listing';
    case NET = 'Net Listing';
}