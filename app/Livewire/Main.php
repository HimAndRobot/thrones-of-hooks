<?php

namespace App\Livewire;

use App\Events\SocketTeste;
use App\Models\Webhook;
use Dflydev\DotAccessData\Data;
use Livewire\Attributes\On;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Main extends Component
{
    use LivewireAlert;

    public $options;

    public $selectOption = null;
    public $selectPayload = null;

    public function changePayload($index)
    {
        $this->selectPayload = $this->selectOption['payloads'][$index];
    }

    public function newWebhook()
    {
        $characters = new \App\Dto\CharactersDto();
        $randomCharacter = $characters->getRandonWithoutRepetition([]);
        $alias = $randomCharacter . '-' . substr(md5(uniqid()), 0, 5);

        $webhook = new \App\Models\Webhook();
        $webhook->alias = $alias;
        $webhook->character = $randomCharacter;
        $webhook->user_session_id = session()->getId();
        $webhook->url = 'http://' . $alias . '.' . env('APP_URL');
        $webhook->save();

        $this->dispatch('selectOpen');
        $this->alert('success', 'Webhook created successfully!');
    }

    #[On('echo:public,SocketTeste')]
    public function refreshOptions($data)
    {
        if ($data['id'] == $this->selectOption['id']) {
            $index = array_search($this->selectOption, $this->options);
            $this->selectOption = Webhook::where('user_session_id', session()->getId())->with(['payloads'])->where('id', $data['id'])->orderBy('id', 'desc')->first()->toArray();
            $this->alert('success', 'New payload received!');
        }
    }

    public function render()
    {
        $this->options = Webhook::where('user_session_id', session()->getId())->with(['payloads'])->orderBy('id', 'desc')->get()->toArray();
        return view('livewire.main');
    }

}
