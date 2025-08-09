<?php

namespace Doriiaan\FilamentAstrotomic\Resources\Concerns;

use Filament\Resources\Resource;

/**
 * @mixin Resource
 */
trait ResourceTranslatable
{
    use HasLocales;
}
