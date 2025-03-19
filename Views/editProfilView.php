<?php

$labelClasses = "text-black font-medium";
$inputClasses = "w-full mb-2 px-4 py-2 border rounded-lg focus:ring-2  focus:bg-red-600 focus:outline";
$centerPosition = "absolute top-[50%] left-[50%] !-translate-[50%]";
$photoIcon = '<svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="#5f6368">
        <path d="M440-440ZM120-120q-33 0-56.5-23.5T40-200v-480q0-33 23.5-56.5T120-760h126l74-80h240v80H355l-73 80H120v480h640v-360h80v360q0 33-23.5 56.5T760-120H120Zm640-560v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80ZM440-260q75 0 127.5-52.5T620-440q0-75-52.5-127.5T440-620q-75 0-127.5 52.5T260-440q0 75 52.5 127.5T440-260Zm0-80q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29Z"/>
    </svg>';

function min18()
{
    $min18 = date_create(date("Y-m-d"));
    date_sub($min18, date_interval_create_from_date_string("18 years"));
    return date_format($min18, "Y-m-d");
}


?>

<div class="absolute top-0 sm:top-[50%] sm:left-[50%] sm:!-translate-[50%] bg-slate-100 dark:bg-black text-black dark:text-white sm: border-2 sm:rounded-2xl sm:w-fit max-w-full h-full sm:h-[600px] sm:px-10 px-2 py-6 overflow-y-scroll">
    
    <div class="flex items-center justify-between px-4 py-6 sticky -top-6 z-99 bg-slate-100 dark:bg-black shadow-md">
        <h3 class="leading-none">Edit profile</h3>
        <button class="close">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#EA3323">
                <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
        </button>
    </div>
    <form class="w-[600px] px-4 max-w-full" method="POST" action="/profil" enctype="multipart/form-data">

        <div class="banner relative max-w-full">

            <div id="header_display"
                class="relative mb-[100px] bg-[url(../Assets/img/cover-placeholder.png)] dark:text-white bg-center bg-cover bg-no-repeat h-[200px]  max-w-full w-[600px]">
                <input class="size-px !outline-transparent" type="file" name="header" id="header_picture"
                    accept="image/jpeg, image/png, image/webp"> <!--accept=".jpeg, .jpg, .png, .webp"-->
                <label
                    class="<?= $centerPosition ?> bg-gray-800/50 inline-block size-[40px] rounded-full hover:bg-gray-600/50"
                    for="header_picture">
                    <span class="<?= $centerPosition ?>"><?= $photoIcon ?></span>
                </label>
            </div>

            <div id="profile_display"
                class="rounded-full absolute top-[70%] left-[15px] dark:text-white bg-[url(../Assets/img/dp-placeholder.jpg)] bg-cover bg-no-repeat size-[125px]">
                <input class="size-px !outline-transparent" type="file" name="picture" id="profile_picture"
                    accept="image/jpeg, image/png, image/webp">
                <label
                    class="<?= $centerPosition ?> bg-gray-800/50 inline-block size-[40px] rounded-full hover:bg-gray-600/50"
                    for="profile_picture">
                    <span class="<?= $centerPosition ?>"><?= $photoIcon ?></span>
                </label>
            </div>

        </div>

        <label class="<?= $labelClasses ?> dark:text-white" for="display_name">Nom affiché</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="text" name="display_name" id="display_name"
            value="<?= $user['display_name'] ?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="biography">Bio</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="text" name="biography" id="biography"
            value="<?= $user['biography'] ?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="website">Website</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="url" name="website" id="website" value="<?=$user['url']?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="city">Ville</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="text" name="city" id="city" value="<?=$user['city']?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="country">Pays</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="text" name="country" id="country" value="<?=$user['country']?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="firstname">Prénom</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="text" name="firstname" id="firstname" value="<?=$user['firstname']?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="lastname">Nom</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="text" name="lastname" id="lastname" value="<?=$user['lastname']?>"><br>

        <label class="<?= $labelClasses ?> dark:text-white" for="birthdate">Date de naissance</label><br>
        <input class="<?= $inputClasses ?> dark:text-white" type="date" name="birthdate" id="birthdate" max="<?= min18() ?>" value="<?=$user['birthdate']?>"><br>

        <input type="submit" value="Sauvegarder"
            class="w-fit block cursor-pointer bg-white text-black px-4 py-2 my-6 mx-auto rounded-lg border border-solid border-red-600 hover:bg-red-600 hover:text-white transition duration-300">

    </form>

</div>
<script src="Assets/Javascript/editProfil.js"></script>