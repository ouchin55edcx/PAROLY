<?php

$playlists =$data['playlists'];
$songs = $data['musics'];
$genres = $data['genres'];
$user = $data['user'];
$lyrics = $data['lyrics'];
$countSong = $data['count'];
$artistCount = $data['artistCount'];
$reports = $data['reports'];
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once(__DIR__ . '/../components/head.html') ?>

<body class="text-gray-800 font-inter">

<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">Logo</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group active">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-music-line mr-3 text-lg"></i>
                <span class="text-sm "> Playlists</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-file-music-line mr-3 text-lg"></i>
                <span class="text-sm "> Genre</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#song" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-survey-line mr-3 text-lg"></i>
                <span class="text-sm ">
                     Songs
                </span>
            </a>
        </li>

        <li class="mb-1 group">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-survey-line mr-3 text-lg"></i>
                <span class="text-sm ">Validation</span>
            </a>
        </li
        <li class="mb-1 group">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-survey-line mr-3 text-lg"></i>
                <span class="text-sm ">reports</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-survey-line mr-3 text-lg"></i>
                <span class="text-sm "> Satistics</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->

<!-- start: Main -->
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <button type="button" class="text-lg text-gray-600 sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>
        <ul class="flex items-center text-sm ml-4">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">Analytics</li>
        </ul>
        <ul class="ml-auto flex items-center">
            <li class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                    <i class="ri-notification-3-line"></i>
                </button>
                <div class=" dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                    <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                        <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                    </div>
                    <div class="my-2">
                        <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                            <?php foreach ($reports as $report) : ?>
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>"" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"><?= mb_strimwidth($report->getDesc(), 0, 22, "..."); ?></div>
                                        <div class="text-[11px] text-gray-400"><?php echo $report->getId();?></div>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="my-2 flex flex-col items-center">

                            <button class=" mt-2 py-2 px-4 bg-[#313866] text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                <i class='bx bx-trash-alt text-md'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown ml-3">
                <button type="button" class="dropdown-toggle flex items-center">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                </button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1"><?php echo $artistCount?></div>
                        <div class="text-sm font-medium text-gray-400">Artist</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-full bg-gray-100 rounded-full h-4">
                        <div class="h-full bg-blue-500 rounded-full p-1" style="width: 10%;">
                            <div class="w-2 h-2 rounded-full bg-white ml-auto"></div>
                        </div>
                    </div>
                    <span class="text-sm font-medium text-gray-600 ml-4"></span>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold"><?php echo $countSong?></div>
                            <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2"><?php echo $countSong?>%</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Songs</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded-full object-cover block">

                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1"><span class="text-base font-normal text-gray-400 align-top">&dollar;</span>xxxxx</div>
                        <div class="text-sm font-medium text-gray-400">xxxx</div>
                    </div>
                </div>
                <a href="#" class="text-blue-500 font-medium text-sm hover:text-blue-600">xxxx</a>
            </div>
        </div>
        <div class="grid grid-cols-1 w-full h-  gap-6 mb-6">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">All Playlists</div>
                    <div class="font-medium">

                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-[#313866]  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                            Add Playlists
                        </button>

                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative  rounded-lg shadow  bg-gray-800">
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Create New Playlist
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form class="p-4 md:p-5" method="post">
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="playlistName" id="name" class="bg-white text-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400  outline-0" placeholder="Platlist name" required="">
                                                <input type="hidden" name="userId" value="1">

                                            </div>
                                            <div class="col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                                <textarea name="playlistDesc" id="description" rows="4" class="block p-2.5 w-full text-sm text-dark-900 bg-white rounded-lg border border-gray-300 dark:placeholder-black-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write platlist description here"></textarea>
                                            </div>
                                        </div>
                                        <button name="AddPlaylist" type="submit" class="text-white inline-flex items-center bg-[#313866] hover:bg-blend-darken-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-dark-700 ">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Add New Playlist
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="overflow-x-auto h-fit">
                    <table class="w-full h-fit min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Nom</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Description</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">nbr songs</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($playlists as $playlist) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <div class="flex items-center">
                                    <img src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>"  alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?=($playlist->getName()) ?></a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-2/5">
                                <span class="text-[13px] font-medium text-gray-400"><?php echo $playlist->getDesc();?></span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <span class="text-[13px] font-medium text-gray-400">6</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5 ">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">no lyrics</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">All Genre</div>
                    <div class="font-medium">

                        <button data-modal-target="genre-modal" data-modal-toggle="genre-modal" class="block text-white bg-[#313866]  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                            Add Genre
                        </button>

                        <div id="genre-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative  rounded-lg shadow  bg-gray-800">
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Create New genre
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>


                                    <form class="p-4 md:p-5" method="post">
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="genreName" id="name" class="bg-white text-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:placeholder-gray-400  outline-0" placeholder="Genre name" required="">
                                            </div>

                                        </div>
                                        <button name="AddPGenre" type="submit" class="text-white inline-flex items-center bg-[#313866] hover:bg-blend-darken-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-dark-700 ">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Add New genre
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="overflow-x-auto h-fit">
                    <table class="w-full h-fit min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Nom</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">nbr songs</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($genres as $genre) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <div class="flex items-center">
                                    <img src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>" alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?=($genre['name']) ?></a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <span class="text-[13px] font-medium text-gray-400"><?=($genre['musicCount']) ?> </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">All lyrics</div>
                    <div class="font-medium">
                    </div>

                </div>
                <div class="overflow-x-auto h-fit">
                    <table class="w-full h-fit min-w-[540px]" data-tab-for="order" data-page="active">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Content</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">writer</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">email</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lyrics as $lyric) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <div class="flex items-center">
                                    <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?= $lyric->getContent(); ?></a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <span class="text-[13px] font-medium text-gray-400"><?= $lyric->getUser()->getName(); ?> </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <span class="text-[13px] font-medium text-gray-400"><?= $lyric->getUser()->getEmail(); ?> </span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50 w-1/5">
                                <form method="post">
                                    <div class="my-2">
                                        <input type="hidden" value="<?= $lyric->getUser()->getEmail(); ?>" name="email">
                                        <button value="<?= $lyric->getId(); ?>" name="deleteLyrics" class="mt-2 py-2 px-4 bg-[#313866] text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                            <i class='bx bx-trash-alt text-md'></i>
                                        </button>
                                        <button value="<?= $lyric->getId(); ?>" name="approve" class="mt-2 py-2 px-4 bg-[#313866] text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                            <i class='bx bx-check-square'></i>
                                        </button>
                                    </div>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" id="song">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">all Songs</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[460px]">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Title</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Artist</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Genre</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Date release</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Add To Playlist</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($songs as $song) : ?>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>"alt="" class="w-8 h-8 rounded object-cover block">
                                        <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">  <?php echo $song->getName();?></a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?php echo $song->getUser()->getName();?></span>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?php echo $song->getGenre()->getName();?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none"><?php echo $song->getDate();?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <form class="w-full flex justify-between pt-4" method="post" >
                                        <fieldset class="md:w-[25vw]">
                                            <div class="relative border border-gray-300 text-gray-800 bg-white shadow-lg">
                                                <select class="appearance-none w-full py-1 p|x-2 bg-white" name="playlistId" id="frm-whatever">
                                                    <?php foreach ($playlists as $playlist) : ?>
                                                        <option value="<?= $playlist->getId();?>"><?= $playlist->getName();?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <input type="hidden" value="<?php echo $song->getId();?>" name="idSong">
                                                <div class="pointer-events-none absolute right-0 top-0 bottom-0 flex items-center px-2 text-gray-700 border-l">
                                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <button name="addToPlaylist" type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add to playlist</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md" id="song">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">all reports</div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[460px]">
                        <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">id</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">description</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">lyrics</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">validate</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reports as $report) : ?>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">  <?php echo $report->getId();?></a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?php echo $report->getDesc();?></span>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50"(
                                    <span class="text-[13px] font-medium text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?php echo $report->getLyrics()->getContent();?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none"></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form method="post" action="">
            <input name="email" type="email">
            <button name="send">send</button>
        </form>
        <div class=" mb-6 w-full">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2 w-full">
                <div class="flex justify-between mb-4 items-start w-full">
                    <div class="font-medium w-full">chart Statistics</div>
                </div>
                <div>
                    <canvas id="order-chart"></canvas>
                </div>
            </div>

        </div>

    </div>
</main>

<!-- end: Main -->
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const sidebarToggle = document.querySelector('.sidebar-toggle')
    const sidebarOverlay = document.querySelector('.sidebar-overlay')
    const sidebarMenu = document.querySelector('.sidebar-menu')
    const main = document.querySelector('.main')
    sidebarToggle.addEventListener('click', function (e) {
        e.preventDefault()
        main.classList.toggle('active')
        sidebarOverlay.classList.toggle('hidden')
        sidebarMenu.classList.toggle('-translate-x-full')
    })
    sidebarOverlay.addEventListener('click', function (e) {
        e.preventDefault()
        main.classList.add('active')
        sidebarOverlay.classList.add('hidden')
        sidebarMenu.classList.add('-translate-x-full')
    })
    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault()
            const parent = item.closest('.group')
            if (parent.classList.contains('selected')) {
                parent.classList.remove('selected')
            } else {
                document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                    i.closest('.group').classList.remove('selected')
                })
                parent.classList.add('selected')
            }
        })
    })

    const popperInstance = {}
    document.querySelectorAll('.dropdown').forEach(function (item, index) {
        const popperId = 'popper-' + index
        const toggle = item.querySelector('.dropdown-toggle')
        const menu = item.querySelector('.dropdown-menu')
        menu.dataset.popperId = popperId
        popperInstance[popperId] = Popper.createPopper(toggle, menu, {
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        offset: [0, 8],
                    },
                },
                {
                    name: 'preventOverflow',
                    options: {
                        padding: 24,
                    },
                },
            ],
            placement: 'bottom-end'
        });
    })
    document.addEventListener('click', function (e) {
        const toggle = e.target.closest('.dropdown-toggle')
        const menu = e.target.closest('.dropdown-menu')
        if (toggle) {
            const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
            const popperId = menuEl.dataset.popperId
            if (menuEl.classList.contains('hidden')) {
                hideDropdown()
                menuEl.classList.remove('hidden')
                showPopper(popperId)
            } else {
                menuEl.classList.add('hidden')
                hidePopper(popperId)
            }
        } else if (!menu) {
            hideDropdown()
        }
    })

    function hideDropdown() {
        document.querySelectorAll('.dropdown-menu').forEach(function (item) {
            item.classList.add('hidden')
        })
    }
    function showPopper(popperId) {
        popperInstance[popperId].setOptions(function (options) {
            return {
                ...options,
                modifiers: [
                    ...options.modifiers,
                    { name: 'eventListeners', enabled: true },
                ],
            }
        });
        popperInstance[popperId].update();
    }
    function hidePopper(popperId) {
        popperInstance[popperId].setOptions(function (options) {
            return {
                ...options,
                modifiers: [
                    ...options.modifiers,
                    { name: 'eventListeners', enabled: false },
                ],
            }
        });
    }

    document.querySelectorAll('[data-tab]').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault()
            const tab = item.dataset.tab
            const page = item.dataset.tabPage
            const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
            document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
                i.classList.remove('active')
            })
            document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
                i.classList.add('hidden')
            })
            item.classList.add('active')
            target.classList.remove('hidden')
        })
    })

    new Chart(document.getElementById('order-chart'), {
        type: 'line',
        data: {
            labels: generateNDays(7),
            datasets: [
                {
                    label: 'Active',
                    data: generateRandomData(7),
                    borderWidth: 1,
                    fill: true,
                    pointBackgroundColor: 'rgb(59, 130, 246)',
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgb(59 130 246 / .05)',
                    tension: .2
                },
                {
                    label: 'Completed',
                    data: generateRandomData(7),
                    borderWidth: 1,
                    fill: true,
                    pointBackgroundColor: 'rgb(16, 185, 129)',
                    borderColor: 'rgb(16, 185, 129)',
                    backgroundColor: 'rgb(16 185 129 / .05)',
                    tension: .2
                },
                {
                    label: 'Canceled',
                    data: generateRandomData(7),
                    borderWidth: 1,
                    fill: true,
                    pointBackgroundColor: 'rgb(244, 63, 94)',
                    borderColor: 'rgb(244, 63, 94)',
                    backgroundColor: 'rgb(244 63 94 / .05)',
                    tension: .2
                },
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function generateNDays(n) {
        const data = []
        for(let i=0; i<n; i++) {
            const date = new Date()
            date.setDate(date.getDate()-i)
            data.push(date.toLocaleString('en-US', {
                month: 'short',
                day: 'numeric'
            }))
        }
        return data
    }
    function generateRandomData(n) {
        const data = []
        for(let i=0; i<n; i++) {
            data.push(Math.round(Math.random() * 10))
        }
        return data
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 0,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>