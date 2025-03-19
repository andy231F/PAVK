<?php
$abonnement = GetAllInfoAbonnement($userInfo['id']);
$abonne = GetAllInfoAbonne($userInfo['id']);
// print_r($userInfo);
?>

<div id="FollowModal" class="fixed h-full w-screen z-10 flex justify-center backdrop-blur-sm items-center hidden">
    <div class="bg-white dark:bg-black w-2/3 border-2 h-4/6 z-30 rounded-2xl flex flex-col overflow-scroll">
        <h3 class="text-center font-bold text-2xl p-2">Follower</h3>
        <ul id="listabonne">
            <?php for ($i = 0; $i < count($abonne); $i++) { ?>
                <li class="m-auto p-2 w-4/5 flex items-center justify-between">
                    <img alt="imageProfil" class="rounded-full w-20" src="Assets/img/img_1.jpg" />
                    <p class="text-center text-black dark:text-white font-bold text-2xl"><?php echo $abonne[$i]['username'] ?></p>
                    <button class="bg-black text-white p-2 rounded-2xl dark:bg-white dark:text-slate-900">Follow</button>
                </li>
            <?php } ?>
        </ul>
        <ul id="listabonnement">
            <?php for ($i = 0; $i < count($abonnement); $i++) { ?>
                <li class="m-auto p-2 w-4/5 flex items-center justify-between">
                    <img alt="ImageProfil" class="rounded-full w-20" src="Assets/img/img_1.jpg" />
                    <p class="text-center text-black dark:text-white font-bold text-2xl"><?php echo $abonnement[$i]['username'] ?></p>
                    <button class="bg-black text-white p-2 rounded-2xl dark:bg-white dark:text-slate-900">Follow</button>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>