<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Select extends Component
{
    use LivewireAlert;
    #[Reactive]
    public $options;
    #[Modelable]
    public $selected;

    public $open = false;
    public $message;

    public function selectOption($optionId)
    {
        $this->selected = $this->options[$optionId];
        $this->dispatch('input', $this->options[$optionId]);
        $this->dispatch('select-close');

    }

    public function render()
    {
        return view('livewire.select');
    }
}
