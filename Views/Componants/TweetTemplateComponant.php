<?php
    $imgUrls = json_decode(file_get_contents('./Assets/Javascript/imgUrls.json'), true);
?>
<article class="tweet bg-white dark:bg-black rounded-3xl p-4 sm:p-6 md:p-8 lg:p-8 mt-2 dark:border-green-700">
<?php $svg='<svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="retweetIconTitle" stroke="#adb5bd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000000"> <title id="retweetIconTitle">Retweet</title> <path d="M13 18L6 18L6 7"/> <path d="M3 9L6 6L9 9"/> <path d="M11 6L18 6L18 17"/> <path d="M21 15L18 18L15 15"/> </svg>'?>

<?php if(isset($tweet['retweet'])){echo"<a class='text-gray-500 text-sm p-2 hover:underline flex items-center gap-2' href='/user?user=".$tweet['retweetName']."'>".$svg."Retweet par ".$tweet['retweetName']."</a>";} ?>

    <div class="flex items-center space-x-3">
        <img alt='photo de lutilisateur'
            src="../<?= ($tweet['picture']) ? $tweet['picture'] : 'Assets/img/profiles/img_1.jpg' ?>"
            class="rounded-full w-12 h-12 sm:w-20 sm:h-20 object-cover bg-gray-300 border-1">
        <span class="text-black dark:text-white font-semibold"><?php echo $tweet['display_name'] ?></span>
        <a href=<?php echo $tweet['username'] == $myUser['username'] ? "/profil" : "/user?user=" . $tweet['username'] ?>
            class="text-zinc-400  font-medium hover:text-red-600 "><?php echo "@" . $tweet['username'] ?></a>

    </div>
    <div class="mt-2">
        <p class="TweetContent text-gray-700 dark:text-white"><?php echo $tweet['content'] ?></p>
        <div class="tweet_medias flex flex-wrap">
        <?php for($img = 1; $img <=4; $img++):?>
            <?php if($tweet["media{$img}"] != NULL):?>
                <?php foreach($imgUrls as $short => $imgUrl):?>
                    <?php if($tweet["media{$img}"] == $imgUrl) :?>
                        <div class='sm:w-1/2 h-[250px]'><img src="../img/<?=$short?>" alt="this tweet media" class="w-full h-full object-cover rounded-3xl p-1 cursor-pointer" onclick="window.open(this.src, '_blank');"></div>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        <?php endfor;?>
        </div>
        <p class="text-gray-400 text-sm mt-1"><?php echo $tweet['creation_date'] ?></p>
    </div>
    <div class="tweet_compteur flex justify-between items-center mt-4 text-gray-600">
        <div class="compteur_like flex items-center space-x-1 cursor-pointer">
            <svg class="fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path
                    d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
            </svg>
            <p class="text-black dark:text-white"><?php echo $tweet['like_Count'] ?></p>
            <span class="hidden"><?php echo $tweet['id'] ?></span>
        </div>
        <div class="compteur_retweet flex items-center space-x-1 cursor-pointer">
            <svg class="fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path
                    d="M314-115q-104-48-169-145T80-479q0-26 2.5-51t8.5-49l-46 27-40-69 191-110 110 190-70 40-54-94q-11 27-16.5 56t-5.5 60q0 97 53 176.5T354-185l-40 70Zm306-485v-80h109q-46-57-111-88.5T480-800q-55 0-104 17t-90 48l-40-70q50-35 109-55t125-20q79 0 151 29.5T760-765v-55h80v220H620ZM594 0 403-110l110-190 69 40-57 98q118-17 196.5-107T800-480q0-11-.5-20.5T797-520h81q1 10 1.5 19.5t.5 20.5q0 135-80.5 241.5T590-95l44 26-40 69Z" />
            </svg>
            <p class="text-black dark:text-white"><?php echo $tweet['retweet_Count'] ?></p>
            <span class="hidden"><?php echo $tweet['id'] ?></span>
        </div>
        <div class="compteur_reponse flex items-center space-x-1 cursor-pointer">
            <svg class="fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path
                    d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
            </svg>
            <p class="text-black dark:text-white"><?php echo (count($tweet['replies'])) ?></p>
        </div>
        <div class="bookMarked flex items-center space-x-1 cursor-pointer">
            <svg class="fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path
                    d="M200-120v-656.67q0-27 19.83-46.83 19.84-19.83 46.84-19.83h426.66q27 0 46.84 19.83Q760-803.67 760-776.67V-120L480-240 200-120Zm66.67-101.33L480-312l213.33 90.67v-555.34H266.67v555.34Zm0-555.34h426.66-426.66Z" />
            </svg>
            <span class="hidden"><?php echo $tweet['id'] ?></span>
        </div>
    </div>
    <div class="tweet_response hidden p-8 mt-8 border-t-2">
        <div>
            <input type="text"
                class=" reponse_input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Balance ton com..." required />
        </div>
        <?php
        foreach ($tweet['replies'] as $key => $reponse) {
            include('Views/Componants/ReplyComponant.php');
        }
        ?>
    </div>
</article>
