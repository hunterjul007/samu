@extends('dashboard.master', ['activePage' => 'classement'])
@section('title', __('Classement'))
@section('content')

    <section class="p-4 ">

        <h2 class="text-xl text-white font-semibold">Classement des joueurs</h2>

        <div class="mt-4 overflow-hidden border rounded-lg">
            <div class="relative overflow-x-auto">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 rtl:text-right ">
                        <thead class="text-xs text-gray-900 uppercase bg-stone-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Place
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Joueur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nb missions
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Réussie
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Performance global
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr class=" border-y bg-gray-50 ">
                                    <th scope="row"
                                        class="px-6 text-xl text-orange-500 font-bold py-4 font-medium">
                                        {{$key + 1}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$user->pseudo}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$user->count_mission}}
                                    </td>
                                    <td class="px-6 py-4">
                                        80%
                                    </td>
                                    <td class="px-6 py-4 text-green-500">
                                        {{$user->performance}}%
                                    </td>
                                </tr>
                            @endforeach

                           
                          
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </section>

@endsection
