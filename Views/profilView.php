<?php include('Views/Componants/FollowersModal.php') ?>

<div class="grid grid-cols-10 gap-4 sm:p-6">
    <div class="col-span-0 lg:col-span-2 xl:col-span-2">
        <?php include('Views/Componants/NavBar.php') ?>
    </div>

    <div
        class="Tweet_Countainer col-span-10 sm:col-span-9  lg:col-span-6   flex flex-col gap-4 bg-gray-50 border-l border-r dark:border-gray-800 dark:bg-black">
        <div class="ImagesBaniere relative">
            <img alt="baniere de l'user" src="<?= $banner ?>" class="w-full h-36 object-cover">
            <img alt="My profile pic" src="<?= $dp ?>"
                class="w-32 h-32 rounded-full border-4 border-white absolute bottom-6 left-6 translate-y-10  dark:border-slate-900">
        </div>
        <div class="icones w-full flex justify-end pt-2 pr-2 relative">
            <button id='editProfil' class="bg-black text-white p-2 px-4 rounded-3xl dark:bg-white dark:text-slate-900">
                Editer mon profil
            </button>
        </div>
        <?php if(!empty($editMsg)):?>
        <div class= pt-2> 
            <div class="flex items-center p-4 mb-4 rounded-lg text-sm bg-black text-white dark:bg-white dark:text-slate-900" role="alert"> <!--text-blue-800 border border-blue-300 bg-blue-50 dark:text-blue-400 dark:border-blue-800-->
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info </span>- <?=$editMsg?><span>&times;</span>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="px-5 pb-5 border-b-2 dark:border-black">
            <h1 class="text-base md:text-3xl text-black dark:text-white font-semibold">
                <?php echo $myUser['display_name'] ?>
            </h1>
            <h2 class="mt-1 text-gray-400 text-xl"><?php echo "@" . $myUser['username'] ?></h2>
            <div class="mt-1">
                <p class="pt-4 pb-2 text-black dark:text-white"><?php echo $myUser['biography'] ?></p>
            </div>
            <span class="text-gray-500 font-light pd-2 dark:text-white">Joined <span
                    class="text-red-500 font-semibold">Pavk</span>
                <?php echo $m_y['m_y'] ?></span>
            <h3 class="text-black dark:text-white">
                <span class="font-semibold"><?php echo $followersUser['total_abonnenment'] ?? "0" ?></span>
                <span id="abonnement" class="pr-2 hover:underline text-gray-600 cursor-pointer"> abonnements</span>
                <span class="font-semibold"><?php echo $followingUser['total_abonnes'] ?? "0" ?></span>
                <span id="abonnés" class="text-gray-600 hover:underline cursor-pointer"> abonné</span>
            </h3>
            <span class="hidden" id="MyId"><?php echo $myUser['id'] ?></span>

        </div>

        <div
            class="tab text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <button class="tablinks me-2" onclick="openTwitterTabs(event, 'Posts')">Posts</button>
            <button class="tablinks" onclick="openTwitterTabs(event, 'Réponses')">Réponses</button>
            <button class="tablinks" onclick="openTwitterTabs(event, 'Médias')">Médias</button>
            <button class="tablinks" onclick="openTwitterTabs(event, 'Likes')">J'aime</button>
        </div>

        <!-- Tab content -->
        <div id="Posts" class="tabcontent inline-block rounded-t-lg ">
            <?php
            foreach ($tweets as $key => $tweet) {
                include('Views/Componants/TweetTemplateComponant.php');
            } ?>
        </div>
        <div id="Réponses" class="tabcontent inline-block rounded-t-lg ">
            <?php
            foreach ($repliesByMe as $key => $replies) {
                include('Views/Componants/ReplyComponant.php');
            }
            ?>
        </div>



        <div id="Médias" class="tabcontent">
            <?php
            foreach ($mediasByMe as $key => $tweet) {
                include('Views/Componants/MediaTweetTemplate.php');
            }
            ?>
        </div>


        <div id="Likes" class="tabcontent inline-block rounded-t-lg ">
            <?php
            foreach ($tweetsLikedByMe as $key => $tweet) {
                include('Views/Componants/TweetTemplateComponant.php');
            }
            ?>
        </div>

    </div>
    <div class="gap-8 col-span-0 lg:col-span-2 hidden flex-col lg:flex bg-slate-100 dark:bg-black sticky top-0">
        <?php include('Componants/suggestFollow.php') ?>
    </div>

</div>

<div id="profilForm" class="hidden h-full sm:w-dvw min-w-full bg-black sm:bg-opacity-50 sm:backdrop-blur-sm fixed top-[0px] z-99">
    <?php include('Views/editProfilView.php'); ?>
</div>

<script src="Assets/Javascript/AutoSuggetion.js"></script>
<script src="Assets/Javascript/LikeRetweet.js"></script>
<script src="Assets/Javascript/FollowList.js"></script>
<script src="Assets/Javascript/Commentaire.js"></script>
<script src="Assets/Javascript/bookMarked.js"></script>
<script src="Assets/Javascript/TxtTransformTweet.js"></script>
<script src="Assets/Javascript/tabsProfile.js"></script>