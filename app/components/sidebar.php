<!-- Desktop Sidebar -->
<?php $_SESSION['userRole'] = 'artist' ?>
<div class="sidebar h-screen fixed sm:w-[30vw] md:w-[25vw] lg:w-[18vw] overflow-y-auto hidden sm:block">
    <div class="flex flex-col gap-12 h-full w-full">
        <div class="flex items-center justify-center">
            <img src="/paroly/public/../assets/images/paroly_logo.png" class="h-12 object-contain" alt="">
            <p>Paroly</p>
        </div>
        <div class="flex flex-col justify-center">
            <a href="/paroly/public/home/index" class="p-2 w-full hover:bg-black hover:text-white">
                <div class="flex items-center gap-4 child:text-lg child:font-medium">
                    <i class='indent-[4vw] bx bxs-home'></i>
                    <p>Home</p>
                </div>
            </a>
            <a href="/paroly/public/musics/index" class="p-2 w-full hover:bg-black hover:text-white">
                <div class="flex items-center gap-4 child:text-lg child:font-medium">
                    <i class='indent-[4vw] bx bxs-music'></i>
                    <p>Music</p>
                </div>
            </a>
            <a href="/paroly/public/albums/index" class="p-2 w-full hover:bg-black hover:text-white">
                <div class="flex items-center gap-4 child:text-lg child:font-medium">
                    <i class='indent-[4vw] bx bxs-album'></i>
                    <p>Albums</p>
                </div>
            </a>
            <a href="/paroly/public/artists/index" class="p-2 w-full hover:bg-black hover:text-white">
                <div class="flex items-center gap-4 child:text-lg child:font-medium">
                    <i class='indent-[4vw] bx bxs-user'></i>
                    <p>Artists</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center gap-4">
            <?php if (isset($_SESSION['userRole'])) {
                if ($_SESSION['userRole'] == 'client') {
            ?>
                    <p class="pl-10 text-gray-500 text-sm font-bold">MY PLAYLISTS</p>
                    <a href="/paroly/public/playlists/index/playlistid" class="p-2 w-full hover:border-b-2 hover:border-t-2 hover:border-black">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[4vw] bx bxs-playlist'></i>
                            <p>Playlist 1</p>
                        </div>
                    </a>
                    <a href="/paroly/public/playlists/index/playlistid" class="p-2 w-full hover:border-b-2 hover:border-t-2 hover:border-black">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[4vw] bx bxs-playlist'></i>
                            <p>Playlist 2</p>
                        </div>
                    </a>
                    <a href="/paroly/public/playlists/index/playlistid" class="p-2 w-full hover:border-b-2 hover:border-t-2 hover:border-black">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[4vw] bx bxs-playlist'></i>
                            <p>Playlist 3</p>
                        </div>
                    </a>
                    <a href="/paroly/public/playlists/index/playlistid" class="p-2 w-full hover:border-b-2 hover:border-t-2 hover:border-black">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[4vw] bx bxs-playlist'></i>
                            <p>Playlist 4</p>
                        </div>
                    </a>
                <?php } elseif ($_SESSION['userRole'] == 'admin') { ?>
                    <p class="pl-10 text-gray-500 text-sm font-bold">CONTROL PANEL</p>
                    <a href="/paroly/public/dashboard/index" class="p-2 w-full hover:border-b-2 hover:border-t-2 hover:border-black">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[3vw] bx bxs-dashboard'></i>
                            <p>DASHBOARD</p>
                        </div>
                    </a>
                <?php } elseif ($_SESSION['userRole'] == 'artist') { ?>
                    <p class="pl-10 text-gray-500 text-sm font-bold">MY MUSIC</p>
                    <a href="/paroly/public/musics/index/userid" class="p-2 w-full hover:bg-black hover:text-white">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[4vw] bx bxs-music'></i>
                            <p>My Music</p>
                        </div>
                    </a>
                    <a href="/paroly/public/albums/index/userid" class="p-2 w-full hover:bg-black hover:text-white">
                        <div class="flex items-center gap-4 child:text-md child:font-medium">
                            <i class='indent-[4vw] bx bxs-album'></i>
                            <p>My Albums</p>
                        </div>
                    </a>
            <?php } else {
                }
            } ?>
        </div>
    </div>
</div>


<!-- Mobile Sidebar -->


