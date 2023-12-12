<div x-data="{
    active: false,
    cursorIndex: -1,
    inputValue: '',
    suggestions: [
        { item: { title: 'Apple', directLink: true }, active: false },
        { item: { title: 'Banana', directLink: false }, active: false },
        { item: { title: 'Orange', directLink: true }, active: false },
        { item: { title: 'Mango', directLink: false }, active: false },
    ],
    moveDownList() {
        if (this.cursorIndex < this.suggestions.length - 1) {
            this.cursorIndex++;
        }
    },
    moveUpList() {
        if (this.cursorIndex > 0) {
            this.cursorIndex--;
        }
    },
    updateSuggestions(event) {
        // Simulate fetching suggestions based on input value (replace with your own logic)
        const inputValue = event.target.value;
        // Example of suggestions (replace with your own data)
        this.suggestions = [
            { item: { title: 'Suggestion 1', directLink: true }, active: false },
            { item: { title: 'Suggestion 2', directLink: false }, active: false },
            // Add more suggestions as needed
        ];
    },
}" class="relative flex flex-row">
    <div class="w-2/3" @click.away="active = false; cursorIndex = -1" @keydown.escape="active = false; cursorIndex = -1"
        @keydown.arrow-down="moveDownList()" @keydown.arrow-up="moveUpList()"
        @keydown.enter="console.log('directly linking to: ', inputValue )">
        <input type="text" class="bg-gray-100 rounded focus:bg-white border w-full p-3 text-xl" placeholder="Keywords"
            x-model="inputValue" @focus="active = true" @input.debounce.250="$dispatch('input-change', inputValue)" />
        <div class="relative" x-show="suggestions.length > 0 && active" x-cloak
            @input-change.window="active = true; cursorIndex = -1; updateSuggestions($event.detail)"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-y-90"
            x-transition:enter-end="opacity-100 transform scale-y-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 transform scale-y-100"
            x-transition:leave-end="opacity-0 transform scale-y-90">
            <div class="absolute top-100 mt-1 w-full border bg-white shadow-xl rounded">
                <div class="p-3">
                    <div class="divide-y" x-ref="list">
                        <template x-for="(suggestion, index) in suggestions" :key="index">
                            <a :href="suggestion.item?.directLink ? '#/somesite/' + suggestion.item.title : '#/search/' +
                                suggestion.item.title"
                                :class="{
                                    'p-2 flex block w-full rounded hover:bg-gray-100': true,
                                    'bg-blue-500 hover:bg-blue-600--replace-with-icon-class!': suggestion
                                        .active
                                }">
                                <span x-text="suggestion.item.title"></span>
                                <svg x-show="suggestion.item.directLink" xmlns="http://www.w3.org/2000/svg"
                                    class="ml-2 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                    <path
                                        d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                </svg>
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
