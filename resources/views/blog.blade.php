@section('title', 'Rulfa Dev - Portfolio')
@extends('layouts.app')

@section('content')
    <div class="content max-w-10xl bg-white dark:bg-[#0A192F]">
        <!-- Start About Section -->
        <section id="about"
            class="container mx-auto h-screen animate-fade-in-up justify-center items-start flex flex-col gap-5">
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
                class="mt-6 text-xl inline-block bg-yellow-500 text-black px-6 py-3 duration-200 ease-in-out hover:-translate-1 hover:scale-105 btn hover:bg-black dark:hover:bg-white dark:hover:text-black hover:text-white shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover)">Contact
                me</a>
        </section>
        <!-- End About Section -->

        <!-- Start Project Github -->
        <section id="project" class="container mx-auto h-screen animate-fadeIn justify-center flex flex-col">
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
                    <div class="flex justify-center mt-6">
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
            class="container-fluid mx-auto h-screen animate-fadeIn justify-center flex flex-col bg-gray-50 dark:bg-[#020d1f]">
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
        <section id="experience" class="container-fluid mx-auto h-screen animate-fadeIn justify-center flex flex-col pt-20">
            <div
                class="dark:bg-black container mx-auto h-3/4 flex flex-col justify-center items-center shadow-(--box-shadow-blue) hover:shadow-(--box-shadow-red-hover) border-2 dark:border-white">
                <div class="mb-12 text-center">
                    <div class="flex flex-col items-center justify-center mb-4">
                        <div class="inline-flex items-center justify-center mb-2">
                            <div class="h-px w-8 bg-gradient-to-r from-transparent to-gray-700"></div>
                            <h2
                                class="text-4xl md:text-5xl font-bold tracking-[0.2em] dark:text-white inline-block uppercase px-3">
                                Experience</h2>
                            <div class="h-px w-8 bg-gradient-to-l from-transparent to-gray-700"></div>
                        </div>

                    </div>
                    <p class="text-gray-700 dark:text-gray-400 max-w-2xl mx-auto text-sm">Highlights of my journey in web
                        development,
                        including internships, freelance projects, and academic collaborations that
                        shaped my practical skills and understanding of the field.</p>
                </div>
                <div class="scroll-wrapper overflow-hidden w-full relative items-center flex flex-col h-1/5">
                    <div class="justify-center items-center h-full w-full">
                        <div class="content-scroll animate-scroll items-center justify-center mx-10 h-full">
                            <!-- isi konten di sini -->
                            <div class="flex items-center">
                                <div
                                    class="w-full h-full darl:bg-black border-2 shadow-[5px_5px_0_var(--color-blue)] hover:shadow-[7px_7px_0_var(--color-red)] border-zinc-600 flex flex-col p-3 z-30 relative bg-gray-900 dark:bg-white">
                                    <div class="flex flex-col space-y-3">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div class="border-2 bg-(--color-red) w-12 h-12">
                                                    <svg class="p-[5px] isolate" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 48 48">
                                                        <g fill="white">
                                                            <path d="M22.5 20.5V17h2v3.5H28v2h-3.5V26h-2v-3.5H19v-2z" />
                                                            <path fill-rule="evenodd"
                                                                d="M7.057 31.476A2 2 0 0 1 7 31V12a2 2 0 0 1 2-2h30a2 2 0 0 1 2 2v19c0 .244-.044.477-.123.693l3.111 4.76A1 1 0 0 1 43.151 38H4.8a1 1 0 0 1-.849-1.528zM9 12h30v19H9z"
                                                                clip-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col justify-start items-start">
                                                    <div class="text-white dark:text-black font-medium">Cipta Inovasi
                                                        Digital
                                                    </div>
                                                    <div class="text-gray-400 dark:text-gray-700 text-sm">Completed April
                                                        2020 - August 2020 |
                                                        Internship
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-gray-400 dark:text-gray-700 italic text-sm">React Native
                                                Developer
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center space-x-2 border-l-2 border-(--color-blue)/30 dark:border-(--color-red)/30 pl-3">
                                            <div class="text-(--color-blue) dark:text-(--color-red) text-sm italic">"I
                                                gained valuable experience
                                                through an internship at Cipta Inovasi Digital, a hybrid location-based
                                                company, where I
                                                worked as a React Native Developer in Batang, Central Java."</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-scroll animate-scroll items-center justify-center mx-10 h-full">
                            <!-- isi konten di sini -->
                            <div class="flex items-center">
                                <div
                                    class="w-full h-full darl:bg-black border-2 shadow-[5px_5px_0_var(--color-blue)] hover:shadow-[7px_7px_0_var(--color-red)] border-zinc-600 flex flex-col p-3 z-30 relative bg-gray-900 dark:bg-white">
                                    <div class="flex flex-col space-y-3">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div class="border-2 bg-(--color-red) w-12 h-12">
                                                    <svg class="p-[5px] isolate" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 48 48">
                                                        <g fill="white">
                                                            <path d="M22.5 20.5V17h2v3.5H28v2h-3.5V26h-2v-3.5H19v-2z" />
                                                            <path fill-rule="evenodd"
                                                                d="M7.057 31.476A2 2 0 0 1 7 31V12a2 2 0 0 1 2-2h30a2 2 0 0 1 2 2v19c0 .244-.044.477-.123.693l3.111 4.76A1 1 0 0 1 43.151 38H4.8a1 1 0 0 1-.849-1.528zM9 12h30v19H9z"
                                                                clip-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="flex flex-col justify-start items-start">
                                                    <div class="text-white dark:text-black font-medium">Belitik ID
                                                    </div>
                                                    <div class="text-gray-400 dark:text-gray-700 text-sm">On Going January
                                                        2025 - Now |
                                                        Self-employed
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-gray-400 dark:text-gray-700italic text-sm">Founder
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center space-x-2 border-(--color-blue)/30 dark:border-(--color-red)/30 pl-3">
                                            <div class="text-(--color-blue) dark:text-(--color-red) text-sm italic">"The
                                                company that I built and is
                                                currently being developed with the core team, where this project will be
                                                completed in
                                                2026."</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Experience -->

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
    </div>
@endsection