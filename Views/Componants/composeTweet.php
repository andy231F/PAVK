<?php if($_SERVER['PATH_INFO'] != '/composeTweet'): ?>
    <div id="composeTweet" class="hidden h-full sm:w-dvw min-w-full bg-black sm:bg-opacity-50 sm:backdrop-blur-sm fixed top-[0px] z-99">
        <!-- <div class="absolute top-0 sm:top-[50%] sm:left-[50%] sm:!-translate-[50%] bg-slate-100 dark:bg-black text-black dark:text-white sm: border-2 sm:rounded-2xl sm:w-fit max-w-full h-full sm:h-[600px] sm:px-10 px-2 py-6 overflow-y-scroll"> -->
            <button type="button" id="close-composeTwt">Close</button>
            <!-- <iframe src="/compose-tweet" class="w-[800px] max-w-full h-dvh sm:mx-auto"></iframe> -->
        <!-- </div> -->
    </div>
<?php endif; ?>