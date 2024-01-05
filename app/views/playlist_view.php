<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . '/../components/head.html') ?>
    <title>PAROLY | Playlist</title>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="flex h-screen">
        <div class="w-0 sm:w-[30vw] md:w-[25vw] lg:w-[18vw]">
            <?php require_once(__DIR__ . '/../components/sidebar.php') ?>
        </div>

        <div class="w-full sm:w-[70vw] md:w-[75vw] lg:w-[82vw] h-full flex flex-col">
            <div class="bg-gray-900 text-white min-h-screen p-10 md:rounded-tl-md md:rounded-bl-md shadow-lg">

                <!-- Header -->
                <div class="flex items-center gap-4">
                    <img class="w-16 h-16 rounded-full" src="https://placekitten.com/g/200/200" alt="Profile Image">
                    <div>
                        <h4 class="mt-0 mb-2 uppercase text-white tracking-widest text-2xl">Playlist</h4>
                        <p class="text-gray-500 text-sm">Welcome, User!</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-between items-center">
                    <a href="#" class="w-12 h-12 bg-green-500 rounded-full ring-1 ring-black grid place-items-center transition">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z" fill="white" />
                        </svg>
                    </a>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                        Followed
                    </button>
                </div>

                <!-- Music List -->
                <div class="mt-8 overflow-auto">
                    <?php foreach ($data['musics'] as $index => $music) { ?>
                        <div class="flex items-center justify-between mb-4 border-b pb-4 hover:bg-gray-800 transition duration-300 ease-in-out">
                            <img src="/paroly/public/../assets/images/music/<?= $music[0]->musicImage ?>" class="object-contain h-16 w-16 rounded" alt="Music Image">
                            <div class="ml-4 flex-grow">
                                <p class="text-lg font-semibold"><?= $music[0]->musicName ?></p>
                                <p class="text-sm text-gray-500"><?= $music[0]->musicDate ?></p>
                                <p class="text-sm text-gray-500"><?= $music[0]->genreName ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script src="/paroly/public/../app/js/sidebar.js"></script>
</body>

</html>