<?php include('Views/Componants/FollowersModal.php') ?>


<div class="grid grid-cols-10 gap-4 sm:p-6">
    <div class="col-span-0 lg:col-span-2 xl:col-span-2">
        <!-- Left side avec navbar, like, signtes, etc... -->
        <?php include('Views/Componants/NavBar.php') ?>
    </div>
    <div
        class="Tweet_Countainer col-span-10 sm:col-span-9  lg:col-span-6   flex flex-col gap-4 bg-gray-50 border-l border-r dark:border-gray-800 dark:bg-black">

        <div class="userCountainer w-full flex flex-col">

            <div class="ImagesBaniere relative">
                <img alt="baniere de l'user" src="<?= $banner ?>" class="w-full h-36 object-cover">
                <img alt="profil de l'user" src="<?= $dp ?>"
                    class="w-32 h-32 rounded-full border-4 border-white absolute bottom-6 left-6 translate-y-10 dark:border-slate-900">
            </div>

            <div class="icones w-full flex justify-end pt-2 pr-2">
                <nav class="flex justify-evenly gap-2">
                    <a href="/message?dest=<?php echo $userInfo['username'] ?>"
                        class="border-2 border-black p-1 dark:border-white rounded-full">
                        <svg class="fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" height="30px"
                            viewBox="0 -960 960 960" width="30px" fill="#000000">
                            <path
                                d="M146.67-160q-27 0-46.84-19.83Q80-199.67 80-226.67v-506.66q0-27 19.83-46.84Q119.67-800 146.67-800h666.66q27 0 46.84 19.83Q880-760.33 880-733.33v506.66q0 27-19.83 46.84Q840.33-160 813.33-160H146.67ZM480-454.67 146.67-670v443.33h666.66V-670L480-454.67Zm0-66.66 330.67-212H150l330 212ZM146.67-670v-63.33V-226.67-670Z" />
                        </svg>
                    </a>
                    <button id="FollowButtton"
                        class="bg-black text-white p-2 rounded-2xl dark:bg-white dark:text-slate-900">Follow</button>
                    <span class="hidden" id="MyId"><?php echo $myUser['id'] ?></span>
                    <span class="hidden" id="FollowId"><?php echo $userInfo['id'] ?></span>
                </nav>
            </div>
            <div class="p-5 border-b-2 dark:border-black">
                <!-- <div class="info flex flex-col gap-2 p-4 border-b-2"> -->
                <h1 class="mt-1 text-base md:text-3xl text-black dark:text-white font-semibold">
                    <?php echo $userInfo['display_name'] ?>
                </h1>
                <h2 class="mt-1 text-gray-400 text-xl"><?php echo "@" . $userInfo['username'] ?></h2>

                <div class="mt-1">
                    <p class="pt-4 pb-2 text-black dark:text-white"><?php echo $userInfo['biography'] ?></p>
                </div>

                <span class="text-gray-500 font-light pd-2 dark:text-white">Joined
                    <span class="text-red-500 font-semibold">Pavk</span>
                    <?php echo $m_y['m_y'] ?>
                </span>
                <h3 class="text-black dark:text-white">
                    <span class="font-semibold"><?php echo $followersUser['total_abonnenment'] ?? "0" ?></span>
                    <span id="abonnement" class="pr-2 text-gray-600 hover:underline cursor-pointer"> abonnements</span>
                    <span class="font-semibold"><?php echo $followingUser['total_abonnes'] ?? "0" ?></span>
                    <span id="abonnés" class="text-gray-600 hover:underline cursor-pointer"> abonné</span>
                </h3>
                <!-- </div> -->
            </div>
            <div
                class="tab text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <button class="tablinks me-2" onclick="openTwitterTabs(event, 'Posts')">Posts</button>
                <button class="tablinks" onclick="openTwitterTabs(event, 'Réponses')">Réponses</button>
                <button class="tablinks" onclick="openTwitterTabs(event, 'Médias')">Médias</button>
            </div>


            <div id="Posts" class="tabcontent inline-block rounded-t-lg ">
                <?php
                foreach ($tweets as $key => $tweet) {
                    include('Views/Componants/TweetTemplateComponant.php');
                } ?>
            </div>
            <div id="Réponses" class="tabcontent inline-block rounded-t-lg ">
                <?php
                foreach ($repliesByMe as $key => $replies) {
                    include('Views/Componants/repliesByMe.php');
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
        </div>

        <?php foreach ($tweets as $key => $tweet) {
            include('Views/Componants/TweetTemplateComponant.php');
        } ?>
    </div>

    <div class="gap-8 col-span-0 lg:col-span-2 hidden flex-col lg:flex bg-slate-100 dark:bg-black sticky top-0">
        <?php include('Componants/suggestFollow.php') ?>
    </div>



    <script src="Assets/Javascript/LikeRetweet.js"></script>
    <script src="Assets/Javascript/AutoSuggetion.js"></script>
    <script src="Assets/Javascript/FollowButton.js"></script>
    <script src="Assets/Javascript/FollowList.js"></script>
    <script src="Assets/Javascript/TxtTransformTweet.js"></script>
    <script src="Assets/Javascript/Commentaire.js"></script>

    <script src="Assets/Javascript/bookMarked.js"></script>
    <script src="Assets/Javascript/tabsProfile.js"></script>