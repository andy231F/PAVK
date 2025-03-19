

<div class="grid grid-cols-10 gap-4 ">
    <div class="col-span-2 p-6">
        <?php include('Views/Componants/NavBar.php') ?>
    </div>


    <div class="MessageCountainer relative col-span-10 sm:col-span-8 md:col-span-6 h-screen border-l-2 border-r-2  flex flex-col dark:border-gray-700">

        <a href="/message" class="ReturnArrow absolute top-0 left-0">
            <svg class="dark:fill-amber-50" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#000000"><path d="M400-240 160-480l241-241 43 42-169 169h526v60H275l168 168-43 42Z"/></svg>
        </a>
        <div class="AllMessages p-4 overflow-y-scroll flex flex-col-reverse h-10/12 w-full">
            <!-- Ajout via js -->
        </div>
        <div class="AllContact flex flex-col-reverse hidden">
            <?php foreach ($contacts as $key => $contact) { ?>
                <a href="/message?dest=<?php echo$contact['username']?>" class="contact flex justify-between border-b-2 dark:border-gray-500 items-center h-24 p-8">
                    <img class="h-20 rounded-full" src="<?php echo$contact['picture']?>" />
                    <p class="text-4xl text-black dark:text-white"><?php echo$contact['username']?></p>
                    <p class="text-gray-400">2min</p>
                </a>
                
                <?php } ?>
                <!-- //bar de recherche -->
                <form action="" method="GET">
                    <span class="sr-only">Search</span>
                    </button>
                    <div class="relative hidden md:block">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 ml-20 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
    
                        <input list="contact" type="text" id="search-navbar" name="dest"
                            class="block ml-20 w-3/4 p-3 pl-10 text-sm   text-gray-900 border rounded-full
                            focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-green-500" placeholder="Search">

                            <datalist id="contact">
                                <?php foreach ($AllContact as $key => $contact) {
                                    if($contact['username'] != $profil['username'])
                                  echo "<option value='".$contact['username']."'>";
                                } ?>
                            </datalist>
                    </div>
                </form>
        </div>
        

        <div class="messageInput mb-10 sm:mb-0 h-2/12 relative">
                <textarea style="resize: none;" id="messageInputField" type="text" class="outline-green-700 w-full h-full border-gray-300 border-2 dark:border-gray-700 dark:text-amber-50"></textarea>
                <button id="messageSendButton" class="absolute bottom-2/4 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="100%" fill="currentColor" class=" fill-black dark:fill-white hover:fill-red-600 bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                    </svg>
                </button>
        </div>

    </div>

    <div id="myId" class="hidden"><?php echo($myid) ?></div>
    <div id="Dest" class="hidden"><?php echo($dest['id']?? "") ?></div>


    
    <div class=" md:col-span-2"></div>
</div>
    <script src="Assets/Javascript/Message.js"></script>
    <script src="Assets/Javascript/AutoSuggetion.js"></script>
