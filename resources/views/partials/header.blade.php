<header>
    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false, userMenuOpen: false }" class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="/">
                            <h2 class="font-bold text-2xl">Barta</h2>
                        </a>
                    </div>
                    <!--              <div class="hidden sm:ml-6 sm:flex sm:space-x-8">-->
                    <!--                &lt;!&ndash; Current: "border-gray-800 text-gray-900 font-semibold", Default: "border-transparent text-gray-600 hover:border-gray-300 hover:text-gray-800" &ndash;&gt;-->
                    <!--                <a-->
                    <!--                  href="#"-->
                    <!--                  class="inline-flex items-center border-b-2 border-gray-800 px-1 pt-1 text-sm font-semibold text-gray-900"-->
                    <!--                  >Discover</a-->
                    <!--                >-->
                    <!--                <a-->
                    <!--                  href="#"-->
                    <!--                  class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800"-->
                    <!--                  >For you</a-->
                    <!--                >-->
                    <!--                <a-->
                    <!--                  href="#"-->
                    <!--                  class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-600 hover:border-gray-300 hover:text-gray-800"-->
                    <!--                  >People</a-->
                    <!--                >-->
                    <!--              </div>-->
                </div>
                <!-- Search input -->
                <form action="" method="POST" class="flex items-center">
                    <x-auto-complete />
                </form>
                <div class="hidden sm:ml-6 sm:flex gap-2 sm:items-center">
                    <!-- This Button Should Be Hidden on Mobile Devices -->
                    <!--              <button-->
                    <!--                type="button"-->
                    <!--                class="text-gray-900 hover:text-white border-2 border-gray-800 hover:bg-gray-900 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hidden md:block">-->
                    <!--                Create Post-->
                    <!--              </button>-->

                    <!--              <button-->
                    <!--                type="button"-->
                    <!--                class="rounded-full bg-white p-2 text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">-->
                    <!--                <span class="sr-only">View notifications</span>-->
                    <!--                &lt;!&ndash; Heroicon name: outline/bell &ndash;&gt;-->
                    <!--                <svg-->
                    <!--                  class="h-6 w-6"-->
                    <!--                  xmlns="http://www.w3.org/2000/svg"-->
                    <!--                  fill="none"-->
                    <!--                  viewBox="0 0 24 24"-->
                    <!--                  stroke-width="1.5"-->
                    <!--                  stroke="currentColor"-->
                    <!--                  aria-hidden="true">-->
                    <!--                  <path-->
                    <!--                    stroke-linecap="round"-->
                    <!--                    stroke-linejoin="round"-->
                    <!--                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />-->
                    <!--                </svg>-->
                    <!--              </button>-->

                    <!--              <button-->
                    <!--                type="button"-->
                    <!--                class="rounded-full bg-white p-2 text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">-->
                    <!--                <span class="sr-only">Messages</span>-->
                    <!--                <svg-->
                    <!--                  xmlns="http://www.w3.org/2000/svg"-->
                    <!--                  fill="none"-->
                    <!--                  viewBox="0 0 24 24"-->
                    <!--                  stroke-width="1.5"-->
                    <!--                  stroke="currentColor"-->
                    <!--                  class="w-6 h-6">-->
                    <!--                  <path-->
                    <!--                    stroke-linecap="round"-->
                    <!--                    stroke-linejoin="round"-->
                    <!--                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />-->
                    <!--                </svg>-->
                    <!--              </button>-->

                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <div>
                            @auth()
                                @include('partials.profileButton.desktop')
                            @endauth
                            @guest
                                @include('partials.loginButton')
                            @endguest
                        </div>

                        <!-- Dropdown menu -->
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            @include('partials.user-menus')
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    @auth()
                        @include('partials.profileButton.mobile')
                    @endauth
                    @guest
                        @include('partials.loginButton')
                    @endguest
                </div>
            </div>
        </div>

        @auth
            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="mobileMenuOpen" class="sm:hidden" id="mobile-menu">
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <div class="flex items-center px-4">
                        <div>
                            <div class="text-base font-medium text-gray-800">
                                {{ auth()->user()->name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        @include('partials.user-menus')
                    </div>
                </div>
            </div>
        @endauth
    </nav>
</header>
