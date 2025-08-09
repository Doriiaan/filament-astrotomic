<?php

namespace Doriiaan\FilamentAstrotomic\Resources\Pages;

use Doriiaan\FilamentAstrotomic\Resources\Concerns\HasLocales;
use Filament\Resources\Pages\ListRecords;

/**
 * @mixin ListRecords
 */
trait ListTranslatable
{
    use HasLocales;
}
