
<div class="grid grid-cols-10 gap-4 sm:p-6 ">
    <div class="col-span-0 lg:col-span-2 xl:col-span-2">
        <?php include('Views/Componants/NavBar.php') ?>
    </div>

    <div class="Tweet_Countainer col-span-10 sm:col-span-9  lg:col-span-6   flex flex-col gap-4 bg-gray-50 border-l border-r dark:border-gray-800 dark:bg-black">
        <form action="" method="GET">
            <span class="sr-only">Search</span>
            </button>
            <div class="relative hidden md:block">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5  text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input list="hashtags" type="text" id="search-navbar" name="hashtag"
                                class="block w-3/4 pl-8 p-3  text-sm   text-gray-900 border rounded-full
                                focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-green-500" placeholder="Search">
                <datalist id="hashtags">
                    <?php foreach ($allHashtags as $key => $hstg) {
                        echo "<option value='".$hstg['name']."'>";
                    } ?>
                </datalist>

            </div>
        </form>
        

        <?php echo isset($hashtag) ? ('<div class="text-2xl px-5 text-black dark:text-white">Tous les tweets avec <span
            class="text-red-700 font-semibold">#' . $hashtag . '</span></div>') : "";

        if (isset($tweetHashtags)) {
            foreach ($tweetHashtags as $key => $tweet) { 
                include('Views/Componants/TweetTemplateComponant.php');
            }}else{
                echo 'aucun resultat';
            } ?>

    </div>

    <div class="gap-8 col-span-2 hidden flex-col lg:flex bg-slate-100 dark:bg-black sticky top-0">
        <?php include('Componants/suggestFollow.php') ?>
    </div>
</div>


<script src="Assets/Javascript/search.js"></script>
<script src="Assets/Javascript/TxtTransformTweet.js"></script>
<script src="Assets/Javascript/Commentaire.js"></script>
<!-- <script src="Assets/Javascript/AutoSuggetion.js"></script> -->
<script src="Assets/Javascript/LikeRetweet.js"></script>
<script src="Assets/Javascript/tabsProfile.js"></script>