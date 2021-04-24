<nav class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
    <div class="flex flex-col lg:flex-row items-center">
        <a href="/"><img class="w-32" src="/images/logo_transparent.png" alt="Game-on" srcset=""></a>
        <x-nav-link></x-nav-link>
    </div>

    <div class="flex space-x-4 items-center my-1 lg:my-0">
        <form action="">
            <div class="relative">
                <input placeholder="Search . . ." class="rounded-lg text-gray-900 text-sm p-2" type="text" name="search" id="searchField">
                <button type="submit" class="absolute right-1.5 top-1.5">
                    <svg class="w-6" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24">
                        <path class="text-gray-800" d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5z"/>
                    </svg>
                </button>
            </div>
        </form>

        <img src="/images/default-avatar.png" alt="avatar" class="avatar w-12 rounded-full">
    </div>
</nav>
