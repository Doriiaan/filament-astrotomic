<?php

declare(strict_types=1);

namespace Doriiaan\FilamentAstrotomic\Resources\Pages;

use Doriiaan\FilamentAstrotomic\Resources\Concerns\HasLocales;
use Filament\Resources\Pages\CreateRecord;

/**
 * @mixin CreateRecord
 */
trait CreateTranslatable
{
    use HasLocales;

    protected function fillForm(): void
    {
        $this->callHook('beforeFill');

        $this->form->fill();

        $this->callHook('afterFill');
    }
}
