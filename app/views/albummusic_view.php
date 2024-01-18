<!doctype html>
<html lang="en">

<?php require_once(__DIR__ . '/../components/head.html') ?>
<title>Album | Page</title>

<body>
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-0 md:w-[25vw] lg:w-[20vw]">
        <?php require_once(__DIR__ . '/../components/sidebar.php') ?>
    </div>
    <div class="w-full md:w-[75vw] lg:w-[80vw] h-full flex flex-col">
        <div class="flex items-center justify-around w-full h-[10vh] ">
            <div
                class="relative flex items-center w-3/5 md:w-2/5 border-t-2 shadow-xl h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" id="search"
                       placeholder="Search something.." />
            </div>
            <div class="group relative hidden md:inline-block">
                <div class="rounded-full bg-gray-300 h-10 leading-10 cursor-pointer">
                    <a href="/paroly/public/profile/index/userid">
                        <img class="rounded-full float-left h-full"
                             src="/paroly/public/../assets/images/profile_pic.png"> <span class="px-2">User
                                Name</span>
                    </a>
                </div>
                <div
                    class="opacity-0 w-28 bg-black text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 top-full right-[10%] px-3 pointer-events-none">
                    View Profile
                    <svg class="absolute text-black h-2 w-full left-0 bottom-full" x="0px" y="0px"
                         viewBox="0 0 255 255" xml:space="preserve">
                            <polygon class="fill-current" points="0,255 127.5,127.5 255,255" />
                        </svg>
                </div>
            </div>
        </div>

        <div class="flex justify-between">
            <h3 class="m-5">Recent Music</h3>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="btn border-2 rounded-md bg-[#313866] text-white p-5">
                Add Music
            </button>

        </div>

        <div class="flex h-[50vh] ">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[460px]">
                    <thead>
                    <tr>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                            Image</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                            Title</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                            Artist</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                            Date release</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                            Genre</th>
                        <th
                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 flex justify-end rounded-tr-md rounded-br-md">
                            Add In Playlist</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $albumusic = $data['musics']?>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">

                                    <img src="/paroly/public/../assets/images/addMusic/<?= $albumusic->getImage() ?>"
                                         alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#"
                                       class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                    </a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                            <span
                                                class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?php echo $albumusic->getName() ?></span>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                            <?php echo $albumusic->getUser()->getName() ?></span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">
                                            <?php echo $albumusic->getDate() ?></span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">sssss</span>
                            </td>


                            <td class="py-2 px-4 border-b border-b-gray-50 flex justify-end">
                                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio"
                                        class="dropdownRadioButton font-bold text-2xl rounded-lg px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </button>


                                <!-- Dropdown menu -->
                                <div id="#dropdownDefaultRadio"
                                     class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownRadioButton">
                                        <li>
                                            <div class="flex items-center">
                                                <input id="default-radio-1" type="radio" value=""
                                                       name="default-radio"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="default-radio-1"
                                                       class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                                    radio</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input checked id="default-radio-2" type="radio" value=""
                                                       name="default-radio"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="default-radio-2"
                                                       class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Checked
                                                    state</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center">
                                                <input id="default-radio-3" type="radio" value=""
                                                       name="default-radio"
                                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="default-radio-3"
                                                       class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default
                                                    radio</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<script src="/paroly/public/../app/js/sidebar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>