<?php
if (!empty($data)) {

    if (!empty($data['playlists'])) {
        $playlists = $data['playlists'];
    }

    if (!empty($data['parolyplaylists'])) {
        $parolyPlaylists = $data['parolyplaylists'];
    }
    if (!empty($data['albums'])) {
        $albums = $data['albums'];
    }
    if (!empty($data['musics'])) {
        $musics = $data['musics'];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../components/head.html') ?>
    <!-- <title>QUIZZ | AWS</title> -->
    <title>PAROLY | Home</title>


</head>

<body class="overflow-x-hidden">
    <div class="flex h-full lg:h-screen">
        <!-- Sidebar -->
        <div class="w-0 sm:w-[30vw] md:w-[25vw] lg:w-[18vw]">
            <?php require_once(__DIR__ . '/../components/sidebar.php') ?>
        </div>
        <div class="w-full sm:w-[70vw] md:w-[75vw] lg:w-[82vw] h-full flex flex-col">
            <div class="flex items-center justify-around w-full h-[10vh]">
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
                <?php if (isset($_SESSION['userId'])) { ?>
                <div class="flex items-center gap-6">
                    <div class="group relative hidden md:inline-block">
                        <div class="rounded-full bg-gray-300 h-10 leading-10 cursor-pointer">
                            <a href="/paroly/public/profile/index/<?= $user->getId() ?>">
                                <img class="rounded-full float-left h-full object-cover"
                                    src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>"> <span
                                    class="px-2"><?= $user->getName() ?></span>
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
                <a href="/paroly/public/home/logout" class="underline">Log out</a>
            </div>
            <?php } else { ?>
            <div class="flex items-center justify-center">
                <a href="/paroly/public/home/login" class=" border-r-2 border-black text-lg pr-2 mr-2">Log in</a>
                <a href="/paroly/public/home/signup" class="text-lg">Sign up</a>
            </div>
            <div class="items-center justify-center hidden md:flex">
                <a href="/paroly/public/home/login" class=" border-r-2 border-black text-lg pr-2 mr-2">Log in</a>
                <a href="/paroly/public/home/signup" class="text-lg">Sign up</a>
            </div>
            <?php } ?>
        </div>

        <div id="content">
            <div class="flex flex-col items-center justify-center h-full lg:h-[38vh] pb-2">
                <p class="text-2xl md:text-xl font-medium md:self-start md:indent-8 pb-1">PAROLY Playlist's</p>
                <div class="flex flex-wrap justify-around gap-10">
                    <?php foreach ($parolyPlaylists as $playlist) : ?>
                    <a href="/paroly/public/playlistcon/index/<?= $playlist->getPlaylist()->getId() ?>"
                        class="card relative p-3 w-3/4 sm:w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 bg-slate-900 rounded-md hover:scale-105 duration-300 cursor-pointer hover:bg-slate-800 shadow-xl">
                        <!-- image (you can remove this part if not needed) -->
                        <!-- <img src="playlist_image_url" alt="#" class="w-full h-auto object-cover rounded-full"> -->
                        <img class="w-3/5 mx-auto h-auto object-cover rounded-full"
                            src="/paroly/public/../assets/images/music/<?= $playlist->getMusic()->getImage() ?>" alt="">

                        <!-- play button  -->
                        <div class="watch-button items-center absolute right-0 bottom-20">
                            <div
                                class="w-12 h-12 bg-green-500 rounded-full ring-1 ring-black grid place-items-center transition">
                                <svg class="ml-1 w-4" viewBox="0 0 16 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z"
                                        fill="black" />
                                </svg>
                            </div>
                        </div>

                        <!-- playlist details -->
                        <p class="text-sm font-semibold mt-2 text-white">
                            <?= htmlspecialchars($playlist->getPlaylist()->getName()) ?></p>
                        <p class="text-xs mt-2 text-white"><?= htmlspecialchars($playlist->getPlaylist()->getDesc()) ?>
                        </p>

                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center h-full lg:h-[50vh] lg:flex-row">
                <!-- Albums -->
                <div class="w-full lg:w-1/2 flex flex-col items-center justify-between h-full my-12 md:my-auto">
                    <p class="text-2xl md:text-xl font-medium md:self-start md:indent-[44px]">Latest Albums</p>
                    <?php foreach ($albums as $album) { ?>
                    <a href="/paroly/public/album/index/<?= $album->getId() ?>"
                        class="shadow-lg border-2 border-b-0 rounded-lg w-[85%]">
                        <div class="flex w-[98%] mx-auto items-center justify-between">
                            <div class="flex items-center gap-12">
                                <img src="/paroly/public/../assets/images/music/<?= $album->getImage() ?>"
                                    class=" object-contain h-16 py-1" alt="">
                                <p><?= $album->getName() ?></p>
                            </div>
                            <p>By <?= $album->getUser()->getName() ?></p>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <!-- Music -->
                <div class="w-full lg:w-1/2 flex flex-col items-center justify-between h-full">
                    <p class="text-2xl md:text-xl font-medium md:self-start md:indent-[44px]">Latest Music</p>
                    <?php foreach ($musics as $music) { ?>
                    <a href="/paroly/public/music/index/<?= $music->getId() ?>"
                        class="shadow-lg border-2 border-b-0 rounded-lg w-[85%]">
                        <div class="flex w-[98%] mx-auto items-center justify-between">
                            <div class="flex items-center gap-12">
                                <img src="/paroly/public/../assets/images/music/<?= $music->getImage() ?>"
                                    class=" object-contain h-16 py-1" alt="">
                                <div class="flex flex-col items-start justify-start">
                                    <p><?= $music->getName() ?></p>
                                    <p><?= $music->getDate() ?></p>
                                </div>
                            </div>
                            <p>By <?= $music->getUser()->getName() ?></p>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="/paroly/public/../app/js/sidebar.js"></script>
    <script src="/paroly/public/../app/js/search.js"></script>
</body>

</html>