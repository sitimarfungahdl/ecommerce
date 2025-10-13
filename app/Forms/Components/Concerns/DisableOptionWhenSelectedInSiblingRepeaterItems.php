<?php

namespace App\Forms\Components\Concerns;

trait DisableOptionWhenSelectedInSiblingRepeaterItems
{
    protected bool $shouldDisableOptionWhenSelectedInSiblingRepeaterItems = false;

    public function disableOptionWhenSelectedInSiblingRepeaterItems(bool $condition = true): static
    {
        $this->shouldDisableOptionWhenSelectedInSiblingRepeaterItems = $condition;

        return $this;
    }

    public function isShouldDisableOptionWhenSelectedInSiblingRepeaterItems(): bool
    {
        return $this->shouldDisableOptionWhenSelectedInSiblingRepeaterItems;
    }
}
