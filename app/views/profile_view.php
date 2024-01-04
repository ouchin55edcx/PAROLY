<?php

$user = $data['user'];
$playlists = $data['playlists'];


?>
<!doctype html>
<html>


<head>
    <?php require_once(__DIR__ . '/../components/head.html') ?>
    <title>PAROLY | Profile</title>
</head>


<body class=" overflow-x-hidden">
    <div class="flex h-full lg:h-screen">


        <!-- Sidebar -->
        <div class="w-0 sm:w-[30vw] md:w-[25vw] lg:w-[18vw]">
            <?php require_once(__DIR__ . '/../components/sidebar.php') ?>
        </div>

        <div class="w-full sm:w-[70vw] md:w-[75vw] lg:w-[80vw] h-full flex flex-col">
            <div class="w-full h-full  flex items-center justify-center bg-gray-300" style="background-image: url('bg.png'); background-size: cover; background-position: center;">
                <div class="w-full h-full mx-2 sm:mx-4 md:mx-6 lg:mx-8 rounded-lg shadow-lg overflow-hidden">
                    <!-- Profile -->
                    <div class="mx-auto py-4 sm:py-6 lg:py-8 max-w-full">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4 sm:p-6 border-b border-gray-700">
                                <div class="mt-2 flex flex-col items-center justify-center sm:flex-row sm:items-start sm:justify-between">
                                    <div class="flex items-center mb-4 sm:mb-0">
                                        <img class="h-16 w-16 object-cover rounded-full border-2 border-gray-600" src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>" alt="">
                                        <div class="ml-2 sm:ml-4">
                                            <div id="profileName" class="text-lg font-semibold text-white"><?= $user->getName() ?></div>
                                            <div id="profileEmail" class="text-sm text-white"><?= $user->getEmail() ?></div>
                                        </div>
                                    </div>
                                    <div class="sm:absolute top-2 right-2">
                                        <button class="text-white font-bold rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-500 hover:text-white px-3 py-1 sm:px-4 sm:py-2 lg:px-6 lg:py-3 text-xs sm:text-sm" id="editProfileBtn">
                                            Edit Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Modal -->
                    <div id="editProfileModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
                        <div class="modal-content bg-white w-full sm:w-5/6 md:w-1/2 lg:w-1/3 xl:w-1/4 mx-auto mt-20 p-6 sm:p-8 rounded-lg shadow-lg">
                            <span id="closeEditProfileModalBtn" class="close absolute top-0 right-0 mt-4 mr-4 text-xl cursor-pointer">
                                &times;
                            </span>
                            <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

                            <!-- Profile Update Form -->
                            <form id="profileUpdateForm" method='POST' action='/paroly/public/profile/updateProfile' enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="newProfileImage">Upload file</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="newProfileImage" type="file" name="newProfileImage">
                                </div>
                                <div class="mb-4">
                                    <label for="newProfileName" class="text-gray-600">New User Name:</label>
                                    <input type="text" id="newProfileName" name="newProfileName" class="w-full px-4 py-2 border rounded" value="">
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-center">
                                    <button type="submit" id="saveProfileChangesBtn" class="bg-gray-500 text-white font-bold rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-600 px-4 py-2 mb-2 sm:mb-0">
                                        Save Changes
                                    </button>
                                    <button type="button" id="cancelEditProfileBtn" class="bg-gray-500 text-white font-bold rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-600 px-4 py-2">
                                        Cancel
                                    </button>
                                </div>
                            </form>

                            <!-- View all button -->
                            <div class="text-center mt-6">
                                <a href="#" class="text-xl font-bold text-gray-400 hover:text-gray-200">
                                    View all
                                </a>
                            </div>
                        </div>
                    </div>


                    <!-- Playlists section -->
                    <div class="px-2 sm:px-4 py-2 sm:py-4">
                        <div class="relative">
                            <h2 class="text-2xl font-bold mb-4 p-4 sm:p-10 text-white">My Playlists</h2>
                            <div class="absolute bottom-1 right-0 mx-auto flex gap-2 sm:gap-4">
                                <div class="w-auto h-auto">
                                    <div class="flex-1 h-full">
                                        <div class="flex items-center justify-end flex-1 h-full p-2 rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-500 hover:text-white">
                                            <button class="relative" id="addPlaylistBtnModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Playlist Modal -->
                            <div id="addPlaylistModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
                                <div class="modal-content bg-white w-full sm:w-5/6 md:w-1/2 lg:w-1/3 xl:w-1/4 mx-auto mt-20 p-6 sm:p-8 rounded-lg shadow-lg">
                                    <span id="closeAddPlaylistModalBtn" class="close absolute top-0 right-0 mt-4 mr-4 text-xl cursor-pointer">
                                        &times;
                                    </span>
                                    <h2 class="text-2xl font-bold mb-4">Add Playlist</h2>

                                    <!-- Playlist Name Form -->
                                    <form id="addPlaylistForm" method="post" action="">
                                        <div class="mb-4">
                                            <label for="playlistName" class="text-gray-600">Playlist Name:</label>
                                            <input type="text" id="playlistName" name="playlistName" class="w-full px-4 py-2 border rounded" required>
                                        </div>
                                        <input type="hidden" name="userId" value="1">

                                        <div class="flex flex-col sm:flex-row justify-between items-center">
                                            <button type="submit" name="submitAddPlaylist" class="bg-gray-500 text-white font-bold rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-600 px-4 py-2 mb-2 sm:mb-0">
                                                Add Playlist
                                            </button>
                                            <button type="button" id="cancelAddPlaylistBtn" class="bg-gray-500 text-white font-bold rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-600 px-4 py-2">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Playlist Section -->
                            <div class="absolute bottom-1 right-0 mx-auto flex gap-2 sm:gap-4">
                                <div class="w-auto h-auto">
                                    <div class="flex-1 h-full">
                                        <div class="flex items-center justify-end flex-1 h-full p-2 rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-500 hover:text-white">
                                            <button id="addPlaylistBtn" class="relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Playlist -->
                        <div class="flex flex-wrap justify-around gap-4 sm:gap-6 md:gap-8 lg:gap-10">
                            <?php foreach ($playlists as $playlist) : ?>
                                <a href="/paroly/public/Playlistcon/index/<?= $playlist->getId() ?>" class="card relative p-3 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 bg-slate-900 rounded-md hover:scale-105 duration-300 cursor-pointer hover:bg-slate-800">
                                    <!-- image (you can remove this part if not needed) -->
                                    <!-- <img src="playlist_image_url" alt="#" class="w-full h-auto object-cover rounded-full"> -->
                                    <img class="w-full h-auto object-cover rounded-full" src="/paroly/public/../assets/images/profile/<?= $user->getImage() ?>" alt="">

                                    <!-- play button  -->
                                    <div class="watch-button items-center absolute right-0 bottom-4 sm:bottom-6 lg:bottom-8">
                                        <div class="w-10 h-10 bg-green-500 rounded-full ring-1 ring-black grid place-items-center transition">
                                            <svg class="ml-1 w-3" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z" fill="black" />
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- playlist details -->
                                    <p class="text-xs sm:text-sm md:text-base font-semibold mt-2 text-white"><?= htmlspecialchars($playlist->getName()) ?></p>
                                </a>
                            <?php endforeach; ?>
                        </div>


                        <div class="mt-6 sm:mt-10 mx-auto">
                            <button type="button" class="py-2 px-4 sm:py-2.5 sm:px-5 mb-2 text-sm font-medium rounded-full border-2 border-gray-500 hover:border-gray-600 hover:bg-gray-500 text-white">
                                View All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script src="/paroly/public/../app/js/sidebar.js"></script>
    <script src="/paroly/public/../app/js/profile.js"></script>
</body>

</html>