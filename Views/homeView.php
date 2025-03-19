<div class="grid grid-cols-10 gap-4 sm:p-6">
    <div class="col-span-0 lg:col-span-2 xl:col-span-2">
        <!-- Left side avec navbar, like, signtes, etc... -->
        <?php include('Views/Componants/NavBar.php'); ?>
    </div>


    <div
        class="Tweet_Countainer col-span-10 sm:col-span-9  lg:col-span-6   flex flex-col gap-4 bg-gray-50 border-l border-r dark:border-gray-800 dark:bg-black">

        <!-- <div id="wysiwyg" class="w-[600px] max-w-full sm:mx-auto gap-4 bg-gray-50 border-l border-r dark:border-gray-800 dark:bg-black"> -->
        <div id="wysiwyg"
            class="tweet max-w-full bg-white dark:bg-black rounded-3xl p-4 sm:p-6 md:p-8 lg:p-8 mt-2 dark:border-green-700">
            <div class="w-full pt-2 mt-4 border-t flex justify-between item-center">
                <ul class="flex gap-1">
                    <li class="w-fit">
                        <button id="add_tweet" type="button"
                            class="p-2 cursor-pointer rounded-full hover:bg-red-600/10 active:bg-red-600/30"
                            title="Ajouter">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#EA3323">
                                <path
                                    d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="w-fit">
                        <button id="save_tweet" type="button"
                            class="p-2 cursor-pointer rounded-full hover:bg-red-600/10 active:bg-red-600/30"
                            title="Sauvegarder">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#EA3323">
                                <path
                                    d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button type="submit"
                            class="w-fit block cursor-pointer dark:bg-white dark:text-black bg-black text-white  px-4 py-2 rounded-3xl  hover:bg-red-600 hover:text-white transition duration-300">
                            Poster
                        </button>
                    </li>
                </ul>
            </div>

        </div>
        <?php foreach ($tweets as $key => $tweet) {
       include('Views/Componants/skeletonComponant.php');
    } ?>

        <?php foreach ($tweets as $key => $tweet) {
     
            include('Views/Componants/TweetTemplateComponant.php');
        } ?>
    </div>

    <div class="gap-8 col-span-0 lg:col-span-2 hidden flex-col lg:flex bg-slate-100 dark:bg-black sticky top-0">
        <?php include('Componants/suggestFollow.php') ?>
    </div>

    <script type="module" src="Assets/Javascript/wysiwyg.js"></script>
    <script type="module">

        import { createNewTweet, anotherTweet, togglePara } from "/Assets/Javascript/wysiwyg.js";
        document.addEventListener('DOMContentLoaded', () => {

            <?php if($myUser['picture']): ?>
                let dpLink = "./<?=$myUser['picture']?>";
                createNewTweet('wysiwyg', 1, undefined, dpLink);
                // anotherTweet('add_tweet', dpLink);
            <?php else: ?>
                createNewTweet('wysiwyg', 1, undefined);
                // anotherTweet('add_tweet');
            <?php endif; ?>

        }); 
    </script>
</div>



<script src="Assets/Javascript/bookMarked.js"></script>
<script src="Assets/Javascript/Commentaire.js"></script>
<script src="Assets/Javascript/LikeRetweet.js"></script>
<script src="Assets/Javascript/TxtTransformTweet.js"></script>
<script src="Assets/Javascript/AutoSuggetion.js"></script>