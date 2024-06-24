<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Teste extends Component
{
    public $message = 'Hello World!';

    #[On('echo:public,SocketTeste')]
    public function handleSocketTeste($data){
        $this->message = $data['message'];
    }

    public function render()
    {
        return view('livewire.teste');
    }
}
