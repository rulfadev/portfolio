@section('title', 'Rulfa Dev - Portfolio')
@extends('layouts.app')

@section('content')
    <div class="content max-w-10xl bg-white dark:bg-[#0A192F]">
        <!-- Start About Section -->
        <section id="about" class="container px-10 mx-auto h-screen justify-center items-start flex flex-col gap-5">
            <p
                class="inline-block p-4 text-small font-bold dark:bg-transparent dark:text-white bg-white text-black brutal-transition shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2">
                <span class="mr-1 inline-block h-2 w-2 rounded-full bg-rose-500 justify-center"></span>
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
            <p class="dark:text-gray-300 text-gray-700 md:w-1/3 w-full">I am a passionate developer with expertise in
                building
                modern web
                applications. I love creating new
                things or improving
                existing ones. And can work both in a team and individually.</p>
            <a href="{{ route('card') }}"
                class="mt-6 text-xl inline-block bg-yellow-500 text-black px-6 py-3 duration-200 ease-in-out hover:-translate-1 hover:scale-105 btn hover:bg-black dark:hover:bg-white dark:hover:text-black hover:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">Contact
                me</a>
        </section>
        <!-- End About Section -->

        <!-- Start Project Github -->
        <section id="project" class="container px-10 mx-auto lg:h-screen justify-center flex flex-col">
            @if ($repositories && is_array($repositories))
                <div class="space-y-10">
                    <div class="text-start">
                        <h2 class="text-3xl font-bold tracking-tighter md:text-4xl text-black dark:text-white">Projects</h2>
                        <p class="text-gray-700 dark:text-gray-300">Check out my latest projects directly from GitHub</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($repositories as $repo)
                            <div
                                class="bg-white dark:bg-black p-6 flex flex-col duration-200 ease-in-out border-2 text-black dark:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">
                                <div class="mb-4">
                                    <h3 class="text-xl font-semibold text-black dark:text-white flex items-center gap-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-github h-5 w-5">
                                            <path
                                                d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                            </path>
                                            <path d="M9 18c-4.51 2-5-2-7-2"></path>
                                        </svg>{{ $repo['name'] }}
                                    </h3>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                                        {{ $repo['description'] ?? 'Tidak ada deskripsi.' }}
                                    </p>
                                </div>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach ($repo['topics'] as $topic)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">{{ $topic }}</span>
                                    @endforeach
                                </div>
                                <div class="flex flex-col justify-between mt-auto text-gray-400">
                                    <div class="flex items-start text-gray-700 dark:text-gray-300">
                                        <div class="flex items-center mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-star h-4 w-4 mr-1">
                                                <path
                                                    d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                                </path>
                                            </svg>{{ $repo['stargazers_count'] }}</div>
                                        <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                                            class="inline-flex items-center px-2.5 py-2 text-xs font-semibold  duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]"
                                            href="{{ $repo['html_url'] }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-github h-4 w-4 mr-2">
                                                <path
                                                    d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4">
                                                </path>
                                                <path d="M9 18c-4.51 2-5-2-7-2"></path>
                                            </svg>View on github</a>
                                        <span class="text-gray-700 dark:text-gray-300 text-sm">{{ $repo['language'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center my-10">
                        <a href="{{ url('/card') }}"
                            class="text-xs bg-yellow-500 text-black px-6 py-3 duration-200 ease-in-out hover:-translate-1 hover:scale-105 btn hover:bg-black dark:hover:bg-white dark:hover:text-black hover:text-white shadow-[4px_4px_0_var(--color-blue)] hover:shadow-[6px_6px_0_var(--color-red)]">See
                            All Project</a>
                    </div>
                </div>
            @endif
        </section>
        <!-- End Project Github -->

        <!-- Start Tech Stack -->
        <section id="techstack"
            class="container-fluid mx-auto h-screen justify-center flex flex-col bg-gray-50 dark:bg-[#020d1f]">
            <div class="container px-4 md:px-8 mx-auto space-y-10">
                <div class="text-start">
                    <h2 class="text-3xl font-bold tracking-tighter md:text-4xl text-black dark:text-white">Tech Stack</h2>
                    <p class="text-gray-700 dark:text-gray-300">Technologies and tools I work with</p>
                </div>
                <div class="grid gap-8 md:grid-cols-2">
                    <div
                        class="bg-white dark:bg-black p-6 flex flex-col duration-200 ease-in-out border-2 text-black dark:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">
                        <h3 class="text-xl font-semibold mb-4">Frontend</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">React</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Next.js</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">TailwindCSS</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Bootstrap</span>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-black p-6 flex flex-col duration-200 ease-in-out border-2 text-black dark:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">
                        <h3 class="text-xl font-semibold mb-4">Backend</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Node.js</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Laravel</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">MySQL</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Firebase</span>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-black p-6 flex flex-col duration-200 ease-in-out border-2 text-black dark:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">
                        <h3 class="text-xl font-semibold mb-4">DevOps</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Docker</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Git</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Nginx</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Firebase</span>
                        </div>
                    </div>
                    <div
                        class="bg-white dark:bg-black p-6 flex flex-col duration-200 ease-in-out border-2 text-black dark:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">
                        <h3 class="text-xl font-semibold mb-4">Tools</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">VS
                                Code</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Postman</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">Figma</span>
                            <span
                                class="border px-4 py-2 text-sm inline-flex items-centerfont-semibold duration-200 ease-in-out hover:-translate-1 hover:scale-105 border-2 text-black hover:text-white hover:border-transparent hover:bg-slate-800 dark:text-white hover:dark:bg-white dark:hover:text-black shadow-[3px_3px_0_var(--color-blue)] hover:shadow-[5px_5px_0_var(--color-red)]">GitHub</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Tech Stack -->

        <!-- Start Experience -->
        <section id="experience"
            class="container-fluid px-5 py-10 mx-auto h-full md:h-screen justify-center flex flex-col pt-20">
            <div
                class="mx-auto py-10 dark:bg-black container flex flex-col shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2 dark:border-white">
                <div class="flex flex-col items-center justify-center mb-4">
                    <div class="inline-flex items-center justify-center mb-2">
                        <div class="h-px w-8 bg-gradient-to-r from-transparent to-gray-700"></div>
                        <h2
                            class="text-4xl md:text-5xl font-bold tracking-[0.1em] dark:text-white inline-block uppercase px-3">
                            Experience</h2>
                        <div class="h-px w-8 bg-gradient-to-l from-transparent to-gray-700"></div>
                    </div>
                </div>
                <p class="text-gray-700 dark:text-gray-400 max-w-2xl mx-auto text-sm px-10 text-center">Highlights of my
                    journey in
                    web
                    development,
                    including internships, freelance projects, and academic collaborations that
                    shaped my practical skills and understanding of the field.</p>
                <ol
                    class="relative flex gap-8 before:absolute before:-mt-px before:h-0.5 before:w-full before:rounded-full before:bg-gray-200 dark:before:bg-gray-700 m-10">
                    <li class="relative -mt-1.5">
                        <span class="block size-3 rounded-full bg-blue-600"></span>

                        <div class="mt-4">
                            <time class="text-xs/none font-medium text-gray-700 dark:text-gray-200">Completed April
                                2020 - August 2020 |
                                Internship</time>

                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Cipta Inovasi
                                Digital | React Native
                                Developer</h3>

                            <p class="mt-0.5 text-sm text-gray-700 dark:text-gray-200">
                                "I
                                gained valuable experience
                                through an internship at Cipta Inovasi Digital, a hybrid location-based
                                company, where I
                                worked as a React Native Developer in Batang, Central Java."
                            </p>
                        </div>
                    </li>

                    <li class="relative -mt-1.5">
                        <span class="block size-3 rounded-full bg-blue-600"></span>

                        <div class="mt-4">
                            <time class="text-xs/none font-medium text-gray-700 dark:text-gray-200">On Going January
                                2025 - Now |
                                Self-employed</time>

                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Belitik ID | Founder</h3>

                            <p class="mt-0.5 text-sm text-gray-700 dark:text-gray-200">"The
                                company that I built and is
                                currently being developed with the core team, where this project will be
                                completed in
                                2026."
                            </p>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
        <!-- End Experience -->

        <!-- Start Contact Me -->
        <section id="contact" class="py-8 md:py-12 lg:py-16 bg-gray-50 dark:bg-[#020d1f]">
            <div class="container px-4 md:px-8 mx-auto">
                <div class="space-y-1 mb-6">
                    <h2 class="text-3xl font-bold tracking-tighter md:text-4xl dark:text-white">Get In Touch</h2>
                    <p class="text-gray-700 dark:text-gray-400">Feel free to reach out for collaborations or just a friendly
                        chat</p>
                </div>
                <div class="flex flex-col gap-4 md:flex-row"><a href="{{ route('card') }}"
                        class="text-center mt-6 text-xl inline-block bg-yellow-500 text-black px-6 py-3 duration-200 ease-in-out hover:-translate-1 hover:scale-105 btn hover:bg-black dark:hover:bg-white dark:hover:text-black hover:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">Contact
                        me</a></div>
            </div>
        </section>
        <!-- End Contact Me -->
    </div>
@endsection