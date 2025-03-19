<div class="grid grid-cols-10 gap-4 sm:p-6">
    <div class="col-span-0 lg:col-span-2 xl:col-span-2">
        <?php include('Views/Componants/NavBar.php') ?>
    </div>

    <div class="Tweet_Countainer col-span-10 sm:col-span-9  lg:col-span-6   flex flex-col gap-4 bg-gray-50 border-l border-r dark:border-gray-800 dark:bg-black">

        <div class="bg-gray-50  dark:bg-slate-900 sticky top-0">

            <a href="/home" class="anim flex items-center justify-left gap-4 p-3">
                <div class="flex justify-center items-center w-10 h-10 rounded-full hover:bg-gray-100">
                    <img class="hover:rotate-38 transition-all" src="Assets/img/Logo.png">
                </div>
                <p class=" text-black dark:text-white text-xl hidden lg:block hover:text-red-600 dark:hover:text-green-700">
                    Enregistré</p>
            </a>

        </div>

        <?php if (is_string($bookmarkedTweets)) {
                echo "<span class='text-xl text-center text-gray-300'>";
                echo $bookmarkedTweets;
                echo "</span>";
            } else{
                foreach ($bookmarkedTweets as $key => $tweet) {
                    include('Views/Componants/TweetTemplateComponant.php');
                }
            } ?>


    </div>
    <div class="gap-8 col-span-0 lg:col-span-2 hidden flex-col lg:flex bg-slate-100 dark:bg-black sticky top-0">
    </div>

</div>

<script src="Assets/Javascript/AutoSuggetion.js"></script>
<script src="Assets/Javascript/bookMarked.js"></script>
<script src="Assets/Javascript/LikeRetweet.js"></script>
<script src="Assets/Javascript/TxtTransformTweet.js"></script>
<script src="Assets/Javascript/Commentaire.js"></script>