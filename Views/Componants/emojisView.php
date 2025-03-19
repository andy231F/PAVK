<div class="grid grid-cols-10 gap-4 p-6">
    <div class="col-span-2">
        <?php include('Views/Componants/NavBar.php') ?>
    </div>

    <div class="col-span-6 border-l border-r dark:border-gray-800 flex flex-col gap-4 bg-gray-50 dark:bg-slate-900">
        <label class="text-black dark:text-white inline-flex items-center cursor-pointer">
            <!-- <input id="toggle" onclick="toggle(this)" type="checkbox" class="sr-only peer"
              echo $darkmode == "true" ? "checked" : "" ?>> -->

            <div
                class="col-span-6 border-l border-r dark:border-gray-800 flex flex-col gap-4 bg-gray-50 dark:bg-slate-900">
                <label class="text-black dark:text-white inline-flex items-center cursor-pointer">
                    <button id="emojis" onclick="emojisBtn()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Emojis
                    </button>
                </label>

                <!-- Emoji Modal -->
                <div id="emoji-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Select an Emoji
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="emoji-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div id="emoji-container" class="p-4 md:p-5 grid grid-cols-8 gap-4">
                                <!-- Emojis will be inserted here by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    <div class="col-span-2 hidden flex-col lg:flex">
    </div>
</div>


</label>
<script src="Assets/Javascript/emojis.js"></script>