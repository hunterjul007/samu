@extends('dashboard.master', ['activePage' => 'game'])
@section('title', __('Jeu '))
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <div class="container-fluid relative bg-stone-800 px-8 py-8">
        <form id="alert-mission" method="POST" style="min-height: 150px; margin-bottom: 10px">
            @csrf
            <div id="card-mission" hidden style="display: flex;"
                class="alert rounded-xl bg-red-500 from-red-700 bg-gradient-to-tr py-2 w-full flex-row flex items-center justify-between px-4 text-sm border-l-8 border-2 border-white">
                <div
                    class="flex rounded-xl bg-white                                                                                                                                                                                                                                              p-4 backdrop-blur-sm items-center gap-8 flex-row">
                    <svg height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <polygon style="fill:#48317c;" points="290.714,468.61 221.291,468.61 256.003,390.508 ">
                                </polygon>
                                <g>
                                    <polygon style="fill:#7a4be7;"
                                        points="212.613,512 221.291,468.61 290.714,468.61 299.392,511.922 "></polygon>
                                    <path style="fill:#7a4be7;"
                                        d="M162.911,339.731l-2.369-1.293l-8.678,34.712l69.424,95.458L256,390.506 C219.5,390.506,186.55,369.956,162.911,339.731">
                                    </path>
                                    <path style="fill:#7a4be7;"
                                        d="M349.095,339.731c-23.639,30.225-56.589,50.775-93.089,50.775l34.712,78.102l69.424-95.458 l-8.678-34.712L349.095,339.731z">
                                    </path>
                                </g>
                                <g>
                                    <path style="fill:#5392d5;"
                                        d="M486.515,439.844c-47.833-25.175-93.227-44.336-135.055-49.334h-3.948l-56.797,78.102l8.678,43.312 h-3.254l0.009,0.078h211.517v-37.098C507.664,460.211,499.515,446.69,486.515,439.844">
                                    </path>
                                    <path style="fill:#5392d5;"
                                        d="M164.489,390.508h-3.948c-41.819,4.999-87.214,24.159-135.055,49.334 C12.495,446.69,4.337,460.21,4.337,474.902V512h208.271l8.678-43.39L164.489,390.508z">
                                    </path>
                                </g>
                                <path style="fill:#E6E7E8;"
                                    d="M412.206,164.881c-4.799,0-8.678-3.888-8.678-8.678c0-51.86-19.17-138.847-147.525-138.847 s-147.525,86.988-147.525,138.847c0,4.79-3.879,8.678-8.678,8.678c-4.799,0-8.678-3.888-8.678-8.678 C91.121,109.238,107.193,0,256.003,0s164.881,109.238,164.881,156.203C420.884,160.994,417.005,164.881,412.206,164.881">
                                </path>
                                <path style="fill:#FDC794;"
                                    d="M125.833,173.559c0-71.888,58.281-130.169,130.169-130.169s130.169,58.281,130.169,130.169v60.746 c0,76.678-58.281,156.203-130.169,156.203s-130.169-79.525-130.169-156.203V173.559z">
                                </path>
                                <path style="fill:#E6E7E8;"
                                    d="M264.681,338.441c-4.799,0-8.678-3.888-8.678-8.678s3.879-8.678,8.678-8.678 c122.03,0,138.847-29.193,138.847-60.746c0-4.79,3.879-8.678,8.678-8.678s8.678,3.888,8.678,8.678 C420.884,315.088,374.17,338.441,264.681,338.441">
                                </path>
                                <g>
                                    <path style="fill:#B0B6BB;"
                                        d="M106.308,260.339H93.291c-10.787,0-19.525-8.739-19.525-19.525v-65.085 c0-10.787,8.739-19.525,19.525-19.525h13.017c10.787,0,19.525,8.739,19.525,19.525v65.085 C125.833,251.6,117.094,260.339,106.308,260.339">
                                    </path>
                                    <path style="fill:#B0B6BB;"
                                        d="M405.698,260.339h13.017c10.787,0,19.525-8.739,19.525-19.525v-65.085 c0-10.787-8.739-19.525-19.525-19.525h-13.017c-10.787,0-19.525,8.739-19.525,19.525v65.085 C386.172,251.6,394.911,260.339,405.698,260.339">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <div class="text-black ">
                        <span class="font-bold text-black">Régulation SAMU:</span> <br>
                        <p>Bonjour, je suis Oliver de la régulation SAMU, nous avons une mission sur votre secteur:</p>
                        <span class="font-bold ">Message: </span>
                        <p id="mission-description"></p>
                    </div>
                </div>
                <div class="flex gap-1">
                    <input hidden id="mission_id" name="mission_id" />
                    <input hidden id="mission_position_x" />
                    <input hidden id="mission_position_y" name="mission_id" />
                    <button value type="button" id="accept-btn" name="show-modal-send-unite"
                        class="btn show-modal border border-orange-500 text-sm flex flex-row gap-2 items-center btn-light">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5894L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651C17.4841 19.0763 15.0313 19.0163 12.1374 17.3223L16.1007 13.359ZM10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.06761 6.88446 4.45582 8.9649 6.15176 11.5215L10.1907 7.48257Z"
                                    fill="#ff932e"></path>
                                <path opacity="0.6"
                                    d="M12.0627 11.4971C9.11695 8.56804 10.1836 7.48913 10.1903 7.48242L6.15137 11.5214C6.81756 12.5256 7.68554 13.6034 8.81497 14.7264C9.95468 15.8596 11.0755 16.7008 12.137 17.3222L16.1003 13.3589C16.1003 13.3589 15.0177 14.4353 12.0627 11.4971Z"
                                    fill="#ff932e"></path>
                            </g>
                        </svg>
                        <span>Envoyer unité</span></button>
                    <button type="button" name="waiter" id="waiter-btn" value="0"
                        class="btn bg-stone-200 flex flex-row gap-2 items-center add-mission-to-map text-sm btn-light">
                        <svg fill="#9c5ee8" width="20" height="20" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#9c5ee8">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>arrowdown</title>
                                <path
                                    d="M14.563 5.156h-6.719c-0.813 0-1.406 0.625-1.406 1.438v7.813h-5.313c-0.5 0-0.844 0.219-1.063 0.688-0.031 0.156-0.063 0.281-0.063 0.375 0 0.313 0.094 0.594 0.313 0.813l10.125 10.094c0.375 0.469 1.125 0.438 1.563 0l10.094-10.094c0.688-0.625 0.219-1.875-0.813-1.875h-5.344v-7.813c0-0.813-0.563-1.438-1.375-1.438z">
                                </path>
                            </g>
                        </svg>
                        <span>En attente</span></button>
                    <button type="button" name="reject" id="reject-btn" value="1"
                        class="btn reject-mission bg-red-500 border-black border flex flex-row gap-2 items-center text-sm btn-danger">
                        <svg fill="#ffffff" width="20" height="20" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd"
                                    d="M14.4267305,12.3239887 C13.8091494,12.1184418 12.9237465,12.0002 11.9967657,12 C11.0703845,11.9998001 10.1850309,12.1179592 9.56735459,12.323626 C9.29781857,12.4133731 9.10254274,12.5124903 8.99818889,12.5994146 L8.99818886,13.4997844 C8.99830883,14.0560874 8.98526108,14.3378275 8.91482312,14.6766528 C8.76529679,15.3959143 8.36503921,15.9530303 7.5979407,15.9971778 C5.57992549,16.3324217 4.23196922,16.5 3.49954722,16.5 C2.04222339,16.5 1,15.1968274 1,14 L1,12.5 C1,8.77610714 6.02664974,5.99871171 11.9971973,6.00000002 C17.9690798,6.00128863 22.993963,8.77688238 22.9935942,12.4728433 C22.9981103,12.6390833 23.0000363,12.8114009 22.9999995,13.0054528 C22.9999727,13.1468201 22.9992073,13.2587316 22.9969405,13.5090552 C22.9947039,13.7560368 22.993963,13.8651358 22.993963,14 C22.993963,15.1895648 21.9503425,16.5 20.4944157,16.5 C19.7626874,16.5 18.4165903,16.332739 16.4017544,15.9981299 C15.3495506,15.9554142 15.0603932,15.1844357 15.0052983,14.044091 C14.9974219,13.8810653 14.9958289,13.7545264 14.9957743,13.5011312 C14.9956956,12.9832104 14.9956891,12.9405386 14.9957547,12.5995238 C14.8913892,12.5126847 14.6961745,12.4136666 14.4267305,12.3239887 Z M6.99818889,13.5 L6.99818889,12.5 C6.99818889,10.7340787 9.20464625,9.99939745 11.9971973,10 C14.7913808,10.0006029 16.9957741,10.7342819 16.9957741,12.5 C16.9956885,12.9366661 16.9956885,12.9366661 16.995774,13.4997844 C16.995822,13.7225055 16.9971357,13.8268559 17.0029681,13.9475751 C17.0051195,13.992103 17.0078746,14.0335402 17.0110607,14.0715206 C18.7614943,14.3571487 19.9381265,14.5 20.4944157,14.5 C20.7329265,14.5 20.993963,14.1722263 20.993963,14 C20.993963,13.8570865 20.9947313,13.7439632 20.9970225,13.4909448 C20.9992358,13.2465315 20.9999742,13.1385601 20.9999995,13.0050735 C21.0000331,12.8280282 20.998305,12.6734088 20.993963,12.5 C20.993963,10.2010869 17.0111151,8.00108196 11.9967657,7.99999998 C6.98400975,7.99891833 3,10.2002196 3,12.5 L3,14 C3,14.1781726 3.2573842,14.5 3.49954722,14.5 C4.05591217,14.5 5.23278898,14.3571098 6.98361703,14.071404 C6.99451507,13.9374564 6.99824508,13.76066 6.99818889,13.5 Z">
                                </path>
                            </g>
                        </svg>
                        Refuser</button>
                </div>
            </div>
        </form>
        <div id="map"
            class="w-full shadow-2xl border-white shadow-black relative z-40  overflow-hidden border-4 rounded-xl"
            style="height: 500px"></div>
        <div class="mt-4">
            <div>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="mutedInput" class="sr-only peer">
                    <div
                        class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all  peer-checked:bg-blue-600">
                    </div>
                    <audio id="audio" muted hidden src="{{ asset('assets/son/warning.mp3') }}"></audio>
                    <span class="ms-3 text-sm font-medium text-gray-900 ">Desactiver le son</span>
                </label>
                {{-- <div class="inline-flex items-center gap-2">
                    <input type="range" min="5" max="30" value="15">
                    <label class="ms-3 text-sm font-medium text-gray-900 " for="">Zoom</label>
                </div> --}}
                <div class="inline-flex items-center gap-2">
                    <input id="volumeInput" type="range" min="0" max="100" value="50">
                    <label class="ms-3 text-sm  font-medium text-gray-900 " for="">Volume des
                        effects de son</label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="max-w-96 p-4">
                <div class=" overflow-x-auto">
                    <h2>Mes missions </h2>
                    <ol id="list-mission" style="list-style: none;" class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                        @foreach ($missionUser as $key => $item)
                            <li id="card-mission-item-{{$key}}">
                                <div class="w-full mb-1">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        {{ $item->nom_mission }}</div>
                                                    <div class="h5 mb-0 text-xs text-gray-500">Recompense:
                                                        {{ $item->recompense }} Pièces {{ $item->position_x }}
                                                        {{ $item->position_y }}

                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button name="show-modal-mission-user-{{ $key }}"
                                                        class="btn btn-primary show-modal getMissionMap text-xs">Envoyer
                                                        une
                                                        unité</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="show-modal-mission-user-{{ $key }}" hidden
                                    class=" overflow-y-auto expend-modal overflow-x-hidden bg-black/20 flex absolute top-0 left-0 left-0 z-50 justify-center items-center    w-full  h-full">
                                    <div class="relative p-4 max-w-6xl w-full ">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Traitement de l'appel
                                                </h3>
                                                <button type="button" name="show-modal-senid-unite"
                                                    class="end-2.5 text-gray-400 close-modal-button bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="mission-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <div class="block mb-2 text-gray-900">
                                                    <span class=" font-medium">Données de l'appel </span>
                                                    <ul class="text-sm data-mission p-2 border max-w-md">
                                                        <li class="flex justify-between items-center">
                                                            <span class=" font-medium">Nom de la victime</span>
                                                            <span id="name-patient"></span>
                                                        </li>
                                                        <li class="flex justify-between items-center">
                                                            <span class=" font-medium">Age de la victime</span>
                                                            <span id="age-patient"></span>
                                                        </li>
                                                        <li class="flex justify-between items-center">
                                                            <span class=" font-medium">Adresse </span>
                                                            <span id="adresse-incident"></span>
                                                        </li>
                                                        <li class="flex justify-between items-center">
                                                            <span class=" font-medium">Numéro de téléphone </span>
                                                            <span id="phone-patient"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <form id="missionStart" class="space-y-4 missionStart">
                                                    <input type="text" hidden value="{{ $item->position_x }}"
                                                        id="position_x_mission_{{ $key }}">
                                                    <input type="text" hidden value="{{ $item->position_y }}"
                                                        id="position_y_mission_{{ $key }}">
                                                    <input type="text" hidden value="{{ $item->id }}"
                                                        id="mission_user_id_{{ $key }}">
                                                    <input type="text" hidden value="{{ $item->personnel_id }}"
                                                        id="personnel_key_id_{{ $key }}">
                                                    <input type="text" hidden value="{{ $item->type_unite_id }}"
                                                        id="unite_key_id{{ $key }}">
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div class="mb-1">
                                                            <label for="base_id_mission_{{ $key }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900 ">
                                                                base</label>
                                                            <select id="base_id_mission_{{ $key }}" re
                                                                name="base_id_mission" required
                                                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                                                <option>Selectionner une base</option>
                                                                @foreach ($baseUser as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->nom_base }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="hopital_id_mission_{{ $key }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900 ">
                                                                Hopital</label>
                                                            <select id="hopital_id_mission_{{ $key }}"
                                                                name="hopital_id_mission" required
                                                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                                                <option>Selectionner un hopital</option>
                                                                @foreach ($hopitals as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->nom_hopital }}
                                                                        ({{ $item->capacite_hopital }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div class="mb-1">
                                                            <label for="unite_id_mission_{{ $key }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900 ">Mes
                                                                unités</label>
                                                            <select id="unite_id_mission_{{ $key }}"
                                                                name="unite_id_mission" required
                                                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                                                <option>Selectionner une unité pour la mission</option>
                                                                @foreach ($uniteUser as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->nom }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="personnel_id_mission_{{ $key }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900 ">Personnel</label>
                                                            <select id="personnel_id_mission_{{ $key }}"
                                                                name="personnel_id_mission" required
                                                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                                                <option>Selectionner un Personnel</option>
                                                                @foreach ($personnel as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->titre_personnel }}
                                                                        ({{ $item->quantite_personnel }})
                                                                        Niv {{ $item->niveau }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <button type="button" name="{{ $key }}"
                                                        class="w-full text-white startbtnmission bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Engager
                                                        {{ $key }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        <div id="show-modal-send-unite" hidden
            class=" overflow-y-auto expend-modal overflow-x-hidden bg-black/20 flex absolute top-0 left-0 left-0 z-50 justify-center items-center    w-full  h-full">
            <div class="relative p-4 max-w-6xl w-full ">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Traitement de l'appel
                        </h3>
                        <button type="button" name="show-modal-senid-unite"
                            class="end-2.5 text-gray-400 close-modal-button bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="mission-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <div class="block mb-2 text-gray-900">
                            <span class=" font-medium">Données de l'appel </span>
                            <ul class="text-sm data-mission p-2 border max-w-md">
                                <li class="flex justify-between items-center">
                                    <span class=" font-medium">Nom de la victime</span>
                                    <span id="name-patient"></span>
                                </li>
                                <li class="flex justify-between items-center">
                                    <span class=" font-medium">Age de la victime</span>
                                    <span id="age-patient"></span>
                                </li>
                                <li class="flex justify-between items-center">
                                    <span class=" font-medium">Adresse </span>
                                    <span id="adresse-incident"></span>
                                </li>
                                <li class="flex justify-between items-center">
                                    <span class=" font-medium">Numéro de téléphone </span>
                                    <span id="phone-patient"></span>
                                </li>
                            </ul>
                        </div>
                        <form id="acceptMission" class="space-y-4" action="#">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-1">
                                    <label for="mission_base_id" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        base</label>
                                    <select id="mission_base_id" re name="mission_base_id" required
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                        <option>Selectionner une base</option>
                                        @foreach ($baseUser as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom_base }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="mission_hopital_id" class="block mb-2 text-sm font-medium text-gray-900 ">
                                        Hopital</label>
                                    <select id="mission_hopital_id" name="mission_hopital_id" required
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                        <option>Selectionner un hopital</option>
                                        @foreach ($hopitals as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom_hopital }}
                                                ({{ $item->capacite_hopital }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-1">
                                    <label for="mission_unite_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Mes unités</label>
                                    <select id="mission_unite_id" name="mission_unite_id" required
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                        <option>Selectionner une unité pour la mission</option>
                                        @foreach ($uniteUser as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="mission_personnel_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Personnel</label>
                                    <select id="mission_personnel_id" name="mission_personnel_id" required
                                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                                        <option>Selectionner un Personnel</option>
                                        @foreach ($personnel as $item)
                                            <option value="{{ $item->id }}">{{ $item->titre_personnel }}
                                                ({{ $item->quantite_personnel }})
                                                Niv {{ $item->niveau }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Engager</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>


        <!-- Modal toggle -->
        {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Toggle modal
    </button> --}}

        <!-- Main modal -->

    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


    <script>
        // Initialisation de la map
        function getRandomArbitrary(min, max) {
            return Math.random() * (max - min) + min;
        }
        // var pointA = getRandomArbitrary(3.833119, 3.844119);
        // var map = L.map('map').setView([pointA, 11.501346], 13);
        const mutedInput = document.getElementById('mutedInput');
        mutedInput.addEventListener('change', (e) => {
            const audio = document.getElementById('audio')
            if (e.target.checked) {
                audio.play()
            } else {
                audio.pause();
                audio.currentTime = 0;
            }
        })

        const volumeInput = document.getElementById('volumeInput');
        volumeInput.addEventListener('change', (e) => {
            const audio = document.getElementById('audio')
            audio.volume = e.target.value / 100;
        })

        function getRandomIntInclusive(min, max) {
            const minCeiled = Math.ceil(min);
            const maxFloored = Math.floor(max);
            return Math.floor(Math.random() * (maxFloored - minCeiled + 1) +
                minCeiled); // The maximum is inclusive and the minimum is inclusive
        }
        // Page osm
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        // L.icon permet de créer un icon 
        // var map = L.map('map').setView([51.505, -0.09], 13);

        // Initialisation de la carte et du marqueur

        var map = L.map('map').setView([51.505, -0.09], 15);
        osm.addTo(map);
        let markeurs = [];
        var marker;

        // const addBaseButtonHandler = document.getElementById('add-base-map');
        // const removeHopitalButtonHandler = document.getElementById('remove-hopital-map');
        let baseCurrent = true;

        function routage(lat, lng, latF, vitesseUnite, lngF, marqueur, startIcon, endIcon, callback, last) {
            if (typeof callback !== 'function') {
                throw new Error('routage function requires a callback function as the last argument');
            }
            let v = vitesseUnite;
            if (vitesseUnite < 200) {
                v = vitesseUnite * 100
            }
            // console.log(lat, lng, latF, vitesseUnite, lngF, marqueur, startIcon, endIcon, callback, last)
            const r = L.Routing.control({
                waypoints: [
                    L.latLng(lat, lng),
                    L.latLng(latF, lngF),
                ],
                createMarker: function(i, waypoint) {
                    return L.marker(waypoint.latLng, {
                        icon: i === 0 ? startIcon : endIcon
                    });
                },
            }).on('routesfound', function(e) {
                const route = e.routes[0];
                const totalSteps = route.coordinates.length;
                let currentStep = 0; // 
                function animateRoute() {
                    if (currentStep < totalSteps) {
                        marqueur.setLatLng(route.coordinates[currentStep]);
                        currentStep++;
                        setTimeout(animateRoute, 250); // Adjust animation speed as needed
                    } else {
                        // Destination reached!
                       
                        callback(true, r); // Call the callback function with true
                    }
                }
                animateRoute();
            }).addTo(map)

        }
        $(document).ready(async function() {
            // const addHopitalButtonHandler = document.getElementById('add-hopital-map');
            // audioElement.play(); 

            $('.startbtnmission').on("click", async (e) => {
                // e.preventDefault()
                const name = e.target.name;
                const uniteId = $('#unite_id_mission_' + name).val();
                const baseId = $('#base_id_mission_' + name).val();
                const HopitaliId = $('#hopital_id_mission_' + name).val();
                const personnelKeyId = $('#personnel_key_id_' + name).val();
                const uniteKeyId = $('#unite_key_id' + name).val();
                const personnelIdMission = $('#personnel_id_mission_' + name).val()

                $('.expend-modal').attr('hidden', true)
                // $('#mission_base_id').val();
                const hopitalData = await fetch("/api/hopital/" + HopitaliId);
                let hopital = await hopitalData.json()
                hopital = hopital.response;
                const uniteUserData = await fetch("/api/unite-user/" + uniteId);
                let uniteUser = await uniteUserData.json()
                uniteUser = uniteUser.response;
                const uniteData = await fetch("/api/unite/" + uniteUser.unite_id);
                let unite = await uniteData.json()
                const baseData = await fetch("/api/base/" + baseId);
                let base = await baseData.json()
                base = base.response;
                var startIcon = L.icon({
                    iconUrl: window.location.origin + "/assets/images/point.svg",
                    iconSize: [10, 10],
                    iconAnchor: [20, 20],
                    popupAnchor: [-3, -76]
                });
                var endIcon = L.icon({
                    iconUrl: window.location.origin + "/assets/images/point.svg",
                    iconSize: [10, 10],
                    iconAnchor: [20, 20],
                    popupAnchor: [-3, -76]
                });
                var uniteIcon = L.icon({
                    iconUrl: window.location.origin + uniteUser.icon,
                    iconSize: [50, 50],
                    iconAnchor: [50, 50],
                    popupAnchor: [-3, -76]
                });
                var missionIcon = L.icon({
                    iconUrl: window.location.origin +
                        "/assets/images/point.svg",
                    iconSize: [10, 10],
                    iconAnchor: [50, 50],
                    popupAnchor: [-3, -76]
                })
                var marker = L.marker([base.position_x, base.position_y], {
                    icon: uniteIcon
                }).addTo(map)
                let routeingAisCompleted = false;
                let routeingBisCompleted = false;
                let routeingCisCompleted = false;
                var success = 1;
                
                // Ajouter des points au mission user de tel sorte que lorsque l'utilisateur renseigne 
                if (uniteKeyId == unite.response.type_unite_id && personnelKeyId ==
                    personnelIdMission) {
                    success = 2;
                }
                const myCallback = function(isDestinationReached, routing) {
                    if (isDestinationReached) {
                        console.log('You have arrived at your destination!');
                        routing.remove()
                        const token = "{{ csrf_token() }}";

                        $.ajax({
                            url: `/api/update-mission`, // Replace with the target API URL
                            type: 'POST',
                            data: {
                                "mission_user_id": parseInt($('#mission_user_id_' + name).val()),
                                "is_completed": success,
                                "etat": 1
                            },
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log('Data posted successfully:', response);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('Error posting data:', textStatus,
                                    errorThrown);
                                // Handle errors
                            }
                        });
                        setTimeout(() => {
                            routage($('#position_x_mission_' + name).val(), $(
                                    '#position_y_mission_' + name).val(), hopital
                                .position_x, uniteUser
                                .vitesse, hopital
                                .position_y, marker, missionIcon, endIcon,
                                myCallback1)
                        }, 1000);
                    }
                };
                const myCallback1 = function(isDestinationReached, routing) {
                    if (isDestinationReached) {
                        console.log('You have arrived at your destination!');
                        routing.remove()
                        $.ajax({
                            url: `/api/update-mission`, // Replace with the target API URL
                            type: 'POST',
                            data: {
                                "mission_user_id": parseInt($('#mission_user_id_' +
                                    name).val()),
                                "is_completed": success,
                                "etat": 2
                            },
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log('Data posted successfully:', response);

                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('Error posting data:', textStatus,
                                    errorThrown);
                                // Handle errors
                            }
                        });
                        setTimeout(() => {
                            routage(hopital.position_x, hopital.position_y, base
                                .position_x, uniteUser.vitesse, base.position_y,
                                marker,
                                startIcon, endIcon, myCallback2)
                        }, 1000);
                    }
                };

                const myCallback2 = function(isDestinationReached, routing) {
                    $('card-mission-item-' + name).hide()
                }
            
                routage(base.position_x, base.position_y, $('#position_x_mission_' + name).val(),
                    uniteUser
                    .vitesse, $('#position_y_mission_' + name).val(), marker,
                    startIcon, missionIcon,
                    myCallback, false)
            });

            // Accepter la mission, etat en cour de d'execution

            $("#acceptMission").on("submit", async (e) => {
                e.preventDefault()
                console.log($('#mission_id').val())
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: `/api/add-mission`, // Replace with the target API URL
                    type: 'POST',
                    data: {
                        "mission_id": $('#mission_id').val(),
                        "position_x": $('#mission_position_x').val(),
                        "position_y": $('#mission_position_y').val(),
                        "etat": "1",
                        "icon": "/assets/images/mission-icon.png"
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Data posted successfully:', response);
                        if (response.message) {
                            reloadCardMission()
                        }
                        // Process the response data
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error posting data:', textStatus, errorThrown);
                        // Handle errors
                    }
                });
                // throw new Error('routage function requires a callback function as the last argument');
                const uniteId = $('#mission_unite_id').val();
                const baseId = $('#mission_base_id').val();
                const HopitaliId = $('#mission_hopital_id').val();
                $('.expend-modal').attr('hidden', true)
                // $('#mission_base_id').val();
                const hopitalData = await fetch("/api/hopital/" + HopitaliId);
                let hopital = await hopitalData.json()
                hopital = hopital.response;
                const uniteData = await fetch("/api/unite-user/" + uniteId);
                let uniteUser = await uniteData.json()
                uniteUser = uniteUser.response;
                const baseData = await fetch("/api/base/" + baseId);
                let base = await baseData.json()
                base = base.response;
                var startIcon = L.icon({
                    iconUrl: window.location.origin + "/assets/images/point.svg",
                    iconSize: [10, 10],
                    iconAnchor: [20, 20],
                    popupAnchor: [-3, -76]
                });
                var endIcon = L.icon({
                    iconUrl: window.location.origin + "/assets/images/point.svg",
                    iconSize: [10, 10],
                    iconAnchor: [20, 20],
                    popupAnchor: [-3, -76]
                });
                var uniteIcon = L.icon({
                    iconUrl: window.location.origin + uniteUser.icon,
                    iconSize: [50, 50],
                    iconAnchor: [50, 50],
                    popupAnchor: [-3, -76]
                });
                var missionIcon = L.icon({
                    iconUrl: window.location.origin +
                        "/assets/images/mission-icon.svg",
                    iconSize: [25, 25],
                    iconAnchor: [50, 50],
                    popupAnchor: [-3, -76]
                });
                var marker = L.marker([base.position_x, base.position_y], {
                    icon: uniteIcon
                }).addTo(map)
                let routeingAisCompleted = false;
                let routeingBisCompleted = false;
                let routeingCisCompleted = false;

                const myCallback = function(isDestinationReached, routing) {
                    if (isDestinationReached) {
                        console.log('You have arrived at your destination!');
                        routing.remove()
                        setTimeout(() => {
                            routage($('#mission_position_x').val(), $(
                                    '#mission_position_y').val(), hopital
                                .position_x, uniteUser
                                .vitesse, hopital
                                .position_y, marker, missionIcon, endIcon,
                                myCallback1, false)
                        }, 1000);
                    }
                };
                const myCallback1 = function(isDestinationReached, routing) {
                    if (isDestinationReached) {
                        console.log('You have arrived at your destination!');
                        routing.remove()
                        setTimeout(() => {
                            routage(hopital.position_x, hopital.position_y, base
                                .position_x, uniteUser.vitesse, base.position_y,
                                marker,
                                startIcon, endIcon, myCallback2, true)
                        }, 1000);
                    }
                };
                const myCallback2 = function(isDestinationReached, routing) {
                    if (isDestinationReached) {
                        console.log('You have arrived at your destination!');
                        routing.remove()
                    }
                };

                routage(base.position_x, base.position_y, $('#mission_position_x').val(), uniteUser
                    .vitesse, $('#mission_position_y').val(), marker,
                    startIcon, missionIcon,
                    myCallback, false)

                // console.log(routage(51.505, -0.09, hopital.position_x, hopital.position_y,  marker,
                //     startIcon, endIcon))

                // if (routeingAisCompleted) {
                //     RoutingA.remove();

                //     const RoutingB = L.Routing.control({
                //         waypoints: [
                //             L.latLng(51.505, -0.09),
                //             L.latLng(hopital.position_x, hopital
                //                 .position_y),
                //         ],
                //         createMarker: function(i, waypoint) {
                //             return L.marker(waypoint.latLng, {
                //                 icon: i === 0 ? startIcon : endIcon
                //             });
                //         },
                //     }).on('routesfound', function(e) {
                //         console.log(e)
                //         e.routes[0].coordinates.forEach((element, index) => {
                //             setTimeout(() => {
                //                 marker.setLatLng([element.lat,
                //                     element.lng
                //                 ])
                //             }, 300 * index)
                //         });
                //         routeingBisCompleted = true;

                //     }).addTo(map)

                //     if (routeingBisCompleted) {
                //         RoutingB.remove()

                //         const RoutingC = L.Routing.control({
                //             waypoints: [
                //                 L.latLng(hopital.position_x, hopital
                //                     .position_y),
                //                 L.latLng(base.position_x, base.position_y),

                //             ],
                //             createMarker: function(i, waypoint) {
                //                 return L.marker(waypoint.latLng, {
                //                     icon: i === 0 ? startIcon : endIcon
                //                 });
                //             },
                //         }).on('routesfound', function(e) {
                //             console.log(e)
                //             e.routes[0].coordinates.forEach((element,
                //                 index) => {
                //                 setTimeout(() => {
                //                     marker.setLatLng([element
                //                         .lat,
                //                         element.lng
                //                     ])
                //                 }, 300 * index)
                //             });
                //             routeingCisCompleted = true;

                //         }).addTo(map)
                //         if (routeingCisCompleted) {
                //             RoutingC.remove()
                //         }
                //     }
                // }

                // const RoutingA = L.Routing.control({
                //     waypoints: [
                //         L.latLng(base.position_x, base.position_y),
                //         L.latLng(51.505, -0.09),
                //     ],
                //     createMarker: function(i, waypoint) {
                //         return L.marker(waypoint.latLng, {
                //             icon: i === 0 ? startIcon : endIcon
                //         });
                //     },
                // }).on('routesfound', function(e) {
                //     e.routes[0].coordinates.forEach((element, index) => {
                //         console.log(index)
                //         setTimeout(() => {
                //             marker.setLatLng([element.lat, element.lng])
                //             if (index == 48) {
                //                 routeingAisCompleted = true
                //                 console.log(routeingAisCompleted)
                //             }
                //         }, 300 * index)
                //     });
                // }).addTo(map)

            })

            function loadMission() {
                const wesPromiseMission = fetch("/api/missions");
                wesPromiseMission.then((response) => {
                    return response.json();
                }).then(function(data) {
                    let tabMission = [];
                    let = countDown = data.countDown;

                    $.each(data.response, function(index, element) {

                        // var myIcon = L.icon({
                        //     iconUrl: window.location.origin +
                        //         "/assets/images/quest.png",
                        //     iconSize: [30, 30], // taille de l'icône en pixels
                        //     iconAnchor: [22, 94], // point d'ancrage de l'icône
                        //     popupAnchor: [-3, -76] // point d'ancrage du popup
                        // });
                        // let markerData = L.marker([element.position_x, element
                        //     .position_y
                        // ], {
                        //     icon: myIcon
                        // });
                        // markerData.id = "mission" + element.id;

                        const cardMission = document.getElementById('card-mission');
                        if (cardMission) {
                            cardMission.hidden = false;
                        }
                        const namePatient = document.getElementById('name-patient');
                        namePatient.innerHTML = `${data.patient}`;
                        const age = document.getElementById('age-patient');
                        age.innerHTML = 40;
                        const adresse = document.getElementById('adresse-incident');
                        adresse.innerHTML = "nice, veuille ville";
                        const phonePatient = document.getElementById('phone-patient');
                        phonePatient.innerHTML = "+30 857452556";
                        const missionDescription = document.getElementById(
                            'mission-description');
                        if (missionDescription) {
                            missionDescription.innerHTML = element.nom_mission;
                        }
                        const missionId = document.getElementById('mission_id');
                        if (missionId) {
                            missionId.value = element.id;
                        }
                        const missionPositionX = document.getElementById('mission_position_x');
                        if (missionPositionX) {
                            missionPositionX.value = data.positionX;
                        }
                        const missionPositionY = document.getElementById('mission_position_y');
                        if (missionPositionY) {
                            missionPositionY.value = data.positionY;
                        }
                        const buttonModalUnitePay = document.querySelectorAll('.show-modal');
                        if (buttonModalUnitePay) {
                            buttonModalUnitePay.forEach(element => {
                                element.addEventListener('click', () => {
                                    let name = element.name;
                                    let expendEvent = document.getElementById(
                                        name);
                                    expendEvent.hidden = false;
                                    // alert(expendEvent.innerHTML)
                                })
                            });
                        }

                    });
                    const audio = document.getElementById('audio');
                    audio.play()
                    if (mutedInput.checked) {
                        mutedInput.checked = false;
                    }
                })
            }

            function loadData() {
                const wesPromise = fetch("/api/hopitaux");
                wesPromise.then((response) => {
                    return response.json();
                }).then(function(data) {
                    $.each(data.response, function(index, element) {
                        var myIcon = L.icon({
                            iconUrl: window.location.origin + "/" + element
                                .icon_hopital,
                            iconSize: [38, 95], // taille de l'icône en pixels
                            iconAnchor: [22, 94], // point d'ancrage de l'icône
                            popupAnchor: [-3, -76] // point d'ancrage du popup
                        });
                        let markerData = L.marker([element.position_x, element.position_y], {
                            icon: myIcon
                        }).addTo(map);
                        markerData.bindPopup("<p class='text-center'>" + element.nom_hopital +
                            "</p>")
                    });
                })
                const wesPromise2 = fetch("/api/base");
                wesPromise2.then((response) => {
                    return response.json();
                }).then(function(data) {
                    $.each(data.response, function(index, element) {
                        var myIcon = L.icon({
                            iconUrl: window.location.origin + "/" + element
                                .icon_base,
                            iconSize: [38, 95], // taille de l'icône en pixels
                            iconAnchor: [22, 94], // point d'ancrage de l'icône
                            popupAnchor: [-3, -76] // point d'ancrage du popup
                        });
                        let markerData = L.marker([element.position_x, element.position_y], {
                            icon: myIcon
                        }).addTo(map);
                    });
                })
                const wesPromise3 = fetch("/api/get-mission");
                wesPromise3.then((response) => {
                    return response.json();
                }).then(function(data) {
                    $.each(data.response, function(index, element) {
                        var myIcon = L.icon({
                            iconUrl: window.location.origin +
                                "/assets/images/mission-icon.svg",
                            iconSize: [20, 20], // taille de l'icône en pixels
                            iconAnchor: [22, 94], // point d'ancrage de l'icône
                            popupAnchor: [-3, -76] // point d'ancrage du popup
                        });
                        let markerData = L.marker([element.position_x, element.position_y], {
                            icon: myIcon
                        }).addTo(map);
                        markerData.bindPopup("<p class='text-center'>" + element.position_x +
                            " " + element.position_y +
                            "</p>")
                    });
                })


            }

            loadData();
            loadMission();

            // $('.add-mission-to-map').on('click', (e) => {
            //     alert(1)
            // })
            // Accepter la mission, etat en attente d'execution (1)

            $("#waiter-btn").on('click', () => {
                var token = "{{ csrf_token() }}";
                $.ajax({
                    url: `/api/add-mission`, // Replace with the target API URL
                    type: 'POST',
                    data: {
                        "mission_id": $('#mission_id').val(),
                        "position_x": $('#mission_position_x').val(),
                        "position_y": $('#mission_position_y').val(),
                        "etat": "0",
                        "icon": "/assets/images/mission-icon.png"
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Data posted successfully:', response);
                        if (response.message) {
                            reloadCardMission();
                            $('élist-mission').append(``)
                        }
                        // Process the response data
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error posting data:', textStatus, errorThrown);
                        // Handle errors
                    }
                });
            })

            function reloadCardMission() {
                $("#card-mission").fadeOut("slow", function() {
                    const audio = document.getElementById('audio')
                    if (mutedInput.checked) {
                        audio.play()
                    } else {
                        audio.pause();
                        audio.currentTime = 0;
                    }
                    setTimeout(() => {
                        console.log("remove")
                        $("#card-mission").hide()
                    }, 1000);
                    setTimeout(() => {
                        if (mutedInput.checked) {
                            audio.play()
                        } else {
                            audio.pause();
                            audio.currentTime = 0;
                        }

                        $("#card-mission").show()
                        loadMission();
                    }, getRandomIntInclusive(8000, 10000))
                });
            }

            // Refuser la mission

            $('#reject-btn').on('click', () => {
                reloadCardMission()
            })

            // $('#alert-mission').on('submit', (e) => {
            //     e.preventDefault();
            //     var token = "{{ csrf_token() }}";
            //     $.ajax({
            //         url: `/api/add-mission`, // Replace with the target API URL
            //         type: 'POST',
            //         data: {
            //             "mission_id": $('#mission_id').val(),
            //             "position_x": $('#mission_position_x').val(),
            //             "position_y": $('#mission_position_y').val(),
            //             "etat": "1",
            //             "is_completed": "1",
            //             "icon": "/assets/images/mission-icon.png"
            //         },
            //         headers: {
            //             'X-CSRF-TOKEN': token
            //         },
            //         dataType: 'json',
            //         success: function(response) {
            //             console.log('Data posted successfully:', response);
            //             if (response.message) {
            //                 $("#card-mission").fadeOut("slow", function() {
            //                     const audio = document.getElementById('audio')
            //                     if (mutedInput.checked) {
            //                         audio.play()
            //                     } else {
            //                         audio.pause();
            //                         audio.currentTime = 0;
            //                     }
            //                     setTimeout(() => {
            //                         console.log("remove")
            //                         $("#card-mission").remove()
            //                     }, 1000);
            //                     setTimeout(() => {
            //                         if (mutedInput.checked) {
            //                             audio.play()
            //                         } else {
            //                             audio.pause();
            //                             audio.currentTime = 0;
            //                         }
            //                         loadMission();
            //                     }, getRandomIntInclusive(5000, 10000))
            //                 });
            //             }
            //             // Process the response data
            //         },
            //         error: function(jqXHR, textStatus, errorThrown) {
            //             console.error('Error posting data:', textStatus, errorThrown);
            //             // Handle errors
            //         }
            //     });
            // })

            $('.getMissionMap').on('click', (e) => {
                console.log(e.target.id)
            })

            $('add-base-map').on('click', () => {
                if (baseCurrent) {
                    marker = L.marker([51.5, -0.09]).addTo(map);
                    const posX = document.getElementById('position_x_base');
                    const posY = document.getElementById('position_y_base');
                    posX.value = -0.09;
                    posY.value = 51.5;
                    marker.on('dragend', function(event) {
                        var newLatLng = event.target.getLatLng();
                        posY.value = newLatLng.lng;
                        posX.value = newLatLng.lat;
                        // console.log('Nouvelle position du marqueur :', newLatLng);
                    });
                    // markeurs.push(markeurs)
                    marker.dragging.enable();
                    baseCurrent = false
                } else {
                    removeHopitalButtonHandler.click()
                    baseCurrent = true
                }
            })

            $('remove-hopital-map').on('click', () => {
                if (marker) {
                    marker.remove();
                }
            })

            $('.close-modal-button').on('click', function() {
                $('.expend-modal').attr('hidden', true)
            });

        })
        // Active le déplacement du marqueur
    </script>
@endsection
