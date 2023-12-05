<x-app-layout>
    <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">
        <!-- Barta Create Post Card -->
        @include('profile.partials.post-form')

        <!-- /Barta Create Post Card -->

        <!-- Newsfeed -->
        <section id="newsfeed" class="space-y-6">
            @include('partials.post-listings')
            <!-- /Barta Card With Image -->
        </section>
        <!-- /Newsfeed -->
    </main>
</x-app-layout>
