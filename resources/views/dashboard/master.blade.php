<!DOCTYPE html>
<html lang="fr">

<head>
    {{-- @php
        $favicon = \App\Models\Setting::find(1)->favicon;
    @endphp --}}
    <meta charset="utf-8">
    {{-- <link href="{{ $favicon ? url('images/upload/' . $favicon) : asset('/images/logo.png') }}" rel="icon"
        type="image/png"> --}}
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title') | UrgenceSAMU</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</head>
<style>
    /* *{
     font-family: cursive;
    } */
</style>

<body>
    <main class="overflow-hidden  relative bg-stone-800 h-full min-h-screen">
        <div class="relative z-10 overflow-hidden">
            <section class="grid grid-cols-5 bg-stone-800 overflow-hidden h-full  ">
                <section class="w-full col-span-4 h-full rounded-md  relative "
                    >
                    <div class="absolute w-full h-full top-0 left-0 bg-cover opacity-20 bg-no-repeat z-0" style="background-image: url({{ asset('assets/images/04.jpg') }})"></div>
                    @include('dashboard.layout.header')
                    <div class="flex text-sm border-y-2 px-2 relative z-10 border-y-white bg-stone-950 text-white gap-2">
                        <a href="{{ url('/dashboard') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full gap-2 text-sm flex items-center {{ $activePage == '/' ? 'bg-gradient-to-tr border-2 border-white via-indigo-500 to-indigo-500 from-indigo-700' : '' }} p-2  my-2 text-left transition-all rounded-sm cursor-pointer  hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500  ">
                                <svg width="24px" height="24px" viewBox="0 0 24 24"
                                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:cc="http://creativecommons.org/ns#"
                                    xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g transform="translate(0 -1028.4)">
                                            <path
                                                d="m12 1032.4c-3.0711 0-6.1569 1.1-8.5 3.5-3.3821 3.3-3.5 8.5-3.5 12.5h24c0-4-0.118-9.2-3.5-12.5-2.343-2.4-5.429-3.5-8.5-3.5z"
                                                fill="#1a7ebc"></path>
                                            <path
                                                d="m12 1035.4c-0.552 0-1 0.4-1 1 0 0.5 0.448 1 1 1s1-0.5 1-1c0-0.6-0.448-1-1-1zm5 1c-0.552 0-1 0.4-1 1 0 0.5 0.448 1 1 1s1-0.5 1-1c0-0.6-0.448-1-1-1zm-10 0c-0.5523 0-1 0.4-1 1 0 0.5 0.4477 1 1 1s1-0.5 1-1c0-0.6-0.4477-1-1-1zm13 3.8c-0.552 0-1 0.5-1 1 0 0.6 0.448 1 1 1s1-0.4 1-1c0-0.5-0.448-1-1-1zm-16 0.2c-0.5523 0-1 0.4-1 1 0 0.5 0.4477 1 1 1s1-0.5 1-1c0-0.6-0.4477-1-1-1zm-1 5c-0.5523 0-1 0.4-1 1 0 0.5 0.4477 1 1 1s1-0.5 1-1c0-0.6-0.4477-1-1-1zm18 0c-0.552 0-1 0.4-1 1 0 0.5 0.448 1 1 1s1-0.5 1-1c0-0.6-0.448-1-1-1z"
                                                fill="#161ba2"></path>
                                            <path
                                                d="m13 11.864c0 0.477-0.448 0.864-1 0.864s-1-0.387-1-0.864 0.448-0.864 1-0.864 1 0.387 1 0.864z"
                                                transform="matrix(1.4142 1.4142 -1.6366 1.6366 14.446 1009)"
                                                fill="#161ba2"></path>
                                            <path transform="matrix(.094524 .094524 -.60031 .60031 22.211 1031.9)"
                                                fill="#c0392b" d="m12 5.9419 7.481 12.957h-14.962z"></path>
                                            <path
                                                style="block-progression:tb;text-indent:0;color:#000000;text-transform:none"
                                                d="m19.759 1037.6a0.19843 1.2602 45 0 0 -0.044 0 0.19843 1.2602 45 0 0 -0.509 0.3l-7.999 6.7h0.067l-2.1217 2.1c-0.3906 0.4-0.3906 1.1 0 1.5 0.3905 0.4 1.0237 0.4 1.4137 0l2.122-2.2 0.088 0.1 6.674-8a0.19843 1.2602 45 0 0 0.331 -0.5 0.19843 1.2602 45 0 0 -0.022 0z"
                                                fill="#161ba2"></path>
                                            <path
                                                style="block-progression:tb;text-indent:0;color:#000000;text-transform:none"
                                                d="m19.778 1036.6a0.19843 1.2602 45 0 0 -0.044 0 0.19843 1.2602 45 0 0 -0.508 0.3l-7.999 6.7 0.066 0.1-2.1214 2.1c-0.3906 0.4-0.3906 1 0 1.4 0.3905 0.4 1.0234 0.4 1.4144 0l2.121-2.1 0.088 0.1 6.674-8a0.19843 1.2602 45 0 0 0.331 -0.6 0.19843 1.2602 45 0 0 -0.022 0z"
                                                fill="#c0392b"></path>
                                            <path
                                                d="m13 11.864c0 0.477-0.448 0.864-1 0.864s-1-0.387-1-0.864 0.448-0.864 1-0.864 1 0.387 1 0.864z"
                                                transform="matrix(1.4142 1.4142 -1.6366 1.6366 14.446 1008)"
                                                fill="#e74c3c"></path>
                                            <path d="m13 12c0 0.552-0.448 1-1 1s-1-0.448-1-1 0.448-1 1-1 1 0.448 1 1z"
                                                transform="matrix(.70711 .70711 -.70711 .70711 12 1027.4)"
                                                fill="#ecf0f1"></path>
                                            <path
                                                d="m12 6c-0.552 0-1 0.4477-1 1s0.448 1 1 1 1-0.4477 1-1-0.448-1-1-1zm5 1c-0.552 0-1 0.4477-1 1s0.448 1 1 1 1-0.4477 1-1-0.448-1-1-1zm-10 0c-0.5523 0-1 0.4477-1 1s0.4477 1 1 1 1-0.4477 1-1-0.4477-1-1-1zm13 3.844c-0.552 0-1 0.447-1 1 0 0.552 0.448 1 1 1s1-0.448 1-1c0-0.553-0.448-1-1-1zm-16 0.156c-0.5523 0-1 0.448-1 1s0.4477 1 1 1 1-0.448 1-1-0.4477-1-1-1zm-1 5c-0.5523 0-1 0.448-1 1s0.4477 1 1 1 1-0.448 1-1-0.4477-1-1-1zm18 0c-0.552 0-1 0.448-1 1s0.448 1 1 1 1-0.448 1-1-0.448-1-1-1z"
                                                transform="translate(0 1028.4)" fill="#ecf0f1"></path>
                                            <path
                                                d="m12 1032.4c-3.0711 0-6.1569 1.1-8.5 3.5-3.2299 3.2-3.4838 8-3.5 11.9 0.068809-3.7 0.54069-8 3.5-10.9 2.3431-2.4 5.4289-3.5 8.5-3.5 3.071 0 6.157 1.1 8.5 3.5 2.959 2.9 3.431 7.2 3.5 10.9-0.016-3.9-0.27-8.7-3.5-11.9-2.343-2.4-5.429-3.5-8.5-3.5z"
                                                fill="#161ba2"></path>
                                        </g>
                                    </g>
                                </svg>
                                Tableau de bord
                            </button>
                        </a>
                        <a href="{{ url('/dashboard/boutique') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2 gap-2 flex items-center my-2  {{ $activePage == 'boutique' ? 'bg-gradient-to-tr border-2 border-white via-indigo-500 to-indigo-500 from-indigo-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500 ">
                                <svg width="24px" height="24px" viewBox="0 0 48 48" version="1"
                                    xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 48 48" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <rect x="5" y="19" fill="#CFD8DC" width="38" height="19"></rect>
                                        <rect x="5" y="38" fill="#B0BEC5" width="38" height="4"></rect>
                                        <rect x="27" y="24" fill="#455A64" width="12" height="18"></rect>
                                        <rect x="9" y="24" fill="#E3F2FD" width="14" height="11"></rect>
                                        <rect x="10" y="25" fill="#1E88E5" width="12" height="9"></rect>
                                        <path fill="#90A4AE"
                                            d="M36.5,33.5c-0.3,0-0.5,0.2-0.5,0.5v2c0,0.3,0.2,0.5,0.5,0.5S37,36.3,37,36v-2C37,33.7,36.8,33.5,36.5,33.5z">
                                        </path>
                                        <g fill="#558B2F">
                                            <circle cx="24" cy="19" r="3"></circle>
                                            <circle cx="36" cy="19" r="3"></circle>
                                            <circle cx="12" cy="19" r="3"></circle>
                                        </g>
                                        <path fill="#7CB342" d="M40,6H8C6.9,6,6,6.9,6,8v3h36V8C42,6.9,41.1,6,40,6z">
                                        </path>
                                        <rect x="21" y="11" fill="#7CB342" width="6" height="8"></rect>
                                        <polygon fill="#7CB342" points="37,11 32,11 33,19 39,19"></polygon>
                                        <polygon fill="#7CB342" points="11,11 16,11 15,19 9,19"></polygon>
                                        <g fill="#FFA000">
                                            <circle cx="30" cy="19" r="3"></circle>
                                            <path d="M45,19c0,1.7-1.3,3-3,3s-3-1.3-3-3s1.3-3,3-3L45,19z"></path>
                                            <circle cx="18" cy="19" r="3"></circle>
                                            <path d="M3,19c0,1.7,1.3,3,3,3s3-1.3,3-3s-1.3-3-3-3L3,19z"></path>
                                        </g>
                                        <g fill="#FFC107">
                                            <polygon points="32,11 27,11 27,19 33,19"></polygon>
                                            <polygon points="42,11 37,11 39,19 45,19"></polygon>
                                            <polygon points="16,11 21,11 21,19 15,19"></polygon>
                                            <polygon points="6,11 11,11 9,19 3,19"></polygon>
                                        </g>
                                    </g>
                                </svg>
                                Boutique
                            </button>
                        </a>
                        <a href="{{ url('/dashboard/alliances') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2 gap-2 flex items-center my-2  {{ $activePage == 'clans' ? 'bg-gradient-to-tr border-2 via-indigo-500 to-indigo-500 from-indigo-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500 ">
                                <img src="{{ asset('/assets/images/clan-icon.svg') }}" alt="icon">
                                Alliance SAMU
                            </button>
                        </a>
                        <a href="{{ url('/dashboard/elements') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2  gap-2 flex items-center my-2  {{ $activePage == 'element' ? 'bg-gradient-to-tr border-2 via-indigo-500 to-indigo-500 from-indigo-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500 ">
                                <img src="{{ asset('/assets/images/personel.svg') }}" alt="icon">
                                Equipements et éléments
                            </button>
                        </a>

                        <a href="{{ url('/dashboard/classement') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2 gap-2 flex items-center my-2  {{ $activePage == 'classement' ? 'bg-gradient-to-tr border-2 via-indigo-500 to-indigo-500 from-indigo-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500 ">
                                <img src="{{ asset('/assets/images/ranking.svg') }}" alt="icon">
                                Classement
                            </button>
                        </a>
                        <a href="{{ url('/dashboard/statistique') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2 gap-2 flex items-center my-2  {{ $activePage == 'statistique' ? 'bg-gradient-to-tr border-2 via-indigo-500 to-indigo-500 from-indigo-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500 ">
                                <img src="{{ asset('/assets/images/stats.svg') }}" alt="icon">
                                Statistiques
                            </button>
                        </a>
                        <a href="{{ url('/dashboard/statistique') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2 gap-2 flex items-center my-2  {{ $activePage == 'statistique' ? 'bg-gradient-to-tr border-2 via-indigo-500 to-indigo-500 from-indigo-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-indigo-700 hover:bg-gradient-to-tr hover:via-indigo-500 hover:to-indigo-500 ">
                                <img width="24" height="24" src="{{ asset('assets/images/icons8-user-30.png')}}" alt=""
                                srcset="">
                                Profile
                            </button>
                        </a>
                        <a  href="{{ route('logoutUser') }}" class="hover:text-white  hover:no-underline">
                            <button
                                class="w-full p-2 gap-2 flex items-center my-2  {{ $activePage == 'statistique' ? 'bg-gradient-to-tr border-2 via-red-500 to-red-500 from-red-700' : '' }} text-left text-sm transition-all rounded-sm cursor-pointer hover:from-red-700 hover:bg-gradient-to-tr hover:via-red-500 hover:to-red-500 ">
                                <img src="{{ asset('/assets/images/poweroff.svg') }}" alt="icon">
                                Deconnexion
                            </button>
                        </a>

                    </div>
                    <div class=" border-t overflow-y-auto h-full relative z-20 border-t-stone-900 ">
                        @include('dashboard.layout.launcher-menu')
                        <div>
                            @yield('content')
                        </div>
                    </div>
                </section>
                <div
                    class="  col-span-1 border-2 border-white z-10 min-h-screen bg-stone-950 overflow-hidden  justify-center items-center  md:inset-0 ">
                    <div class="relative  rounded-sm ">
                        <div class="p-4 md:p-5 border-b-2 border-b-white rounded-t ">
                            <h3 class=" font-semibold text-center text-white uppercase ">
                                Chat générale
                            </h3>
                        </div>
                        <div class="  rounded-sm">
                            <div id="messagesContainer" style="max-height: 500px"
                                class="body-message  p-2 overflow-y-auto   bg-stone-800 text-white ">
                                <div class="chat-messages space-y-2 text-sm min-h-screen flex flex-col-reverse "
                                    id="MessageSentContent">
                                </div>
                            </div>
                            <div class="footer-messager bg-gray-900 p-4">
                                <form class="flex flex-col" id="chat-form" method="post">
                                    @csrf
                                    <textarea type="text" name="content" required id="message-input" class="form-control text-xs"
                                        placeholder="Votre message"></textarea>
                                    <button type="submit" class="btn btn-primary text-xs mt-1"
                                        id="chat-message-submit">
                                        <span>Envoyer</span>
                                    </button>
                                </form>
                            </div>
                            <form class="p-4">
                                <button type="submit" class="btn w-full py-3 btn-secondary text-xs mt-1"
                                    value="">Chat de groupe</button>
                            <form>
                            {{-- <form class="p-4">
                            <button type="submit" class="btn w-full btn-secondary text-xs mt-1"
                                value="">Chat de groupe</button>
                            <form> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    @include('dashboard.layout.footer')
</body>

</html>
