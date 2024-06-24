<div>
   <h1>{{ $message }}</h1>
    <input wire:model.live="message" type="text">
    <button wire:click="dispatchteste">Enviar</button>

    @script
    <script>
        $wire.on('public,SocketTeste', () => {
            alert('Post criado com sucesso');
        });
    </script>
    @endscript
</div>
