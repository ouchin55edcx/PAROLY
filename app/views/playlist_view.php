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


        <div class="w-full sm:w-[70vw] md:w-[75vw] lg:w-[80vw] h-full flex flex-col">
            <div class="bg-gray-300 text-gray-300 min-h-screen p-10">

                <!-- header -->
                <div class="flex gap-10">
                    <img class="mr-6 rounded-full" src="https://placekitten.com/g/200/200">
                    <div class="flex flex-col justify-center">
                        <!-- content -->
                        <h4 class="mt-0 mb-2 uppercase text-black tracking-widest text-2xl">Playlist</h4>
                    </div>
                </div>

                <!-- action buttons -->
                <div class="mt-6 flex justify-between">
                    <div class="">
                        <a href="#" class="w-12 h-12 bg-green-500 rounded-full ring-1 ring-black grid place-items-center transition">
                            <svg class="ml-1 w-4" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 7.26795C16.3333 8.03775 16.3333 9.96225 15 10.7321L3 17.6603C1.66667 18.4301 1.01267e-06 17.4678 1.07997e-06 15.9282L1.68565e-06 2.0718C1.75295e-06 0.532196 1.66667 -0.430054 3 0.339746L15 7.26795Z" fill="black" />
                            </svg>
                        </a>
                    </div>
                    <div class="text-gray-600 text-sm tracking-widest text-right">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                            Flowed
                        </button>
                    </div>
                </div>



                <!-- musicId	musicName	musicImage	musicDate	userId	genreId	 -->


                <!-- song list   -->
                <div class="mt-10">
                    <div class="mt-10">
                        <div class="mt-10">
                            <table class="w-full border-collapse border">
                                <!-- song list header -->
                                <thead>
                                    <tr class="bg-gradient-to-r from-green-400 to-blue-500 text-white">
                                        <th class="py-2 px-4">#</th>
                                        <th class="py-2 px-4">Title</th>
                                        <th class="py-2 px-4">Artist</th>
                                        <th class="py-2 px-4">Date</th>
                                        <th class="py-2 px-4">Genre</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="hover:bg-gray-100">
                                        <td class="py-2 px-4 text-gray-700">1</td>
                                        <td class="py-2 px-4 text-gray-900">musicName</td>
                                        <td class="py-2 px-4 text-gray-900">musicArtist</td>
                                        <td class="py-2 px-4 text-gray-900">musicDate</td>
                                        <td class="py-2 px-4 text-gray-900">musicGenre</td>
                                    </tr>

                                    <tr class="hover:bg-gray-100">
                                        <td class="py-2 px-4 text-gray-700">2</td>
                                        <td class="py-2 px-4 text-gray-900">musicName</td>
                                        <td class="py-2 px-4 text-gray-900">musicArtist</td>
                                        <td class="py-2 px-4 text-gray-900">musicDate</td>
                                        <td class="py-2 px-4 text-gray-900">musicGenre</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
</body>

</html>