<?php
if (!isset($_COOKIE['darkmode'])) {
  $darkmode = false;
} else {
  $darkmode = $_COOKIE['darkmode'];
}

?>


<div onclick="toggle(this)" class="toggleBar anim text-black dark:text-white sm:inline-flex items-center cursor-pointer hidden">
  <div class="relative w-16 h-6 bg-gray-200 rounded-full dark:bg-gray-700  dark:border-gray-600 ">
    <div class="rondThemeToggler h-6 w-6 absolute rounded-full bg-gray-700 dark:bg-white"></div>
  </div>
  <p class="font-bold p-2 hidden lg:block">Thème</p>
</div>



<script src="Assets/Javascript/ToggleMode.js"></script>