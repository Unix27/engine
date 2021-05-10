<?php

namespace App\Plugins\currencyexchange;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Torann\Currency\Currency;

class Currencyexchange extends Currency
{

    public static function installed()
    {
        if (
            Schema::hasTable('currencies') &&
            Schema::hasColumn('currencies', 'exchange_rate') &&
            Schema::hasColumn('currencies', 'symbol') &&
            Schema::hasColumn('currencies', 'format')
        ) {
            return true;
        }

        return false;
    }
}
