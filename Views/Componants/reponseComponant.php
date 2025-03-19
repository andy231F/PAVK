<div class="infouser mt-8 flex items-end gap-5 p-4">
    <img alt='photo de lutilisateur'
        src="../<?= ($replies['picture']) ? $replies['picture'] : 'Assets/img/profiles/img_1.jpg' ?>"
        class="rounded-full w-8 h-8 object-cover bg-gray-300 border-1">
    <span class="text-black dark:text-white font-semibold"><?php echo $replies['display_name'] ?></span>
    <a href=<?php echo "/user?user=" . $replies['username'] ?>
        class="text-zinc-400  font-medium hover:text-red-600 "><?php echo "@" . $replies['username'] ?></a>
</div>
<div class="replies pl-4">
    <p class="Comment_content text-sm m-4 text-black dark:text-white"><?php echo $replies['content'] ?></p>
</div>