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
    <header class="fixed-top header shadow-md bg-white">
        <ul style="align-items: center;"
            class="fw-semibold   text-white container-xl py-4 m-auto  row justify-content-between">
            <li class="col-6">
                <span class="fs-3 title font-bold text-black">{{ $setting->nom_app }}</span>
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
                            <path d="M4 6H20M7 12H17M9 18H15" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </button>
            </li>

        </ul>
    </header>
    <main>
        <section class="min-h-screen py-20 container mx-auto">
            <h2 class="my-8 text-4xl ">{{ $setting->nom_app }} Mentions légales</h2>
            <p class="p-8">
                Le présent site web est la propriété de [Votre nom ou dénomination sociale], société par actions
                simplifiée au capital de [Montant], immatriculée au Registre du Commerce et des Sociétés de [Ville] sous
                le numéro [Numéro RCS], dont le siège social est situé [Adresse].
            </p>
            <p class="p-8">
                Directeur de la publication : [Votre nom]
                Hébergeur : [Nom de l'hébergeur], dont le siège social est situé [Adresse de l'hébergeur].

                Propriété intellectuelle : L'ensemble des éléments constituant le site (textes, images, logos, etc.)
                sont protégés par les lois de la propriété intellectuelle. Toute reproduction, représentation,
                modification, publication, adaptation totale ou partielle de l'un quelconque de ces éléments est
                strictement interdite sans l'autorisation écrite préalable de [Votre nom ou dénomination sociale].

                Données personnelles : Les données personnelles collectées sur ce site sont traitées conformément à
                notre politique de confidentialité.

                Liens hypertextes : Le site peut contenir des liens hypertextes vers d'autres sites web. Nous déclinons
                toute responsabilité quant au contenu de ces sites.

                Loi applicable : Les présentes mentions légales sont régies par le droit français. En cas de litige, les
                tribunaux de [Ville] seront seuls compétents.

                Exemple de CGU

                [Nom de votre site] – Conditions générales d'utilisation

                Les présentes Conditions Générales d'Utilisation (CGU) régissent l'accès et l'utilisation du site [Nom
                de votre site], édité par [Votre nom ou dénomination sociale].

                Objet : Le présent site a pour objet de [Indiquez l'objet de votre site].

                Accès au site : L'accès au site est libre et gratuit à tout utilisateur disposant d'un accès à internet.

                Responsabilité : [Votre nom ou dénomination sociale] ne saurait être tenu responsable de tout dommage
                direct ou indirect résultant de l'utilisation du site.

                Propriété intellectuelle : L'ensemble du contenu du site est protégé par les droits de propriété
                intellectuelle. Toute reproduction, représentation, modification, publication, adaptation totale ou
                partielle de l'un quelconque de ces éléments est strictement interdite sans l'autorisation écrite
                préalable de [Votre nom ou dénomination sociale].

                Données personnelles : Les données personnelles collectées sur ce site sont traitées conformément à
                notre politique de confidentialité.

                Liens hypertextes : Le site peut contenir des liens hypertextes vers d'autres sites web. Nous déclinons
                toute responsabilité quant au contenu de ces sites.

                Durée et résiliation : Les présentes CGU sont conclues pour une durée indéterminée. Elles peuvent être
                modifiées à tout moment par [Votre nom ou dénomination sociale].

                Loi applicable : Les présentes CGU sont régies par le droit français. En cas de litige, les tribunaux de
                [Ville] seront seuls compétents.
            </p>
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
                // header.classList.add("bg-white");
                // header.classList.remove("bg-background");
                // title.classList.add('text-violet-700')
                // title.classList.remove('text-white')
                // svgMenu.classList.add('stroke-violet-700')
                // svgMenu.classList.remove('stroke-white')
            } else {
                header.classList.remove("sticky");
                // header.classList.add("bg-background");
                // header.classList.remove("bg-white");
                // title.classList.add('text-white')
                // title.classList.remove('text-violet-700')
                // svgMenu.classList.add('stroke-white')
                // svgMenu.classList.remove('stroke-violet-700')
            }
        }
    })
</script>


</html>
