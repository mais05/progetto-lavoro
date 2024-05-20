<div class="container max-w-3xl mx-auto pt-6 pb-4 px-6 top-0 z-50 bg-gray-800">
    <?php if (USER_IS_LOGGED): ?>
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold py-0 my-0 text-white"><?= htmlspecialchars(PAGE_TITLE); ?></h2>
            <div class="dropdown dropdown-end">
                <div class="w-8 cursor-pointer" tabindex="0">
                    <img src="" alt="<?= htmlspecialchars(USER['first_name']); ?>" class="rounded-full" />
                </div>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-gray-100 rounded-lg w-52 absolute">
                    <li>
                        <a href="/settings/" class="flex items-center">
                            <span class="material-symbols-rounded mr-2">settings</span>
                            Impostazioni
                        </a>
                    </li>
                    <li>
                        <a href="/logout/" class="flex items-center">
                            <span class="material-symbols-rounded mr-2">logout</span>
                            Esci
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <div class="flex justify-end">
            <a href="pages/login/" class="bg-transparent my-auto text-xl">
                Accedi
            </a>
        </div>
    <?php endif; ?>
</div>

