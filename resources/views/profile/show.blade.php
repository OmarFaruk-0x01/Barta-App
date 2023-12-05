<x-app-layout>


<main class="container max-w-2xl mx-auto space-y-8 mt-8 px-2 min-h-screen">
    <!-- Cover Container -->
    @include('profile.partials.cover')
    <!-- /Cover Container -->

    <!-- Barta Create Post Card -->
    @if($isOwnProfile)
        @include('profile.partials.post-form')
    @endif
    <!-- /Barta Create Post Card -->

    <!-- User Specific Posts Feed -->
    <!-- Barta Card -->
    @include('partials.post-listings')
    <!-- /Barta Card -->
    <!-- User Specific Posts Feed -->
</main>

</x-app-layout>
