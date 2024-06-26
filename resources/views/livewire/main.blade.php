<div x-data="main" class="w-full h-[100vh] bg-[#141517] flex justify-center items-center">
    <div class="w-11/12 h-5/6 max-w-[1800px]  rounded-lg flex">
        <div class="h-full w-3/12  bg-[#00000033] flex flex-col justify-left px-10 pt-10">
            <span class="text-white text-3xl flex justify-between items-center">
                <span>Thrones of Hooks</span>
                <span class="cursor-pointer" wire:click="newWebhook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></span>
            </span>
            <livewire:select :message="'Selecione um webhook'" :options="$options" wire:model.live="selectOption" />
            <ul class="mt-10">
                <template x-for="(payload, index) in $wire?.selectOption?.payloads">
                    <li x-on:click="selectedOption = payload"  class="shadow-sm mt-2 shadow-zinc-300 relative cursor-pointer bg-white rounded-sm select-none py-2 px-3 text-gray-900 cursor-pointer flex justify-between" id="listbox-option-0" role="option">
                        <span x-text="payload?.method" class="block truncate font-bold text-amber-[#1b1919]" ></span>
                        <span x-text="payload?.created_at" class="block truncate font-normal"></span>
                    </li>
                </template>
            </ul>
        </div>
        <div class="w-9/12 h-full bg-[#1b1919] ">
            <div x-show="selectedOption != null" x-transation  class="w-full h-full px-20 pt-[40px] overflow-y-scroll scrollbar-thumb-rounded-md scrollbar scrollbar-thumb-[#00000033]" >
                    <span class="text-white text-3xl"><span class="text-bold" x-text="selectedOption?.method"></span> <span class="text-[#a39c9b]" x-text="selectedOption?.path"></span></span>
                    <div class="w-full h-[40px] rounded-md bg-[#1d1d1d] mt-8 flex justify-center items-center">
                        <span class="text-[#a39c9b]">From IP <span class="text-white" x-text="selectedOption?.ip"></span> at <span class="text-white" x-text="selectedOption?.created_at"></span></span>
                    </div>
                    <div class="my-5">
                        <span class="text-white text-xl mt-[30px]">HEADERS</span>
                    </div>
                    <ul class="border-2 border-[#1d1d1d] border-b-0 rounded-2xln">
                        <template x-for="(payload, index) in JSON.parse(selectedOption?.headers ?? '{}')">
                            <li class="p-4 border-b-2 border-b-[#1d1d1d] flex w-full justify-between">
                                <span class="text-white font-semibold pr-[400px] text-nowrap" x-text="index"></span>
                                <span class="text-[#a39c9b] break-all" x-text="payload[0]"></span>
                            </li>
                        </template>
                    </ul>
                    <div class="my-5 flex justify-between items-center mt-[30px]">
                        <span class="text-white text-xl">BODY</span>
                        <button x-on:click="copyToClipboard" class="text-white cursor-pointer bg-[#212122] py-1 px-4 rounded-md flex items-center">
                            Copy
                            <svg class="ml-2" width="12" height="12" fill="none" xmlns="http://www.w3.org/2000/svg" size="10"><g clip-path="url(#prefix__clip0_342_4065)" stroke="white" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5.5h8v8h-8v-8z"></path><path d="M1.5 3.5h-1v8h8v-1"></path></g><defs><clipPath id="prefix__clip0_342_4065"><path fill="white" transform="matrix(-1 0 0 1 12 0)" d="M0 0h12v12H0z"></path></clipPath></defs></svg>
                        </button>
                    </div>
                    <pre class="w-full text-white rounded-md bg-[#1d1d1d] mt-8 p-5 mb-[200px]" x-html="syntaxHighlight(JSON.stringify(JSON.parse(selectedOption?.payload ?? '{}'), null, 2))"></pre>
            </div>
        </div>
    </div>
</div>
@script
<script>
    Alpine.data('main', () => {
        return {
            selectedOption: null,
            copyToClipboard() {
                navigator.clipboard.writeText(this.selectedOption?.payload ?? '')
                $wire.alert('success', 'Copy to clipboard')
            },
            syntaxHighlight(json) {
                if (typeof json != 'string') {
                    json = JSON.stringify(json, undefined, 2);
                }
                json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                    var cls = 'text-green-500';
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'text-blue-500';
                        } else {
                            cls = 'text-orange-500';
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'text-blue-500';
                    } else if (/null/.test(match)) {
                        cls = 'text-blue-500';
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                });
            }
        }
    })
</script>
@endscript



