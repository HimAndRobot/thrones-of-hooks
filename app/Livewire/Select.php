<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Select extends Component
{
    #[Reactive]
    public $options;
    #[Modelable]
    public $selected;

    public $open = false;
    public $message;

    #[on('selectOpen')]
    public function selectOpen()
    {
        if (!$this->open) {
            $this->open = true;
        }
    }

    public function openAndClose()
    {
        $this->open = !$this->open;
    }

    public function selectOption($optionId)
    {
        $this->selected = $this->options[$optionId];
        $this->dispatch('input', $this->options[$optionId]);
        $this->open = false;

    }

    public function render()
    {
        return view('livewire.select');
    }
}
