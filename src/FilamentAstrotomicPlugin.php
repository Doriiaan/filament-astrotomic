<?php

namespace Doriiaan\FilamentAstrotomic;

use Astrotomic\Translatable\Locales;
use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Str;

class FilamentAstrotomicPlugin implements Plugin
{
    protected ?Closure $getLocaleLabelUsing = null;

    public function getId(): string
    {
        return 'filament-astrotomic';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    /**
     * Package specific functions
     */
    public function allLocales(): array
    {
        return app(Locales::class)->all();
    }

    public function getMainLocale(): string
    {
        return app(Locales::class)->current();
    }

    public function getLocaleLabelUsing(?Closure $callback): static
    {
        $this->getLocaleLabelUsing = $callback;

        return $this;
    }

    public function getLocaleLabel(string $locale, ?string $displayLocale = null): ?string
    {
        $displayLocale ??= app()->getLocale();

        $label = null;

        if ($callback = $this->getLocaleLabelUsing) {
            $label = $callback($locale, $displayLocale);
        }

        return $label ?? Str::ucfirst(locale_get_display_name($locale, $displayLocale) ?: '');
    }
}
