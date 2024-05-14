<div class="min-w-full mx-auto fixed bottom-0 z-40">
    <div class="container max-w-3xl bg-gray-800 mx-auto pb-2">
        <div class="flex justify-around">
            <a href="pages/calendar/" class="flex flex-col items-center justify-center py-3 px-3 text-white <?= NAVIGATION_PAGE == 'calendar' ? 'bg-gray-900' : '' ?>">
                <div class="rounded-full p-3 <?= NAVIGATION_PAGE == 'calendar' ? 'bg-gray-900' : 'bg-gray-800' ?>">
                    <span class="text-2xl">📰</span>
                </div>
                <span class="text-xs font-bold mt-1">Calendar</span>
            </a>
            <a href="/progetto-lavoro" class="flex flex-col items-center justify-center py-3 px-3 text-white <?= NAVIGATION_PAGE == 'home' ? 'bg-gray-900' : '' ?>">
                <div class="rounded-full p-3 <?= NAVIGATION_PAGE == 'home' ? 'bg-gray-900' : 'bg-gray-800' ?>">
                    <span class="text-2xl">🏠</span>
                </div>
                <span class="text-xs font-bold mt-1">Home</span>
            </a>
            <a href="/services/" class="flex flex-col items-center justify-center py-3 px-3 text-white <?= NAVIGATION_PAGE == 'services' ? 'bg-gray-900' : '' ?>">
                <div class="rounded-full p-3 <?= NAVIGATION_PAGE == 'settings' ? 'bg-gray-900' : 'bg-gray-800' ?>">
                    <span class="text-2xl">🛠️</span>
                </div>
                <span class="text-xs font-bold mt-1">Settings</span>
            </a>
        </div>
    </div>
</div>