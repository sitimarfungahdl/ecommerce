<?php

namespace App\Forms\Components;

use App\Forms\Components\Concerns\DisableOptionWhenSelectedInSiblingRepeaterItems;
use Filament\Forms\Components\Select;

class SelectWithDisableSiblingRepeater extends Select
{
    use DisableOptionWhenSelectedInSiblingRepeaterItems;

    protected function setUp(): void
    {
        parent::setUp();

        if (!$this->isShouldDisableOptionWhenSelectedInSiblingRepeaterItems()) {
            return;
        }

        // Inject Alpine.js logic langsung ke element
        $this->extraAttributes([
            'x-data' => sprintf('{
                fieldName: "%s",
                init() {
                    this.$watch("$el.value", () => this.disableOptions());
                    setTimeout(() => this.disableOptions(), 100);
                },
                disableOptions() {
                    const selectedValues = [];
                    document.querySelectorAll(`select[name*="${this.fieldName}"]`).forEach(select => {
                        if (select.value && select !== this.$el) {
                            selectedValues.push(select.value);
                        }
                    });

                    this.$el.querySelectorAll("option").forEach(option => {
                        if (selectedValues.includes(option.value) && option.value !== this.$el.value) {
                            option.disabled = true;
                            option.style.color = "#999";
                        } else {
                            option.disabled = false;
                            option.style.color = "";
                        }
                    });
                }
            }', $this->getName()),
            '@change' => 'disableOptions()',
        ]);
    }
}
