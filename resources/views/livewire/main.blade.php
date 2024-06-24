<div class="w-full h-[100vh] bg-[#141517] flex justify-center items-center">
    <div class="w-11/12 h-5/6 max-w-[1800px]  rounded-lg flex">
        <div class="h-full w-4/12 bg-[#00000033] flex flex-col justify-left px-10 pt-10">
            <span class="text-white text-3xl flex justify-between items-center">
                <span>Bytehook</span>
                <span class="cursor-pointer" wire:click="newWebhook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></span>
            </span>
            <livewire:select :message="'Selecione um webhook'" :options="$options" wire:model.live="selectOption" />
            <ul class="mt-10">
                @foreach($selectOption['payloads'] ?? [] as $key => $payload)
                <li wire:click="changePayload({{$key}})" class="shadow-sm mt-2 shadow-zinc-300 relative cursor-pointer bg-white rounded-sm select-none py-2 px-3 text-gray-900 cursor-pointer flex justify-between" id="listbox-option-0" role="option">
                    <span class="block truncate font-bold text-amber-[#1b1919]">{{$payload['method']}}</span>
                    <span class="block truncate font-normal">{{ Carbon\Carbon::parse($payload['created_at'])->format('d/m H:i:s')}}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="w-full h-full bg-[#1b1919] px-20 pt-[40px] overflow-y-scroll scrollbar-thumb-rounded-md scrollbar scrollbar-thumb-[#00000033] ">
            @if($selectPayload)
                <span class="text-white text-3xl"><span class="text-bold">{{ $selectPayload['method'] }}</span> <span class="text-[#a39c9b]">/teste</span></span>
                <div class="w-full h-[40px] rounded-md bg-[#1d1d1d] mt-8 flex justify-center items-center">
                    <span class="text-[#a39c9b]">From IP <span class="text-white">{{ $selectPayload['ip'] }}</span> at <span class="text-white">{{ Carbon\Carbon::parse($selectPayload['created_at'])->format('d/m H:i:s')}}</span></span>
                </div>
                <div class="my-5">
                    <span class="text-white text-xl mt-[30px]">HEADERS</span>
                </div>
                <ul class="border-2 border-[#1d1d1d] border-b-0 rounded-2xln">
                    @foreach(json_decode($selectPayload['headers'] ?? [], true) as $label => $value)
                    <li class="p-4 border-b-2 border-b-[#1d1d1d] flex w-full justify-between">
                        <span class="text-white font-semibold pr-[400px] text-nowrap">{{ strtoupper($label)  }}</span>
                        <span class="text-[#a39c9b] break-all">{{ $value[0]  }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="my-5 flex justify-between items-center mt-[30px]">
                    <span class="text-white text-xl">BODY</span>
                    <button class="text-white cursor-pointer bg-[#212122] py-1 px-4 rounded-md flex items-center">
                        Copy
                        <svg class="ml-2" width="12" height="12" fill="none" xmlns="http://www.w3.org/2000/svg" size="10"><g clip-path="url(#prefix__clip0_342_4065)" stroke="white" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5.5h8v8h-8v-8z"></path><path d="M1.5 3.5h-1v8h8v-1"></path></g><defs><clipPath id="prefix__clip0_342_4065"><path fill="white" transform="matrix(-1 0 0 1 12 0)" d="M0 0h12v12H0z"></path></clipPath></defs></svg>
                    </button>
                </div>
                <pre class="w-full text-white rounded-md bg-[#1d1d1d] mt-8 p-5 mb-[200px]">{{json_encode(json_decode($selectPayload['payload']), JSON_PRETTY_PRINT)}}</pre>
            @endif
        </div>
    </div>
</div>

