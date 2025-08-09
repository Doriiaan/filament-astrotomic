<?php

declare(strict_types=1);

namespace Doriiaan\FilamentAstrotomic\Resources\Pages;

use Astrotomic\Translatable\Contracts\Translatable;
use Doriiaan\FilamentAstrotomic\Resources\Concerns\HasLocales;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin ViewRecord
 */
trait ViewTranslatable
{
    use HasLocales;

    protected function fillForm(): void
    {
        $this->callHook('beforeFill');

        /** @var Model|Translatable $record */
        $record = $this->getRecord();

        $recordAttributes = $record->attributesToArray();

        $recordAttributes = $this->mutateTranslatableData($record, $recordAttributes);

        $recordAttributes = $this->mutateFormDataBeforeFill($recordAttributes);

        $this->form->fill($recordAttributes);

        $this->callHook('afterFill');
    }
}
