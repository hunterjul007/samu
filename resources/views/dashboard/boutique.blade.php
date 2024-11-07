@extends('dashboard.master', ['activePage' => 'boutique'])
@section('title', __('Boutique'))
@section('content')
    <div class="relative">

        <div>
            <ul class="p-8 flex flex-row flex-wrap gap-10">
                <a href="{{ url('/dashboard/boutique/unites')}}" class="hover:no-underline">
                    <li class="relative text-white px-4 hover:scale-125 transition-all size-52 flex justify-center items-center text-2xl font-bold  p-2 border-4 border-purple-125/80 from-violet-700 bg-gradient-to-tr bg-violet-400 rounded-3xl">
                        Unités
                    </li>
                </a>
                <a href="{{ url('/dashboard/boutique/personnels')}}" class="hover:no-underline">
                    <li class="relative text-white px-4 hover:scale-125 transition-all size-52 flex justify-center items-center text-2xl font-bold  p-2 border-4 border-purple-125/80 from-violet-700 bg-gradient-to-tr bg-violet-400 rounded-3xl">
                        Personnels
                    </li>
                </a>
                <a href="" class="hover:no-underline">
                    <li class="relative text-white px-4 hover:scale-125 transition-all size-52 flex justify-center items-center text-2xl font-bold  p-2 border-4 border-purple-50/80 from-violet-700 bg-gradient-to-tr bg-violet-400 rounded-3xl">
                        Equipements
                    </li>
                </a>
                {{-- <a href="" class="hover:no-underline">
                    <li class="relative text-white px-4 size-52 flex justify-center items-center text-2xl font-bold  p-2 border-4 border-purple-50/80 from-violet-700 bg-gradient-to-tr bg-violet-400 rounded-3xl">
                        Base
                    </li>
                </a> --}}
            </ul>
        </div>

    </div>

@endsection
