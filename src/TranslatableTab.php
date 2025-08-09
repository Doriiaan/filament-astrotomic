<?php

declare(strict_types=1);

namespace Doriiaan\FilamentAstrotomic;

use Closure;
use Filament\Schemas\Components\Tabs\Tab;

class TranslatableTab
{
    /**
     * Callback to generate the name of the tab.
     */
    protected ?Closure $nameGenerator = null;

    public function __construct(
        protected Tab $tab,
        protected string $locale,
        protected string $mainLocale,
    ) {}

    /**
     * Get current tab component
     */
    public function getTab(): Tab
    {
        return $this->tab;
    }

    /**
     * Check if the current locale is the main locale
     */
    public function isMainLocale(): bool
    {
        return $this->locale === $this->mainLocale;
    }

    /**
     * Get the current locale for tab
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * Get the main locale
     */
    public function getMainLocale(): string
    {
        return $this->mainLocale;
    }

    /**
     * Generate the name of the tab.
     *
     * Uses for state path (input name) in schema
     */
    public function makeName(string $name): string
    {
        if ($this->nameGenerator instanceof Closure) {
            return ($this->nameGenerator)($name, $this->locale);
        }

        return "{$this->locale}.{$name}";
    }

    /**
     * Define the custom callback to generate the name of the tab.
     *
     * @param  Closure(string $name, string $locale):string|null  $callback
     */
    public function makeNameUsing(?Closure $callback = null): void
    {
        $this->nameGenerator = $callback;
    }
}
