@extends('admin.master', ['activePage' => 'personnel'])
@section('title', __('Personnels'))
@section('content')
    <div class="container-fluid ">
        <div class="text-xs">
            <a href="{{ url('/admin/dashboard') }}">Dashboard</a> \ <a
                href="{{ url('/admin/dashboard/personnels') }}">Personnels</a> \ <a
                href="#">{{ $personnel->titre_personnel }}</a>
        </div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">{{ $personnel->titre_personnel }}</h1>

        </div>
        <div class="flex items-center gap-2">
            <button class="btn btn-warning text-sm my-4" data-toggle="modal" data-target="#addPersonelModal">Editer</button>
            <a href="{{ url('/admin/api/delete-personnel/' . $personnel->id) }}"
                class="btn btn-danger text-sm my-4">Supprimer</a>

            <form action="{{ route('edit.personnel') }}" method="POST">
                <input type="number" name="id" hidden value="{{ $personnel->id }}">
                @csrf
                @if ($personnel->published == 1)
                    <button class="btn btn-sm btn-warning" name="publisherToShop" value="0">
                        Retirer de la
                        boutique</button>
                @else
                    <button class="btn btn-sm btn-secondary" name="publisherToShop" value="1">Ajouter dans la
                        boutique</button>
                @endif

            </form>
        </div>
        {{-- <button class="btn btn-sm btn-primary">Ajouter une formation</button> --}}
        <div class="card  col-lg-12 px-1  shadow mb-4">

            <div class="card-body row">
                <div class="col-lg-3">
                    <img class="w-fit" src="{{ asset($personnel->image) }}" alt="" srcset="">
                </div>
                <div class="col-lg-9 border-l">
                    <!-- Dropdown Card Example -->
                    <div class="card  mb-4" style="border: none">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-secondary text-lg">{{ $personnel->titre_personnel }}</h6>
                        </div>
                        <div class="card-body text-sm">
                            <p class="py-1">
                                {{ $personnel->description_personnel }}
                            </p>
                            <div class="flex items-center justify-between gap-1 border-stone-100  py-2 border-y">
                                <span class="font-bold text-secondary text-lg">Prix</span>
                                <div class="flex items-center">
                                    <span class="text-green-500">{{ $personnel->prix_personnel }}</span>
                                    <img width="25" height="25"
                                        src="{{ asset('assets/images/icons8-coin-60.png') }}" alt=""
                                        srcset="">
                                </div>
                            </div>
                            <div class="flex items-center gap-1 border-stone-100 justify-between  py-2 border-y">
                                <span class="font-bold text-secondary text-lg">Disponible pour les joueurs</span>
                                <span>
                                    @if ($personnel->published == 1)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </span>
                            </div>
                            <div>
                                <h2 class="font-bold text-secondary text-lg">Description</h2>
                                <p class="space-y-1 text-gray-500">
                                    {{ $personnel->description_personnel }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addPersonelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" enctype="multipart/form-data" method="POST"
                action="{{ route('edit.personnel') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editer</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="number" hidden id="id" name="id" value="{{ $personnel->id }}">
                    <div class="mb-1">
                        <label for="titre_personnel"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Libelle</label>
                        <input type="text" id="titre_personnel" name="titre_personnel" value="{{ $personnel->titre_personnel }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-1">
                        <label for="description_personnel"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description de
                            l'événement</label>
                        <textarea id="description_personnel" name="description_personnel" rows="4"
                            class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Décrire l'événement">{{ $personnel->description_personnel }}</textarea>
                    </div>

                    <div class="mb-1">
                        <label for="prix_personnel"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                        <input type="number" id="prix_personnel" placeholder="0" name="prix_personnel"
                            value="{{ $personnel->prix_personnel }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-1">
                        <label for="published"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publié</label>
                        <select type="date" id="published" name="published"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $personnel->published }}">-- Publié dans la boutique --</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>

                    <div class=" mt-3 mx-auto">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Images</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="image_help" id="image" type="file" name="image">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm text-blue-500" type="submit">Modifier</button>
                    <button class="btn btn-secondary btn-sm text-stone-500" type="button"
                        data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // const addAptitudeButtonHandler = () => {

        // }

        const addAptitudeButton = document.getElementById("add_aptitudes_btn");
        addAptitudeButton.addEventListener('click', () => {
            const addAptitudeInput = document.getElementById("aptitudes_input");
            const aptitudes = document.getElementById("aptitudes");
            aptitudes.value += addAptitudeInput.value + '\n';
        })
    </script>
@endsection
