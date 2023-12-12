<article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
    <!-- Barta Card Top -->
    <header>
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <!-- User Avatar -->
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $post->author->getFirstMediaUrl('avatar') }}"
                        alt="Tony Stark" />
                </div>
                <!-- /User Avatar -->

                <!-- User Info -->
                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                    <a href="{{ route('profile', ['username' => '@' . $post->author->username]) }}"
                        class="hover:underline font-semibold line-clamp-1">
                        {{ $post->author->name }}
                    </a>

                    <a href="{{ route('profile', ['username' => '@' . $post->author->username]) }}"
                        class="hover:underline text-sm text-gray-500 line-clamp-1">
                        {{ "@{$post->author->username}" }}
                    </a>
                </div>
                <!-- /User Info -->
            </div>

            <!-- Card Action Dropdown -->
            @auth()
                @if (auth()->user()->username == $post->author->username && !$editable)
                    <div class="flex flex-shrink-0 self-center" x-data="{ open: false, isModal: false }">
                        <div class="relative inline-block text-left">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                                    id="menu-0-button">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Dropdown menu -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('post.edit', ['uuid' => $post->uuid]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Edit</a>

                                <form action='{{ route('post.remove', ['uuid' => $post->uuid]) }}' method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem" tabindex="-1" id="user-menu-item-1">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
            <!-- /Card Action Dropdown -->
        </div>
    </header>

    @if ($editable)
        <form action="{{ route('post.update', ['uuid' => $post->uuid]) }}" method="POST">
            @method('PATCH')
            @csrf
            <!-- Content -->
            <div class="py-4 text-gray-700 font-normal">
                <textarea name="content" class="w-full border">{{ $post->content }}</textarea>
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center gap-2 justify-end">
                <a href="{{ route('post.details', ['uuid' => $post->uuid]) }}"
                    class="px-5 py-1 rounded text-black text-xs border">Cancel</a>
                <button class="px-5 py-1 bg-black rounded text-white text-xs">Save</button>
            </div>
        </form>
    @else
        <a @if ($clickable) href="{{ route('post.details', ['uuid' => $post->uuid]) }}" @endif>
            <div class="py-4 text-gray-700 font-normal">
                @if ($post->hasMedia('posts'))
                    <img src="{{ $post->getFirstMediaUrl('posts') }}"
                        class="min-h-auto w-full rounded-lg object-cover max-h-64 md:max-h-72" alt="" />
                @endif
                <p>
                    {{ $post->content }}
                </p>
            </div>
        </a>
    @endif
    <!-- Date Created & View Stat -->
    <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
        <span class="">{{ formatTime($post->created_at) }}</span>
        <span class="">•</span>
        <span>{{ $post->views }} views</span>
    </div>

    <!-- Barta Card Bottom -->
    <footer class="border-t border-gray-200 pt-2">
        <!-- Card Bottom Action Buttons -->
        {{ $postFooter }}
        <!-- /Card Bottom Action Buttons -->
    </footer>
    <!-- /Barta Card Bottom -->
</article>
