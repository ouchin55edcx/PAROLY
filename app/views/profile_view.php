<?php
$user = $data['user'];
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <style>
        .card:hover .watch-button {
            visibility: visible;
        }

        .watch-button {
            visibility: hidden;
            transition: all 0.3s ease;
        }
    </style>
</head>


<body>

    <section class=" flex" style="min-height: 716px; background-image: url('layout/img/bg6.png'); background-size: cover; background-position: center;">
        <!-- side bar  -->
        <div class="b">
            <dh-component>
                <div class="flex ">
                    <div style="min-height: 716px; background-image: url('layout/img/pexels-bryan-catota-3756766 1.png'); background-size: cover; background-position: center;" class="w-64 absolute sm:relative  shadow md:h-full flex-col justify-between hidden sm:flex">
                        <div class="px-8">


                            <!-- side bar title  -->
                            <div class="h-16 w-full flex items-center">

                                <h1 class="text-3xl font-bold  align-middle text-violet-600 cursor-pointer ">Profile
                                </h1>
                            </div>

                            <!-- side bar components  -->
                            <ul class="mt-12">
                                <!-- music  -->
                                <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-sm ml-2">Music</span>
                                    </a>

                                </li>

                                <!-- playlist  -->
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                            </path>
                                        </svg>
                                        <span class="text-sm ml-2">My PlayList</span>
                                    </a>
                                </li>
                                <!-- Profile  -->
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-sm ml-2">Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <!-- responsive side bar  -->
                    <div class="w-64 z-40 absolute shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" style=" background-image: url('./layout/img/a62e84842c55370aad057f0abe84e9c1.jpg'); background-size: cover; background-position: center;" id="mobile-nav" style="min-height: 716px; ">

                        <!-- side bar button  -->
                        <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10  absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded" onclick="sidebarHandler(true)">
                            <img src="img/la-musique.png" alt="">
                        </button>
                        <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>



                        <div class="px-8">
                            <!-- title  -->
                            <div class="h-16 w-full flex items-center">
                                <h1 class="text-3xl font-bold  align-middle text-white">Profile </h1>

                            </div>

                            <!-- side bar component  -->
                            <ul class="mt-12">
                                <!-- music  -->
                                <li class="flex w-full justify-between text-gray-300 hover:text-gray-500 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-sm ml-2">Music</span>
                                    </a>
                                </li>

                                <!-- My PlayList  -->
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                            </path>
                                        </svg>
                                        <span class="text-sm ml-2">My PlayList</span>
                                    </a>
                                </li>

                                <!-- profile  -->
                                <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                                    <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-sm ml-2">Profile </span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>

            </dh-component>
        </div>


        <div class="w-full ml-3 mr-3 flex items-center justify-center bg-black" style="background-image: url('bg.png'); background-size: cover; background-position: center;  ">
            <div class="w-full h-full mx-4 rounded-lg shadow-lg overflow-hidden">
                <!-- Profile -->

                <div class="mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-10 border-b border-gray-700">
                            <div class="mt-2 flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="h-16 w-16 rounded-full border-2 border-gray-600" src="/paroly/public/../assets/images/profile.png" alt="">
                                    <div class="ml-4">
                                        <div id="profileName" class="text-lg font-semibold text-white"><?= $user->getName() ?></div>
                                        <div id="profileEmail" class="text-sm text-white"><?= $user->getEmail() ?></div>
                                    </div>
                                </div>
                                <div class="absolute top-15 right-10">
                                    <button class="text-white font-bold rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 hover:text-white px-4 py-2" id="editProfileBtn">
                                        Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Edit Profile Modal -->
                <div id="editProfileModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
                    <div class="modal-content bg-white w-1/2 mx-auto mt-20 p-6 rounded-lg shadow-lg">
                        <span id="closeEditProfileModalBtn" class="close absolute top-0 right-0 mt-4 mr-4 text-xl cursor-pointer">
                            &times;
                        </span>
                        <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

                        <!-- Profile Update Form -->
                        <form id="profileUpdateForm">
                            <div class="mb-4">
                                <label for="newProfileImage" class="text-gray-600">New Profile Image URL:</label>
                                <input type="text" id="newProfileImage" name="newProfileImage" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <div class="mb-4">
                                <label for="newProfileName" class="text-gray-600">New User Name:</label>
                                <input type="text" id="newProfileName" name="newProfileName" class="w-full px-4 py-2 border rounded" required>
                            </div>
                            <button type="button" id="saveProfileChangesBtn" class="bg-yellow-500 text-white font-bold rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-600 px-4 py-2">
                                Save Changes
                            </button>
                            <button type="button" id="cancelEditProfileBtn" class="bg-yellow-500 text-white font-bold rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-600 px-4 py-2">
                                Cancel
                            </button>
                        </form>
                    </div>

                    <!-- View all button -->
                    <div class="text-center mt-6">
                        <a href="#" class="text-xl font-bold text-gray-400 hover:text-gray-200">
                            View all
                        </a>
                    </div>
                </div>
                <!-- Playlists section -->
                <div class="px-6 py-4">
                    <div class="relative">
                        <h2 class="text-2xl font-bold mb-4 p-10 text-white">My Playlists</h2>

                        <div class="absolute bottom-1 right-0 mx-auto flex gap-10 ">
                            <div class="w-auto h-auto">
                                <div class="flex-1 h-full">
                                    <!-- add playlist button  -->
                                    <div class="flex items-center justify-end flex-1 h-full p-2   rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 hover:text-white">
                                        <button class="relative" id="addPlaylistBtnModal"> <!-- Updated id here -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Add Playlist Popup -->
                        <div id="addPlaylistModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
                            <div class="modal-content bg-white w-1/2 mx-auto mt-20 p-6 rounded-lg shadow-lg">
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

                                    <button type="submit" name="submitAddPlaylist" class="bg-yellow-500 text-white font-bold rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-600 px-4 py-2">
                                        Add Playlist
                                    </button>
                                    <button type="button" id="cancelAddPlaylistBtn" class="bg-yellow-500 text-white font-bold rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-600 px-4 py-2">
                                        Cancel
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Playlist Section -->
                        <div class="absolute bottom-1 right-0 mx-auto flex gap-10">
                            <div class="w-auto h-auto">
                                <div class="flex-1 h-full">
                                    <!-- Add Playlist Button -->
                                    <div class="flex items-center justify-end flex-1 h-full p-2 rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 hover:text-white">
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


                    <!-- playlist  -->
                    <div class="flex flex-wrap justify-around gap-10">
                        <?php foreach ($playlists as $playlist) : ?>
                            <div class="card relative p-3 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 mb-4 bg-slate-900 rounded-md hover:scale-105 duration-300 cursor-pointer hover:bg-slate-800">
                                <!-- image (you can remove this part if not needed) -->
                                <!-- <img src="playlist_image_url" alt="#" class="w-full h-auto object-cover rounded-full"> -->
                                <img class="w-full h-auto object-cover rounded-full" src="<?php echo $user['userImage']; ?>" alt="<?php echo $user['userName']; ?>">

                                <!-- play button  -->
                                <div class="watch-button items-center absolute right-0 bottom-20">
                                    <a href="#" class="w-12 h-12 bg-green-500 rounded-full ring-1 ring-black grid place-items-center transition">
                                        <svg class="ml-1 w-4" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z" fill="black" />
                                        </svg>
                                    </a>
                                </div>

                                <!-- playlist details -->
                                <p class="text-sm font-semibold mt-2 text-white"><?= htmlspecialchars($playlist['playlistName']) ?></p>
                                <!-- You can add additional details or remove unnecessary details as needed -->

                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-20 ml-[45%]">
                        <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium rounded-full border-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 text-white  ">View
                            All </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-260px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-260px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }


        document.addEventListener("DOMContentLoaded", function() {
            // Get modal elements
            const addPlaylistModal = document.getElementById("addPlaylistModal");
            const editProfileModal = document.getElementById("editProfileModal");

            // Get button elements
            const addPlaylistBtn = document.getElementById("addPlaylistBtn");
            const editProfileBtn = document.getElementById("editProfileBtn");

            // Get close button elements
            const closeAddPlaylistModalBtn = document.getElementById("closeAddPlaylistModalBtn");
            const closeEditProfileModalBtn = document.getElementById("closeEditProfileModalBtn");

            // Get form elements
            const addPlaylistForm = document.getElementById("addPlaylistForm");
            const profileUpdateForm = document.getElementById("profileUpdateForm");

            // Add event listeners to open modals
            addPlaylistBtn.addEventListener("click", function() {
                addPlaylistModal.style.display = "block";
            });

            editProfileBtn.addEventListener("click", function() {
                editProfileModal.style.display = "block";
            });

            // Add event listeners to close modals
            closeAddPlaylistModalBtn.addEventListener("click", function() {
                addPlaylistModal.style.display = "none";
            });

            closeEditProfileModalBtn.addEventListener("click", function() {
                editProfileModal.style.display = "none";
            });

            // Add event listener to submit playlist form
            document.getElementById("submitAddPlaylist").addEventListener("click", function() {
                // Your logic to handle playlist submission goes here
                addPlaylistModal.style.display = "none";
            });

            // Add event listener to save profile changes
            document.getElementById("saveProfileChangesBtn").addEventListener("click", function() {
                // Your logic to handle profile changes goes here
                editProfileModal.style.display = "none";
            });

            // Add event listener to cancel add playlist
            document.getElementById("cancelAddPlaylistBtn").addEventListener("click", function() {
                addPlaylistModal.style.display = "none";
            });

            // Add event listener to cancel edit profile
            document.getElementById("cancelEditProfileBtn").addEventListener("click", function() {
                editProfileModal.style.display = "none";
            });

            // Close modal if user clicks outside the modal
            window.addEventListener("click", function(event) {
                if (event.target === addPlaylistModal) {
                    addPlaylistModal.style.display = "none";
                }

                if (event.target === editProfileModal) {
                    editProfileModal.style.display = "none";
                }
            });
        });
    </script>




    <script src="layout\profile.js"></script>
</body>

</html>