<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.rtl.min.css') }}">
    <meta name="description" content="{{ $setting->title_header_home_page }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>{{ $setting->nom_app }} - Gérez votre propre service médical dans votre ville!</title>
    
</head>
<style>
    ul {
        list-style: none;
    }

    .pattern {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-image: url(./assets/icons/wave.svg);
        background-repeat: repeat-x;
        background-position: bottom;
        background-size: 1000px 180px;
        height: 0;
        padding: 0;
        padding-bottom: 140px;
    }

    .pattern.bottom {
        bottom: -10px;
        transform: rotate(180deg);
    }

    @media (max-width: 991.98px) {
        .pattern {
            background-size: 700px 203px;
        }
    }

    /* .btn-commencer {
        color: #e02c37;
        transition: all 0.5s;
        font-weight: 500;
    }

    .btn-commencer:hover {
        background-color: white;
        color: #e02c37;
        font-weight: 500;
        transition: all 0.3s;
    } */
</style>

<body>
    <header class="fixed-top header">
        <ul style="align-items: center;"
            class="fw-semibold   text-white container-xl py-2 m-auto  row justify-content-between">
            <li class="col-6">
                <span class="fs-3 title font-bold">{{ $setting->nom_app }}</span>
            </li>

            <li class=" col-6 gap-2 flex justify-end items-center">
                <a href="{{ url('/connexion') }}" style="background-color: #3232a7;"
                    class="w-fit md:flex hidden font-medium px-4 bg-gradient-to-tr bg-violet-500 from-purple-400 border-none rounded-md text-white shadow hover:from-violet-800  btn  btn-sm">Se
                    connecter</a>
                <a href="{{ url('/inscription') }}"
                    class=" btn md:flex hidden btn-light font-medium px-4 border-violet-500  w-fit btn-sm  rounded-md border-2 border-violet-700">S'inscrire</a>
                <button>
                    <svg width="32px" height="32px" class="svg-menu stroke-white" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 6H20M7 12H17M9 18H15"  stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </button>
            </li>

        </ul>
    </header>
    <main>
        <section
            style=" background-color: #000091cd; justify-content: center; align-items: center; padding-top: 100px; position: relative;"
            class="section-header min-h-screen overflow-hidden pb-9 pt-9 d-flex pb-lg-12 text-white">
            <div style="position: relative; z-index: 2;" class="container-xl text-2xl p-4 text-center">
                <h1 class="font-bold">{{ $setting->nom_app }}</h1>
                <h1 class="align-middle mb-4">Devenez un héros du quotidien : <br> simulez une
                    intervention du SAMU
                </h1>
                {{-- <p>Testez vos réflexes et apprenez les gestes qui sauvent.</p> --}}
                <button
                    class="col btn bg-white text-stone-800 text-sm px-4 hover:font-medium hover:text-black mt-4">Comment
                    ça marche?</button>
            </div>
            <div class="pattern z-10 bottom">
            </div>
            <img src="./assets/images/3d-casual-life-doctors-in-white-coats.png"
                class="w-1/2 sm:w-auto opacity-30 lg:left-1/2 lg:top-1/2 m-auto lg:-translate-x-1/2 "
                style="position: absolute; z-index: 1; " alt="" srcset="">
            <img src="./assets/images/smart-first-aid-kit-thermometer-and-stethoscope-2.png" width="250"
                class="absolute opacity-30 right-5 bottom-4 hidden lg:block animate-pulse" alt=""
                srcset="">
            <img src="./assets/images/smart-magnifier.png"
                class="absolute opacity-30 left-1/2 bottom-4 hidden lg:block hidden  animate-pulse" width="250"
                alt="" srcset="">
            <img src="./assets/images/smart-icon-with-heart-and-pulse.png" alt=""
                class="absolute opacity-30 translate-y-1/2 hidden lg:block right-5 bottom-1/2  animate-pulse"
                width="250" srcset="">
        </section>
        <section class="container-xl p-5 m-auto  row" style="min-height: 40vh; ">
            <h2 class="text-2xl font-bold text-center text-violet-800 my-8">Avec {{ $setting->nom_app }} </h2>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-4 gap-4">
                <div class="border rounded-md p-4 flex justify-center items-center border-4">
                    <div>
                        <h3 class="text-violet-700 text-xl font-semibold text-center">Simuler des missions</h3>
                        <p class="p-4 text-center text-sm text-stone-500">Affecter des unités spécialisés aux missions
                            en fonction
                            de leurs compétences et de la situation
                        </p>
                    </div>
                </div>
                <div class="border rounded-md p-4 flex justify-center items-center border-4">
                    <div>
                        <h3 class="text-violet-700 text-xl font-semibold text-center">Gérer vos ressources</h3>
                        <p class="p-4 text-center text-sm text-stone-500"> Le joueur peut acheter de nouvelles unités,
                            des équipements, des améliorations pour ses bases
                        </p>
                    </div>
                </div>
                <div class="border rounded-md p-4 flex justify-center items-center border-4">
                    <div>
                        <h3 class="text-violet-700 text-xl font-semibold text-center">Inviter et jouer avec <br> vos
                            amis
                        </h3>
                        <p class="p-4 text-center text-sm text-stone-500">Affecter des unités spécialisés aux missions
                            en fonction
                            de leurs compétences et de la situation
                        </p>
                    </div>
                </div>
                <div class="border rounded-md p-4 flex justify-center items-center border-4">
                    <div>
                        <h3 class="text-violet-700 text-xl font-semibold text-center">Apprener le quotidien de héros de
                            la santé</h3>
                        <p class="p-4 text-center text-sm text-stone-500">Affecter des unités spécialisés aux missions
                            en fonction
                            de leurs compétences et de la situation
                        </p>
                    </div>
                </div>

            </div>
        </section>
        <section>
            <div class="container-xl p-5 sm:flex-row flex flex-col  m-auto  " >
                <div class="col  p-4 flex " style="justify-content: center; align-items: center;">
                    <div>
                        <p style="line-height: 2rem; font-size: 14px" >
                            Les professionnels de santé exigent des outils de formation performants et réalistes. Notre
                            plateforme
                            répond à vos attentes en vous offrant des simulations médicales de haute qualité, conçues en
                            collaboration avec des experts du domaine.
                            <br>
                            Complétez votre formation avec notre boutique en ligne, spécialisée dans les équipements de
                            réanimation
                            les plus récents et les plus performants.
                        </p>
                        <button class="col text-xs btn-sm mt-4 btn btn-primary">Commencer à jouer</button>
                    </div>
                </div>

                <div class="col max-w-96 max-h-96 w-full h-full" id="animation-container">
                    <!-- <img width="300" height="300" src="./assets/images/Animation - 1723983177531.gif" alt="" srcset=""> -->
                </div>
            </div>
        </section>
    </main>
    <footer style="min-height: 20vh; ">
        <div class="bg-light" style="height: 15vh; border-top: 0.5px dashed #87b7ff;">
            <div class="container-xl p-5 ">
                <div class="p-4">
                    <ul class="flex flex-row flex-wrap gap-2 p-0">
                        {{-- <li>Mentions légales</li> --}}
                        <li>
                            <a href="{{ url('/mentions-legales&GCV') }}">Mentions legales et GCV</a>
                        </li>
                        <li class="{{ url('/faq') }}">FAQ</li>
                    </ul>
                    <P class="pt-2">
                        © 2024 UrgenceSAMU
                    </P>

                </div>
            </div>
        </div>
        <!-- <div   style="height: 5vh; background-color: #0288d1;">

        </div> -->
        <!-- Illustration by <a href="https://icons8.com/illustrations/author/zD2oqC8lLBBA">Icons 8</a> from <a
            href="https://icons8.com/illustrations">Ouch!</a> -->
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>

