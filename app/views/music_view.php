<!DOCTYPE html>
<html lang="en">

<?php require_once(__DIR__ . '/../components/head.html') ?>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-0 md:w-[25vw] lg:w-[20vw]">
            <?php require_once(__DIR__ . '/../components/sidebar.php') ?>
        </div>
        <div class="w-full md:w-[75vw] lg:w-[80vw] h-full flex flex-col">
            <div class="flex items-center justify-around w-full h-[10vh] ">
                <div class="relative flex items-center w-3/5 md:w-2/5 border-t-2 shadow-xl h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                    <div class="grid place-items-center h-full w-12 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" id="search" placeholder="Search something.." />
                </div>
                <div class="group relative hidden md:inline-block">
                    <div class="rounded-full bg-gray-300 h-10 leading-10 cursor-pointer">
                        <a href="/paroly/public/profile/index/userid">
                            <img class="rounded-full float-left h-full" src="/paroly/public/../assets/images/profile_pic.png"> <span class="px-2">User
                                Name</span>
                        </a>
                    </div>
                    <div class="opacity-0 w-28 bg-black text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 top-full right-[10%] px-3 pointer-events-none">
                        View Profile
                        <svg class="absolute text-black h-2 w-full left-0 bottom-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                            <polygon class="fill-current" points="0,255 127.5,127.5 255,255" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <h3 class="m-5">Add Your Music</h3>
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="btn border-2 rounded-md bg-[#313866] text-white p-5 ">Add New Music</button>
            </div>

            <div class="flex h-[50vh]">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md h-fit w-full" id="song">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">all Songs</div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[460px]">
                            <thead>
                            <tr>
                                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Image</th>
                                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Title</th>
                                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Artist</th>
                                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Date release</th>
                                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Genre</th>
                                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 flex justify-end rounded-tr-md rounded-br-md">Add Playlist</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php ?>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="/paroly/public/../assets/images/profile/"alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"> </a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">aaaaa</span>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">sssss</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">2023-07-21</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">sssss</span>
                                    </td>


                                    <td class="py-2 px-4 border-b border-b-gray-50 flex justify-end">

                                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio" class="font-bold text-4xl rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">
                                            <i class='bx bx-dots-horizontal-rounded'></i>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownDefaultRadio" class="text-black m-20 z-10 hidden w-48 bg-white border-2 divide-y divide-gray-100 rounded-lg ">
                                            <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">

                                                <li>
                                                    <div class="flex items-center">
                                                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-black bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-black">Default radio</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-black">Checked state</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <input id="default-radio-3" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="default-radio-3" class="ms-2 text-sm font-medium text-black">Default radio</label>
                                                    </div>
                                                </li>
                                                <li class="flex justify-center">
                                                    <button class="text-white bg-[#313866] px-5 rounded">Add</button>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            <?php  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create New Product
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="post">
                        <input name="iduser" value="1" type="hidden"/>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                (MAX.
                                                800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" name="image" type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min</label>
                                <input type="date" name="date" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2:10" required="">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Exemple Name..." required="">
                            </div>

                            <div class="w-full col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                                <input type="number" name="genre" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Genre" required>
                            </div>

                        <button type="submit" name="submitMusic" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Save Album
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script src="/paroly/public/../app/js/sidebar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>