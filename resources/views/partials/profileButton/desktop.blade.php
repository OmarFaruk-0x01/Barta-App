 <button @click="open = !open" type="button"
     class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
     id="user-menu-button" aria-expanded="false" aria-haspopup="true">
     <span class="sr-only">Open user menu</span>
     <img class="h-8 w-8 rounded-full" src="{{ $authUser->getFirstMediaUrl('avatar') }}" alt="{{ $authUser->name }}" />
 </button>
