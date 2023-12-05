<a href="{{ route('profile', ['username' => '@' . auth()->user()?->username]) }}"
    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
    id="user-menu-item-0">Your Profile</a>
<a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
    tabindex="-1" id="user-menu-item-1">Edit Profile</a>
<a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
    id="user-menu-item-2">Sign out</a>
