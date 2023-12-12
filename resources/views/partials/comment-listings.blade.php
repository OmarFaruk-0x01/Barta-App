<div class="flex flex-col space-y-6">
    <h1 class="text-lg font-semibold">Comments ({{ count($comments) }})</h1>

    @foreach ($comments as $comment)
        <article
            class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-2 sm:px-6 min-w-full divide-y">
            <div class="py-4">
                <header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="{{ $comment->user->getFirstMediaUrl('avatar') }}" alt="Al Nahian" />
                            </div>
                            <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                                <a href="{{ route('profile', ['username' => '@' . $comment->user->username]) }}"
                                    class="hover:underline font-semibold line-clamp-1">
                                    {{ $comment->user->name }}
                                </a>

                                <a href="{{ route('profile', ['username' => '@' . $comment->user->username]) }}"
                                    class="hover:underline text-sm text-gray-500 line-clamp-1">
                                    {{ '@' . $comment->user->username }}
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="py-4 text-gray-700 font-normal">
                    <p>{{ $comment->content }}</p>
                </div>
                <div class="flex items-center gap-2 text-gray-500 text-xs">
                    <span class="">{{ formatTime($comment->created_at) }}</span>
                </div>
            </div>
        </article>
    @endforeach
</div>