<div id="sidebar" class="sidebar h-screen w-full overflow-y-auto block sm:hidden transition-all duration-[350ms] ease-linear">
    <div id="btn_container" onclick="toggleSideBar()" class="fixed top-10 text-2xl font-bold cursor-pointer transition-all duration-[350ms] ease-in">
        <img id="sidebarBtn" class="h-12 object-contain transition-all duration-500" src="/paroly/public/../assets/images/arrow_right.svg" alt="">
    </div>
    <div class="flex items-center justify-around">
        <div class="flex items-center justify-center">
            <img src="/paroly/public/../assets/images/paroly_logo.png" class="h-12 object-contain" alt="">
            <p>Paroly</p>
        </div>
        <div class="flex items-center justify-center gap-2 w-1/3 md:w-1/4">
            <img src="/paroly/public/../assets/images/profile_pic.png" class="rounded-full h-8 object-contain" alt="">
            <p>User name</p>
        </div>
    </div>
    <div class="flex flex-col gap-16 mt-16">
        <div class="flex flex-col items-center justify-center gap-4">
            <a href="/paroly/public/user/index/username" class="w-full border-t-2 pt-4 border-black">
                <div class="flex justify-center items-center gap-4 child:text-3xl child:font-medium">
                    <i class='bx bxs-user-badge'></i>
                    <p>Profile</p>
                </div>
            </a>
            <a href="/paroly/public/home/index" class="w-full border-t-2 pt-4 border-black">
                <div class="flex justify-center items-center gap-4 child:text-3xl child:font-medium">
                    <i class='bx bxs-home'></i>
                    <p>Home</p>
                </div>
            </a>
            <a href="/paroly/public/musics/index" class="w-full border-t-2 pt-4 border-black">
                <div class="flex justify-center items-center gap-4 child:text-3xl child:font-medium">
                    <i class='bx bxs-music'></i>
                    <p>Music</p>
                </div>
            </a>
            <a href="/paroly/public/albums/index" class="w-full border-t-2 pt-4 border-black">
                <div class="flex justify-center items-center gap-4 child:text-3xl child:font-medium">
                    <i class='bx bxs-album'></i>
                    <p>Albums</p>
                </div>
            </a>
            <a href="/paroly/public/artists/index" class="w-full border-t-2 pt-4 border-black border-b-2 pb-4">
                <div class="flex justify-center items-center gap-4 child:text-3xl child:font-medium">
                    <i class='bx bxs-user'></i>
                    <p>Artists</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center gap-8">
            <?php if (isset($_SESSION['userRole'])) {
                if ($_SESSION['userRole'] == 'client') {
            ?>
                    <p class="pl-10 text-gray-500 text-xl font-bold">MY PLAYLISTS</p>
                    <!-- foreach to display playlists -->
                    <div class="flex flex-col items-center justify-center gap-6">
                        <a href="/paroly/public/playlists/playlist/1" class="text-gray-700">
                            <div class="flex items-center gap-4 child:text-2xl child:font-semibold">
                                <i class='bx bxs-playlist'></i>
                                <p>Playlist 1</p>
                            </div>
                        </a>
                        <a href="/paroly/public/albums/playlist/2" class="text-gray-700">
                            <div class="flex items-center gap-4 child:text-2xl child:font-semibold">
                                <i class='bx bxs-playlist'></i>
                                <p>Playlist 2</p>
                            </div>
                        </a>
                        <a href="/paroly/public/albums/playlist/3" class="text-gray-700">
                            <div class="flex items-center gap-4 child:text-2xl child:font-semibold">
                                <i class='bx bxs-playlist'></i>
                                <p>Playlist 3</p>
                            </div>
                        </a>
                        <a href="/paroly/public/albums/playlist/4" class="text-gray-700">
                            <div class="flex items-center gap-4 child:text-2xl child:font-semibold">
                                <i class='bx bxs-playlist'></i>
                                <p>Playlist 4</p>
                            </div>
                        </a>
                    </div>
                <?php } elseif ($_SESSION['userRole'] == 'admin') { ?>
                    <p class="pl-10 text-gray-500 text-xl font-bold">CONTROL PANEL</p>
                    <div class="flex flex-col items-center justify-center gap-6">
                        <a href="/paroly/public/dashboard/index/" class="text-gray-700">
                            <div class="flex items-center gap-4 child:text-2xl child:font-semibold">
                                <i class='bx bxs-dashboard'></i>
                                <p>DASHBOARD</p>
                            </div>
                        </a>
                    </div>
                <?php } elseif ($_SESSION['userRole'] == 'artist') { ?>
                    <p class="pl-10 text-gray-500 text-xl font-bold">MY MUSIC</p>
                    <div class="flex flex-col items-center justify-center gap-6 child:text-2xl">
                        <a href="/paroly/public/musics/index/userid">
                            <div class="flex items-center gap-4 child:text-md child:font-medium">
                                <i class='bx bxs-music'></i>
                                <p>My Music</p>
                            </div>
                        </a>
                        <a href="/paroly/public/albums/index/userid">
                            <div class="flex items-center gap-4 child:text-md child:font-medium">
                                <i class='bx bxs-album'></i>
                                <p>My Albums</p>
                            </div>
                        </a>
                    </div>
            <?php } else {
                }
            } ?>
        </div>
    </div>
</div>