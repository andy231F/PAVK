
<?php include_once('Models/userFinderModel.php');

$AllContact = GetAllContact();
$profil = seeProfil(); 
$suggests = suggestProfil($AllContact);?>
<div class="fixed">
    <div class="gap-6 col-span-2 hidden flex-col lg:flex bg-slate-100 dark:bg-black sticky top-0 mb-2">
        <div class="Tweet_Countainer col-span-8 lg:col-span-6 border-l rounded-md border-r pt-0 p-8 text-gray-400 dark:border-gray-800 flex flex-col gap-4 bg-gray-50 dark:bg-black">
                <h1 class="text-2xl  md:text-black dark:text-white ">WHO TO FOLLOW</h1>
                            <span class="sr-only">Search</span>

                    <form action="/user" method="GET">
                        <div class="relative hidden md:block">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
        
                            <input list="contact" type="text" id="search-navbar" name="user"
                                class="block w-3/4 p-3 pl-10 text-sm   text-gray-900 border rounded-full
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
    </div>
                

                        
    <div class="col-span-8 lg:col-span-6 border-l rounded-md border-r pt-0 p-8 text-gray-400 dark:border-gray-800 flex flex-col gap-4 bg-gray-50 dark:bg-black">
        <p class="text-2xl  md:text-black dark:text-white ">Suggestions :</p>

        <?php foreach ($suggests as $key => $suggest) {
            if($suggest['username'] != $profil['username']){?>
            <a href="/user?user=<?php echo $suggest['username'] ?>" class="suggest flex justify-between items-center hover:bg-gray-200 cursor-pointer rounded-2xl p-2">
                <img class="rounded-full w-14" alt="photo utilisateur" src='<?php echo $suggest['picture'] ?>'/>
                <p><?php echo $suggest['username'] ?></p>
            </a>
        
    <?php }} ?>

    </div>
</div>

