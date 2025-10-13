<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class ToggleButton extends Field
{
    protected string $view = 'forms.components.toggle-button';

    protected array $options = [];
    protected array $colors = [];
    protected array $icons = [];
    protected bool $inline = false;

    public function options(array $options): static
    {
        $this->options = $options;
        return $this;
    }

    public function colors(array $colors): static
    {
        $this->colors = $colors;
        return $this;
    }

    public function icons(array $icons): static
    {
        $this->icons = $icons;
        return $this;
    }

    public function inline(bool $condition = true): static
    {
        $this->inline = $condition;
        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function getIcons(): array
    {
        return $this->icons;
    }

    public function isInline(): bool
    {
        return $this->inline;
    }

    public function getColor(string $value): string
    {
        return $this->colors[$value] ?? 'primary';
    }

    public function getIcon(string $value): ?string
    {
        return $this->icons[$value] ?? null;
    }
}
