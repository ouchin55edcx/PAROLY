<!doctype html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../components/head.html') ?>
    <!-- <title>QUIZZ | AWS</title> -->
    <title>PAROLY | Home</title>


</head>

<body class="overflow-x-hidden">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-0 sm:w-[30vw] md:w-[25vw] lg:w-[18vw]">
            <?php require_once(__DIR__ . '/../components/sidebar.php') ?>
        </div>
        <div class="w-full sm:w-[70vw] md:w-[75vw] lg:w-[80vw] h-full flex flex-col">
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
            <div class="flex flex-col items-center justify-center h-[40vh] border-2 rounded-xl">
                <p>Playlists</p>
            </div>
            <div class="flex items-center justify-center h-[50vh]">
                <div class="w-1/2 flex flex-col items-center justify-center h-full border-2 rounded-xl">
                    <p>Albums</p>
                </div>
                <div class="w-1/2 flex flex-col items-center justify-center h-full border-2 rounded-xl">
                    <p>Music</p>
                </div>
            </div>
        </div>
    </div>

    <script src="/paroly/public/../app/js/sidebar.js"></script>
</body>

</html>