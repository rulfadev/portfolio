@extends('layouts.app')

@section('content')
    <div class="content max-w-10xl bg-white dark:bg-[#0A192F] pt-50">
        <!-- Start About Section -->
        <section id="about" class="container mx-auto animate-fade-in-up justify-center items-start flex flex-col gap-5">
            <p
                class="inline-block p-4 text-small font-bold dark:bg-transparent dark:text-white bg-white text-black brutal-transition shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2">
                <span class="mr-1 inline-block h-2 w-2 animate-pulse rounded-full bg-rose-500 justify-center"></span>
                Available for hire
            </p>
            <h1 class="text-4xl font-bold dark:text-white text-black mt-5">Syahrul Falah</h1>
            <p class="text-xl dark:text-gray-300 text-gray-700">Coding with purpose, building with passion.</p>
            <div class="flex flex-wrap gap-2">
                <div
                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">
                    React</div>
                <div
                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">
                    Next.js</div>
                <div
                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">
                    TypeScript</div>
                <div
                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">
                    Node.js</div>
                <div
                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">
                    UI/UX Design</div>
                <div
                    class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">
                    Tailwind CSS</div>
            </div>
            <p class="dark:text-gray-300 text-gray-700 w-1/3">I am a passionate developer with expertise in building
                modern web
                applications. I love creating new
                things or improving
                existing ones. And can work both in a team and individually.</p>
            <a href="{{ url('/card') }}"
                class="mt-6 text-1xl inline-block bg-yellow-500 text-black text-xl px-6 py-3 duration-200 ease-in-out hover:-translate-1 hover:scale-105 btn hover:bg-black dark:hover:bg-white dark:hover:text-black hover:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">Contact
                me</a>
        </section>
        <!-- End About Section -->

        <!-- Start Project Github -->
        <section id="projects" class="py-8 md:py-12 lg:py-16 animate-fadeIn">
            <div class="container-fluid px-4 md:px-8 mx-auto">
                @if ($repositories && is_array($repositories))
                    <div class="space-y-1 mb-6">
                        <h2 class="text-3xl font-bold tracking-tighter md:text-4xl text-white">Projects</h2>
                        <p class="text-gray-400">Check out my latest projects directly from GitHub</p>
                    </div>
                    <div class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($repositories as $repo)
                                <div class="bg-black rounded-lg p-6 flex flex-col">
                                    <div class="mb-4">
                                        <h3 class="text-xl font-semibold text-white flex items-center gap-2 mb-2"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-github h-5 w-5">
                                                <path
                                                    d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                                </path>
                                                <path d="M9 18c-4.51 2-5-2-7-2"></path>
                                            </svg>{{ $repo['name'] }}</h3>
                                        <p class="text-gray-400 text-sm">{{ $repo['description'] ?? 'Tidak ada deskripsi.' }}</p>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach ($repo['topics'] as $topic)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]">{{ $topic }}</span>
                                        @endforeach
                                    </div>
                                    <div class="flex flex-col justify-between mt-auto text-gray-400">
                                        <div class="flex items-start">
                                            <div class="flex items-center mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-star h-4 w-4 mr-1">
                                                    <path
                                                        d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                                    </path>
                                                </svg>{{ $repo['stargazers_count'] }}</div>
                                            <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-git-fork h-4 w-4 mr-1">
                                                    <circle cx="12" cy="18" r="3"></circle>
                                                    <circle cx="6" cy="6" r="3"></circle>
                                                    <circle cx="18" cy="6" r="3"></circle>
                                                    <path d="M18 9v2c0 .6-.4 1-1 1H7c-.6 0-1-.4-1-1V9"></path>
                                                    <path d="M12 12v3"></path>
                                                </svg>{{ $repo['forks_count'] }}</div>
                                        </div>
                                        <div class="flex flex-row justify-between items-center border-t border-gray-800 pt-4 mt-4">
                                            <a target="_blank" rel="noreferrer"
                                                class="inline-flex items-center px-2.5 py-2 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 text-white hover:dark:bg-white dark:hover:text-black shadow-[2px_2px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)]"
                                                href="{{ $repo['html_url'] }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-github h-4 w-4 mr-2">
                                                    <path
                                                        d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                                    </path>
                                                    <path d="M9 18c-4.51 2-5-2-7-2"></path>
                                                </svg>View on github</a>
                                            <span class="text-gray-400 text-sm">{{ $repo['language'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- End Project Github -->

        <!-- Start Project Section -->
        <section id="project" class="container sm:flex flex-col lg:flex-row space-y-5 lg:space-y-0 gap-20 mx-auto">
            <!-- Sidebar Kiri -->
            <div class="hidden lg:w-4/12 w-full sm:block">
                @if (!$popularArticles->isEmpty())
                    <div class="sticky top-30 flex flex-col">
                        <h1
                            class="text-2xl font-bold p-4 w-3/5 mx-auto mb-5 text-center dark:bg-transparent dark:text-white bg-white text-black brutal-transition shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2">
                            🚀 Popular
                            Project
                        </h1>
                        @foreach($popularArticles as $popularArticle)
                            <div class="flex w-full h-25 max-w-full mx-auto overflow-hidden cursor-pointer my-3 dark:bg-transparent bg-white brutal-transition shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2 dark:border-white"
                                onclick="window.location='{{ url('/articles/' . $popularArticle->slug) }}'">
                                <div class="text-sm p-5 flex flex-col justify-center w-full">
                                    <a href="{{ url('/articles/' . $popularArticle->slug) }}"
                                        class="dark:text-white text-black font-medium text-xl dark:hover:text-[#FF007A] hover:text-[#00E0FF] leading-none">
                                        {{ Str::limit($popularArticle->title, 40, '...') }}
                                    </a>
                                    <p class="mt-1 text-slate-500 dark:text-slate-300">
                                        {{ preg_replace('/\s+\S*$/', '', Str::limit(strip_tags($popularArticle->content), 70)) }}...
                                    </p>
                                    <a href="#"
                                        class="dark:text-white text-black dark:text-primary-dark hover:font-bold text-end">View
                                        Project →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- Artikel -->
            <div class="lg:w-8/12 w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                <!-- Artikel Pilihan -->
                @if($latestArticle)
                    <div class="col-span-2 w-full max-w-full mx-auto cursor-pointer brutal-transition shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2 dark:border-white"
                        onclick="window.location='{{ url('/articles/' . $latestArticle->slug) }}'">
                        <img class="h-90 w-full object-cover md:h-90 md:w-full mask-b-from-80%"
                            src="{{ url('/storage/' . $latestArticle->image) }}" alt="{{ $latestArticle->title }}">
                        <div class="p-8 flex flex-col justify-center">
                            <div
                                class="uppercase leading-6 tracking-wide text-sm text-[#00E0FF] dark:text-[#FF007A] font-semibold">
                                {{ $latestArticle->category->name ?? 'Uncategorized' }}
                            </div>
                            <a href="{{ url('/articles/' . $latestArticle->slug) }}"
                                class="block mt-1 text-lg leading-tight font-medium dark:text-white text-black leading-none">
                                {{ $latestArticle->title }}
                            </a>
                            <p class="mt-2 text-slate-500 dark:text-slate-300">
                                {{ preg_replace('/\s+\S*$/', '', Str::limit(strip_tags($latestArticle->content), 150)) }}...
                            </p>
                            <p class="mt-2 text-slate-400 dark:text-slate-200 text-sm">Published on
                                {{ $latestArticle->created_at->translatedFormat('l, j F Y | H:i') }}
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Artikel Lainnya -->
                @foreach($articlesProject as $article)
                    <div class="md:flex w-full col-span-2 md:col-span-1 md:h-30 max-w-full overflow-hidden cursor-pointer brutal-transition shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2 dark:border-white"
                        onclick="window.location='{{ url('/articles/' . $article->slug) }}'">
                        <div class="md:shrink-0">
                            <img class="h-90 w-full md:h-full md:w-30 object-cover mask-r-from-80%"
                                src="{{ url('/storage/' . $article->image) }}" alt="{{ $article->title }}">
                        </div>
                        <div class="p-3 flex flex-col justify-center">
                            <div
                                class="uppercase leading-6 tracking-wide text-sm text-[#00E0FF] dark:text-[#FF007A] font-semibold">
                                {{ $article->category->name ?? 'Uncategorized' }}
                            </div>
                            <a href="{{ url('/articles/' . $article->slug) }}"
                                class="mt-1 block text-md leading-tight font-medium dark:text-white text-black hover:text-[#00E0FF] leading-none">
                                {{ Str::limit($article->title, 40, '...') }}
                            </a>
                            <p class="text-slate-500 dark:text-slate-300">
                                {{ preg_replace('/\s+\S*$/', '', Str::limit(strip_tags($popularArticle->content), 30)) }}...
                            </p>
                            <p class="text-slate-400 text-xs">
                                {{ $article->created_at->translatedFormat('j M Y | H:i') }}
                            </p>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="col-span-2 w-full">
                    @if($articlesProject->isNotEmpty())
                        {{ $articlesProject->onEachSide(3)->links('vendor.pagination.brutalism') }}
                    @endif
                </div>
            </div>
        </section>
        <!-- End Project Section -->

        <!-- Porto section -->
        <section class="text-gray-600 body-font w-full bg-gray-50">
            <div class="container mx-auto flex px-5 my-10 py-10 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Before they sold out
                        <br class="hidden lg:inline-block">readymade gluten
                    </h1>
                    <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air
                        plant
                        cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken
                        authentic
                        tumeric truffaut hexagon try-hard chambray.</p>
                    <div class="flex justify-center">
                        <button
                            class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                        <button
                            class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                </div>
            </div>
        </section>
        <!-- Recent Article Categories -->
        <section class="container mx-auto">
            <!-- inspired by tailwindcss.com -->
            <ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
                @foreach($articles as $article)
                    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
                        <div class="order-1 sm:ml-6 xl:ml-0">
                            <h3 class="mb-1 text-slate-900 font-semibold">
                                <span
                                    class="uppercase mb-1 block text-sm leading-6 text-indigo-500">{{ $article->category->name ?? 'Uncategorized' }}</span>
                                {{ Str::limit($article->title, 40, '...') }}
                            </h3>
                            <div class="prose prose-slate prose-sm text-slate-600">
                                <p>{{ Str::limit(strip_tags($article->content), 100) }}</p>
                            </div><a
                                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 mt-6"
                                href="{{ url('/articles/' . $article->slug) }}">Read
                                more
                                <svg class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400" width="3"
                                    height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M0 0L3 3L0 6"></path>
                                </svg></a>
                        </div>
                        <img src="{{ url('/storage/' . $article->image) }}" alt="{{ $article->title }}"
                            class="mb-6 shadow-md rounded-lg bg-slate-50 h-90 w-full sm:min-w-50 sm:h-60 sm:mb-0 xl:mb-6 xl:w-full object-cover"
                            width="1216" height="640">
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- Join section -->
        <section class="container mx-auto relative z-10 overflow-hidden bg-green-600 my-10 py-16 px-8 rounded-lg shadow-lg">
            <div class="-mx-4 flex flex-wrap items-center">
                <div class="w-full px-4 lg:w-1/2">
                    <div class="text-center lg:text-left ">
                        <div class="mb-10 lg:mb-0 ">
                            <h1
                                class="mt-0 mb-3 text-3xl font-bold leading-tight sm:text-4xl sm:leading-tight md:text-[40px] md:leading-tight text-white ">
                                Join us to create your news.</h1>
                            <p
                                class="w-full text-base font-medium leading-relaxed sm:text-lg sm:leading-relaxed text-white">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="text-center lg:text-right"><a
                            class="font-semibold rounded-lg mx-auto inline-flex items-center justify-center bg-white py-4 px-9 hover:bg-opacity-90 hover:text-green-600 text-lg"
                            href="{{ url('/register') }}">Join Us</a>
                    </div>
                </div>
            </div>
            <span class="absolute top-0 right-0 -z-10">
                <svg width="388" height="250" viewBox="0 0 388 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.05" d="M203 -28.5L4.87819e-05 250.5L881.5 250.5L881.5 -28.5002L203 -28.5Z"
                        fill="url(#paint0_linear_971_6910)"></path>
                    <defs>
                        <linearGradient id="paint0_linear_971_6910" x1="60.5" y1="111" x2="287" y2="111"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.520507" stop-color="white"></stop>
                            <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg></span><span class="absolute top-0 right-0 -z-10"><svg width="324" height="250" viewBox="0 0 324 220"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.05" d="M203 -28.5L4.87819e-05 250.5L881.5 250.5L881.5 -28.5002L203 -28.5Z"
                        fill="url(#paint0_linear_971_6911)"></path>
                    <defs>
                        <linearGradient id="paint0_linear_971_6911" x1="60.5" y1="111" x2="287" y2="111"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0.520507" stop-color="white"></stop>
                            <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg></span><span class="absolute top-4 left-4 -z-10"><svg width="43" height="56" viewBox="0 0 43 56"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.5">
                        <circle cx="40.9984" cy="1.49626" r="1.49626" transform="rotate(90 40.9984 1.49626)" fill="white">
                        </circle>
                        <circle cx="27.8304" cy="1.49626" r="1.49626" transform="rotate(90 27.8304 1.49626)" fill="white">
                        </circle>
                        <circle cx="14.6644" cy="1.49626" r="1.49626" transform="rotate(90 14.6644 1.49626)" fill="white">
                        </circle>
                        <circle cx="1.49642" cy="1.49626" r="1.49626" transform="rotate(90 1.49642 1.49626)" fill="white">
                        </circle>
                        <circle cx="40.9984" cy="14.6642" r="1.49626" transform="rotate(90 40.9984 14.6642)" fill="white">
                        </circle>
                        <circle cx="27.8304" cy="14.6642" r="1.49626" transform="rotate(90 27.8304 14.6642)" fill="white">
                        </circle>
                        <circle cx="14.6644" cy="14.6642" r="1.49626" transform="rotate(90 14.6644 14.6642)" fill="white">
                        </circle>
                        <circle cx="1.49642" cy="14.6642" r="1.49626" transform="rotate(90 1.49642 14.6642)" fill="white">
                        </circle>
                        <circle cx="40.9984" cy="27.8302" r="1.49626" transform="rotate(90 40.9984 27.8302)" fill="white">
                        </circle>
                        <circle cx="27.8304" cy="27.8302" r="1.49626" transform="rotate(90 27.8304 27.8302)" fill="white">
                        </circle>
                        <circle cx="14.6644" cy="27.8302" r="1.49626" transform="rotate(90 14.6644 27.8302)" fill="white">
                        </circle>
                        <circle cx="1.49642" cy="27.8302" r="1.49626" transform="rotate(90 1.49642 27.8302)" fill="white">
                        </circle>
                        <circle cx="40.9984" cy="40.9982" r="1.49626" transform="rotate(90 40.9984 40.9982)" fill="white">
                        </circle>
                        <circle cx="27.8304" cy="40.9963" r="1.49626" transform="rotate(90 27.8304 40.9963)" fill="white">
                        </circle>
                        <circle cx="14.6644" cy="40.9982" r="1.49626" transform="rotate(90 14.6644 40.9982)" fill="white">
                        </circle>
                        <circle cx="1.49642" cy="40.9963" r="1.49626" transform="rotate(90 1.49642 40.9963)" fill="white">
                        </circle>
                        <circle cx="40.9984" cy="54.1642" r="1.49626" transform="rotate(90 40.9984 54.1642)" fill="white">
                        </circle>
                        <circle cx="27.8304" cy="54.1642" r="1.49626" transform="rotate(90 27.8304 54.1642)" fill="white">
                        </circle>
                        <circle cx="14.6644" cy="54.1642" r="1.49626" transform="rotate(90 14.6644 54.1642)" fill="white">
                        </circle>
                        <circle cx="1.49642" cy="54.1642" r="1.49626" transform="rotate(90 1.49642 54.1642)" fill="white">
                        </circle>
                    </g>
                </svg>
            </span>
        </section>
        <!-- Review section -->
        <section class="py-16 bg-gray-50">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="mb-12 text-center">
                    <h2 class="mb-4 text-3xl font-bold sm:text-4xl">
                        What Users Are Saying
                    </h2>
                    <p class="max-w-2xl mx-auto text-lg text-gray-600">
                        Hear from tools that have successfully listed on our platform
                    </p>
                </div>

                <!-- Testimonial Cards Grid -->
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Testimonial 1 -->
                    <div
                        class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/6.jpg"
                                    alt="Profile image" />
                            </div>
                            <div>
                                <h3 class="font-bold">SynthGen AI</h3>
                                <p class="text-sm text-gray-500">@synthgenai</p>
                            </div>
                            <div class="ml-auto">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700">Listing on EliteAI.tools gave us a 40% boost in signups! The quality of
                            traffic
                            is incredible - these are users who are actually looking for AI solutions. Worth every
                            penny!</p>
                        <div class="flex items-center mt-4 text-gray-500">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                </path>
                            </svg>
                            <span class="mr-4">143</span>
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                                </path>
                            </svg>
                            <span class="mr-4">24</span>
                            <span class="text-sm">3:42 PM · Feb 12, 2025</span>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div
                        class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/men/24.jpg"
                                    alt="Profile image" />
                            </div>
                            <div>
                                <h3 class="font-bold">NeuralScribe</h3>
                                <p class="text-sm text-gray-500">@neuralscribe</p>
                            </div>
                            <div class="ml-auto">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700">Fast-tracking our listing was the best marketing decision we made. Went
                            from
                            zero to 500+ daily users in just two weeks! EliteAI.tools put us in front of the perfect
                            audience.
                        </p>
                        <div class="flex items-center mt-4 text-gray-500">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                </path>
                            </svg>
                            <span class="mr-4">217</span>
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                                </path>
                            </svg>
                            <span class="mr-4">53</span>
                            <span class="text-sm">11:28 AM · Jan 29, 2025</span>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/men/54.jpg"
                                    alt="Profile image" />
                            </div>
                            <div>
                                <h3 class="font-bold">QuantumWrite</h3>
                                <p class="text-sm text-gray-500">@quantumwriteai</p>
                            </div>
                            <div class="ml-auto">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700">As a bootstrapped startup, we needed cost-effective promotion. The
                            Boosted plan
                            delivered incredible ROI - our demo requests increased 3x in the first month alone. Highly
                            recommend!</p>
                        <div class="flex items-center mt-4 text-gray-500">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                </path>
                            </svg>
                            <span class="mr-4">189</span>
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                                </path>
                            </svg>
                            <span class="mr-4">42</span>
                            <span class="text-sm">4:15 PM · Feb 3, 2025</span>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div
                        class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/53.jpg"
                                    alt="Profile image" />
                            </div>
                            <div>
                                <h3 class="font-bold">VoiceGenius</h3>
                                <p class="text-sm text-gray-500">@voicegeniusai</p>
                            </div>
                            <div class="ml-auto">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700">The SEO boost from being listed on EliteAI.tools is incredible. We've
                            climbed
                            to the first page for several key search terms. The quality of traffic converts at nearly 2x
                            our
                            other channels.</p>
                        <div class="flex items-center mt-4 text-gray-500">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                </path>
                            </svg>
                            <span class="mr-4">167</span>
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                                </path>
                            </svg>
                            <span class="mr-4">36</span>
                            <span class="text-sm">2:10 PM · Jan 18, 2025</span>
                        </div>
                    </div>

                    <!-- Testimonial 5 -->
                    <div
                        class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/43.jpg"
                                    alt="Profile image" />
                            </div>
                            <div>
                                <h3 class="font-bold">DataSage</h3>
                                <p class="text-sm text-gray-500">@datasageai</p>
                            </div>
                            <div class="ml-auto">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700">We tried several directories but EliteAI.tools stands out. The curation
                            process
                            means you're alongside other quality tools, which gives users confidence. Our conversions
                            are up 35%
                            from this traffic!</p>
                        <div class="flex items-center mt-4 text-gray-500">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                </path>
                            </svg>
                            <span class="mr-4">201</span>
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                                </path>
                            </svg>
                            <span class="mr-4">47</span>
                            <span class="text-sm">10:23 AM · Feb 8, 2025</span>
                        </div>
                    </div>

                    <!-- Testimonial 6 -->
                    <div
                        class="p-6 bg-white rounded-lg shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-start mb-4">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/men/62.jpg"
                                    alt="Profile image" />
                            </div>
                            <div>
                                <h3 class="font-bold">CopyMuse</h3>
                                <p class="text-sm text-gray-500">@copymuseai</p>
                            </div>
                            <div class="ml-auto">
                                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700">Investors actually mentioned seeing us on EliteAI.tools during our seed
                            round!
                            The directory has become a go-to resource for the industry. Still getting consistent traffic
                            6
                            months after listing.</p>
                        <div class="flex items-center mt-4 text-gray-500">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                </path>
                            </svg>
                            <span class="mr-4">175</span>
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3c-6.62-.1-10.38 2.421-13.05 6.03C7.29 12.61 6 17.331 6 22h2c0-1.007.07-2.012.19-3H12c4.1 0 7.48-3.082 7.94-7.054C22.79 10.147 23.17 6.359 23 3zm-7 8h-1.5v2H16c.63-.016 1.2-.08 1.72-.188C16.95 15.24 14.68 17 12 17H8.55c.57-2.512 1.57-4.851 3-6.78 2.16-2.912 5.29-4.911 9.45-5.187C20.95 8.079 19.9 11 16 11zM4 9V6H1V4h3V1h2v3h3v2H6v3H4z">
                                </path>
                            </svg>
                            <span class="mr-4">31</span>
                            <span class="text-sm">1:35 PM · Jan 22, 2025</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Team section -->
        <section class="py-20 px-4">
            <div class="container mx-auto max-w-7xl">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2
                        class="text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Meet Our Talented Team</h2>
                    <div class="h-1 w-20 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600 text-lg">We're a dynamic group of individuals who are passionate about what we
                        do
                        and dedicated to delivering the best results for our clients.</p>
                </div>

                <!-- Team Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Team Member 1 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">Alex Morgan</h3>
                            <p class="text-indigo-600 font-medium">CEO & Founder</p>
                            <p class="text-gray-600 mt-2">Visionary leader with 15+ years of experience in tech innovation.
                            </p>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">Sarah Johnson</h3>
                            <p class="text-indigo-600 font-medium">Chief Design Officer</p>
                            <p class="text-gray-600 mt-2">Award-winning designer with a passion for creating beautiful,
                                functional interfaces.</p>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">Michael Chen</h3>
                            <p class="text-indigo-600 font-medium">CTO</p>
                            <p class="text-gray-600 mt-2">Tech genius with expertise in AI and machine learning
                                technologies.
                            </p>
                        </div>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">Emily Rodriguez</h3>
                            <p class="text-indigo-600 font-medium">Marketing Director</p>
                            <p class="text-gray-600 mt-2">Creative strategist who excels at building and promoting brands.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                    <!-- Team Member 5 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">David Wilson</h3>
                            <p class="text-indigo-600 font-medium">Lead Developer</p>
                            <p class="text-gray-600 mt-2">Full-stack developer with a knack for solving complex problems.
                            </p>
                        </div>
                    </div>

                    <!-- Team Member 6 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1534751516642-a1af1ef26a56?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">Sophia Lee</h3>
                            <p class="text-indigo-600 font-medium">UX Researcher</p>
                            <p class="text-gray-600 mt-2">Human-centered designer focused on creating intuitive user
                                experiences.</p>
                        </div>
                    </div>

                    <!-- Team Member 7 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">James Taylor</h3>
                            <p class="text-indigo-600 font-medium">Product Manager</p>
                            <p class="text-gray-600 mt-2">Strategic thinker who bridges the gap between business and
                                technology.
                            </p>
                        </div>
                    </div>

                    <!-- Team Member 8 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            <img src="https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Team member"
                                class="w-full aspect-[3/4] object-cover object-center transform group-hover:scale-105 transition duration-300 ease-in-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-6">
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#"
                                        class="bg-white text-indigo-600 p-2 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-200">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-gray-800">Olivia Martinez</h3>
                            <p class="text-indigo-600 font-medium">Customer Success</p>
                            <p class="text-gray-600 mt-2">Dedicated to ensuring our clients achieve their goals and succeed.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Join Our Team CTA -->
                <div class="mt-20 text-center">
                    <div class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 p-px rounded-lg">
                        <a href="#"
                            class="block bg-white hover:bg-gray-50 transition-colors duration-200 rounded-lg px-8 py-4 font-medium text-indigo-600">
                            Join Our Team <span class="ml-2">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection