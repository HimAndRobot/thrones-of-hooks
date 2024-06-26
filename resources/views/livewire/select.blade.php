<div>
    <div class="w-100" x-data="select" >
        <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Assigned to</label>
        <div class="relative mt-2">
            <button @click="open = !open" x-on:select-open.window="open = true" x-on:select-close.window="open = false" type="button" class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                <span class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                    <span class="ml-3 block truncate" x-text="$wire?.options[selectOptionIndex]?.url ?? $wire.message"></span>
                </span>
            </button>
            <span class="select-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2 cursor-pointer">
                <svg x-on:click="copyToClipboard" class="h-5 w-5 text-gray-400 cursor-pointer"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
            </span>
            <ul  x-show="open" x-transition  class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                <template x-for="(option, index) in $wire?.options">
                    <li x-on:click="selectOption(index)" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900 cursor-pointer" id="listbox-option-0" role="option">
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-5 w-5 flex-shrink-0 rounded-full">
                            <span class="ml-3 block truncate font-normal" x-text="option.url"></span>
                        </div>
                        <span x-show="index == selectOptionIndex" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                          </svg>
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>

@script
<script>
    Alpine.data('select', () => {
        return {
            open: false,
            selectOptionIndex: null,
            copyToClipboard() {
                navigator.clipboard.writeText(this.$wire?.options[this.selectOptionIndex]?.url ?? '')
                $wire.alert('success', 'Copy to clipboard')
            },
            selectOption(id) {
                this.selectOptionIndex = id
                this.open = false
                this.$wire.set('selected', this.$wire?.options[id])
            }
        }
    })
</script>
@endscript
