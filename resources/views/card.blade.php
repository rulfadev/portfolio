<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rulfadev</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/welcome.css', 'resources/js/welcome.js'])
    @endif
</head>

<body class="dark:bg-gray-900 bg-gray-100 flex justify-center items-center min-h-screen width-full">
    <div class="max-w-sm sm:max-w-7xl mx-auto p-6 dark:bg-gray-800 bg-stone-50 rounded-lg flex-1">
        <div class="flex justify-between items-center border-b dark:border-white pb-6 mb-4">
            <div
                class="title border-3 dark:text-white border-black dark:border-white sm:text-2xl text-xs dark:bg-yellow-600 bg-yellow-400 rounded-full font-bold flex items-center drop-shadow-(--drop-shadow-light) dark:drop-shadow-(--drop-shadow-dark)">
                <i class="fa fa-rocket pr-2" aria-hidden="true"></i> Rulfa Dev
            </div>
            <h2 class="text-gray-500 dark:text-white text-lg">
                <div class="flex justify-center items-center space-x-1 sm:space-x-5 ">
                    <button onclick="(() => document.body.classList.toggle('dark'))()"
                        class="h-9 w-9 sm:h-12 sm:w-12 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="fill-violet-700 block dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg class="fill-yellow-500 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </h2>
        </div>
        <div class="grid grid-rows-1 grid-cols-5 border-b dark:border-white pb-6 mb-5">
            <div class="col-span-2 flex justify-center items-center">
                <div class="cards dark:text-white sm:space-y-6 w-full">
                    <div
                        class="card dark:bg-red-600 bg-red-400 py-3 border-3 dark:border-white drop-shadow-(--drop-shadow-light) dark:drop-shadow-(--drop-shadow-dark) w-5/6">
                        <p class="tip">Connect With Email</p>
                        <a href="javascript:void(0)" onclick="window.open('mailto:rulfadev@gmail.com')"
                            class="second-text m-1 sm:px-0 px-2">rulfadev@gmail.com</a>
                    </div>
                    <div
                        class="card dark:bg-yellow-600 bg-yellow-400 py-3 border-3 dark:border-white drop-shadow-(--drop-shadow-light) dark:drop-shadow-(--drop-shadow-dark) w-5/6">
                        <p class="tip">Connect With Whatsapp</p>
                        <a href="javascript:void(0)"
                            onclick="window.open('https://wa.me/6285213320894?text=Halo%20Kak%2C%20maaf%20ganggu%20waktunya.%20Saya%20%5Bnama%20anda%5D%20dari%20%5Bnama%20perusahaan%2Finstansi%5D.%0ASaat%20ini%20kami%20sedang%20membuka%20lowongan%20untuk%20posisi%20%5Bnama%20posisi%5D.%0AKalau%20Kakak%20tertarik%20atau%20ada%20teman%20yang%20mungkin%20cocok%2C%20boleh%20banget%20hubungi%20saya%20ya%20%F0%9F%98%8A', '_blank')"
                            class="second-text m-1 sm:px-0 px-2">Whatsapp +62 8521-3320-894</a>
                    </div>
                    <div
                        class="card dark:bg-green-600 bg-green-400 py-3 border-3 dark:border-white drop-shadow-(--drop-shadow-light) dark:drop-shadow-(--drop-shadow-dark) w-5/6">
                        <p class="tip">Connect With Social</p>
                        <ul class="flex justify-center items-center space-x-1 sm:space-x-5 ">
                            <li>
                                <a class="hover:text-blue-400" href="https://www.facebook.com/syahrulfalahbae">
                                    <svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 sm:w-10 sm:h-10">
                                        <path clip-rule="evenodd"
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="hover:text-red-400" href="https://www.instagram.com/syahrulfalahbae">
                                    <svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 sm:w-10 sm:h-10">
                                        <path clip-rule="evenodd"
                                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="hover:text-black" href="https://twitter.com/syahrulfalahbae">
                                    <svg aria-hidden="true" viewBox="0 0 30 30" fill="currentColor"
                                        class="w-5 h-5 sm:w-11 sm:h-11">
                                        <path
                                            d="M 6 4 C 4.895 4 4 4.895 4 6 L 4 24 C 4 25.105 4.895 26 6 26 L 24 26 C 25.105 26 26 25.105 26 24 L 26 6 C 26 4.895 25.105 4 24 4 L 6 4 z M 8.6484375 9 L 13.259766 9 L 15.951172 12.847656 L 19.28125 9 L 20.732422 9 L 16.603516 13.78125 L 21.654297 21 L 17.042969 21 L 14.056641 16.730469 L 10.369141 21 L 8.8945312 21 L 13.400391 15.794922 L 8.6484375 9 z M 10.878906 10.183594 L 17.632812 19.810547 L 19.421875 19.810547 L 12.666016 10.183594 L 10.878906 10.183594 z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="hover:text-blue-400" href="https://www.linkedin.com/in/syahrulfalahbae">
                                    <svg aria-hidden="true" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4 sm:w-9 sm:h-9">
                                        <path
                                            d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.28c-.97 0-1.75-.79-1.75-1.75s.78-1.75 1.75-1.75 1.75.79 1.75 1.75-.78 1.75-1.75 1.75zm13.5 11.28h-3v-5.6c0-1.34-.03-3.07-1.87-3.07-1.87 0-2.16 1.46-2.16 2.97v5.7h-3v-10h2.88v1.37h.04c.4-.75 1.38-1.54 2.84-1.54 3.04 0 3.6 2 3.6 4.6v5.57z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-3 flex justify-center items-center">
                <div
                    class="p-(--padding-portofolio) border-3 border-black dark:border-white w-5/6 h-full dark:bg-blue-600 bg-blue-400 dark:text-white overflow-hidden rounded-lg drop-shadow-(--drop-shadow-light) dark:drop-shadow-(--drop-shadow-dark)">
                    <span class="falling-textone falling-p text-3xl sm:text-6xl font-bold">P</span>
                    <span class="falling-textone falling-o text-3xl sm:text-6xl font-bold">O</span>
                    <span class="falling-textone falling-r text-3xl sm:text-6xl font-bold">R</span>
                    <span class="falling-textone falling-t text-3xl sm:text-6xl font-bold">T</span>
                    <span class="falling-textone falling-o2 text-3xl sm:text-6xl font-bold">O</span>
                    <span class="falling-textone falling-f text-3xl sm:text-6xl font-bold">F</span>
                    <span class="falling-textone falling-o3 text-3xl sm:text-6xl font-bold">O</span>
                    <span class="falling-textone falling-l text-3xl sm:text-6xl font-bold">L</span>
                    <span class="falling-textone falling-i text-3xl sm:text-6xl font-bold">I</span>
                    <span class="falling-textone falling-o4 text-3xl sm:text-6xl font-bold">O</span>
                </div>
            </div>
        </div>
        <div class="flex sm:justify-start justify-center space-x-4">
            <button class="jelajahi dark:bg-blue-600 bg-blue-400 items-center flex border-1 dark:border-white"
                onclick="window.location.href='{{ route('landing') }}'">
                <span
                    class="dark:bg-blue-600 bg-blue-400 dark:text-white font-bold flex items-center border-1 dark:border-white">
                    <p class="mr-2">Explore</p>
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13zm1.476 6.696l.817-.817A3 3 0 0 1 9.414 18h5.172a3 3 0 0 1 2.121.879l.817.817.982-1.8-1.1-1.04a2 2 0 0 1-.593-1.82c.124-.664.187-1.345.187-2.036 0-3.87-1.995-7.3-5-8.96C8.995 5.7 7 9.13 7 13c0 .691.063 1.372.187 2.037a2 2 0 0 1-.593 1.82l-1.1 1.039.982 1.8zM12 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                            fill="currentColor"></path>
                    </svg>
                </span>
            </button>
        </div>
    </div>
</body>

</html>