<script>
    var animation = bodymovin.loadAnimation({

        container: document.getElementById('animation-container'),

        path: './assets/lottiesJson/1723983177531.json',

        renderer: 'svg',

        loop: true,

        autoplay: true,

        name: "Demo Animation",

    });
    const header = document.querySelector(".header");
    const title = document.querySelector('.title');
    const svgMenu = document.querySelector('.svg-menu');
    window.addEventListener("scroll", () => {
        const currentScroll = window.scrollY;
        if (header) {
            if (currentScroll > 100) {
                header.classList.add("shadow-md");
            } else {
                header.classList.remove("shadow-md");
            }

            if (currentScroll > 100) {
                header.classList.add("sticky");
                header.classList.add("bg-white");
                header.classList.remove("bg-background");
                title.classList.add('text-violet-700')
                title.classList.remove('text-white')
                svgMenu.classList.add('stroke-violet-700')
                svgMenu.classList.remove('stroke-white')
            } else {
                header.classList.remove("sticky");
                header.classList.add("bg-background");
                header.classList.remove("bg-white");
                title.classList.add('text-white')
                title.classList.remove('text-violet-700')
                svgMenu.classList.add('stroke-white')
                svgMenu.classList.remove('stroke-violet-700')
            }
        }
    })
</script>


</html>
