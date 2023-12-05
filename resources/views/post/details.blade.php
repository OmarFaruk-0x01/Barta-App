<x-app-layout>
    <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        <section id="newsfeed" class="space-y-6">
            <x-post-card :authorName="$post->author->name" :authorUsername="$post->author->username" :postUUID="$post->uuid" :postContent="$post->content" :postViews="$post->views"
                :postCreatedAt="$post->created_at">
                <x-slot name="postFooter">
                    <form action="{{ route('comment.create', ['uuid' => $post->uuid]) }}" method="POST">
                        @csrf
                        <!-- Create Comment Card Top -->
                        <div>
                            <div class="flex items-start /space-x-3/">
                                <!-- User Avatar -->
                                <!-- <div class="flex-shrink-0">-->
                                <!--              <img-->
                                <!--                class="h-10 w-10 rounded-full object-cover"-->
                                <!--                src="https://avatars.githubusercontent.com/u/831997"-->
                                <!--                alt="Ahmed Shamim" />-->
                                <!--            </div> -->
                                <!-- /User Avatar -->

                                <!-- Auto Resizing Comment Box -->
                                <div class="text-gray-700 font-normal w-full">
                                    <textarea x-data="{
                                        resize() {
                                            $el.style.height = '0px';
                                            $el.style.height = $el.scrollHeight + 'px'
                                        }
                                    }" x-init="resize()" @input="resize()" type="text" name="comment"
                                        placeholder="Write a comment..."
                                        class="flex w-full h-auto min-h-[40px] px-3 py-2 text-sm bg-gray-100 focus:bg-white border border-sm rounded-lg border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 text-gray-900"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Create Comment Card Bottom -->
                        <div>
                            <!-- Card Bottom Action Buttons -->
                            <div class="flex items-center justify-end">
                                <button type="submit"
                                    class="mt-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                                    Comment
                                </button>
                            </div>
                            <!-- /Card Bottom Action Buttons -->
                        </div>
                        <!-- /Create Comment Card Bottom -->
                    </form>
                </x-slot>
            </x-post-card>
            <hr />
            @include('partials.comment-listings')
        </section>
    </main>
</x-app-layout>
