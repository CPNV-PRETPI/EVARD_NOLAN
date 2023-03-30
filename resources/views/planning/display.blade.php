<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planning') }}
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            {{--        Selected week information + week switch buttons        --}}
            <div class="flex flew-row justify-center p-2 bg-white overflow-hidden shadow-md sm:rounded-lg border-b-2 border-gray-200 sm:border-b-0">
                <div class="flex flew-row items-center rounded-md border-2 border-gray-600 hover:bg-gray-600">
                    <a href="{{route('planning.show', ['year' => $firstDayOfWeek->subWeek()->year, 'weeknumber' =>$firstDayOfWeek->weekOfYear])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-600 hover:stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>
                </div>
                <div class="mx-6 text-center text-gray-900">Semaine du {{$firstDayOfWeek->addWeek()->format('d.m.Y')}} au {{$lastDayOfWeek->format('d.m.Y')}}</div>
                <div class="flex flew-row items-center rounded-md border-2 border-gray-600 hover:bg-gray-600">
                    <a href="{{route('planning.show', ['year' => $firstDayOfWeek->addWeek()->year, 'weeknumber' => $firstDayOfWeek->weekOfYear])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-gray-600 hover:stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
            {{-- Planning section --}}
            <div class="flex flex-col bg-white overflow-hidden shadow-md sm:rounded-lg my-0 sm:my-2 gap-2">
                {{-- Toolbar --}}
                <div class="flex flex-row gap-2 justify-center md:justify-start flex-wrap m-4 mb-2">
                    <div class="flex flew-row space-x-1 rounded-md border-2 border-gray-300 text-gray-300 px-2 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <a href="">Ajouter</a>
                    </div>
                    <div class="flex flew-row space-x-1 rounded-md border-2 border-gray-300 text-gray-300 px-2 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <a href="">Modifier</a>
                    </div>
                    <div class="flex flew-row space-x-1 rounded-md border-2 border-gray-300 text-gray-300 px-2 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        <a href="">Supprimer</a>
                    </div>
                    <div class="flex flew-row space-x-1 rounded-md border-2 border-gray-300 text-gray-300 px-2 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <a href="">Details</a>
                    </div>
                </div>
                <hr class="h-0.5 bg-gray-200 border-0">
                {{-- Meals section --}}
                @if($planning)
                    <div class="grid grid-cols-1 lg:grid-cols-7 gap-4 m-2">
                        @foreach($period as $date)
                            <div class="flex flex-col gap-2 rounded-lg shadow-md lg:rounded-none lg:shadow-none bg-gray-200 lg:bg-white p-2 lg:p-0">
                                <div class="text-xl">{{ucfirst($date->locale(config('app.locale'))->dayName)}}</div>
                                @foreach(['Déjeuner', 'Dîner', 'Souper'] as $moment)
                                    @if($planning->recipes->filter(function($recipe) use ($date){return \Carbon\Carbon::parse($recipe->pivot->planned_for)->format('Y:m:d') == $date->format('Y:m:d');})->contains('pivot.moment_of_meal', $moment))
                                        @php
                                            $recipe = $planning->recipes->filter(function($recipe) use ($date){return \Carbon\Carbon::parse($recipe->pivot->planned_for)->format('Y:m:d') == $date->format('Y:m:d');})->first();
                                        @endphp
                                        <div class="">{{$recipe->pivot->moment_of_meal}}</div>
                                        <a href="#">
                                        <div class="bg-gray-100 hover:bg-gray-300 rounded-lg border-2 border-gray-400 text-sm p-1 min-h-24 h-24">
                                                <div class="text-base overflow-x-hidden">{{$recipe->title}}</div>
                                                <div class="text-sm">
                                                    <strong>Préparation: </strong>{{$recipe->preparation_time}} min.<br>
                                                    <strong>Nb personnes: </strong>{{$recipe->nb_of_people}}
                                                </div>
                                        </div>
                                        </a>
                                    @else
                                        <div class="">{{$moment}}</div>
                                        <div class="flex justify-center items-center bg-white rounded-lg border-2 border-dashed border-gray-400 h-24">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 stroke-gray-600 hover:fill-gray-300">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="grid grid-cols-1 lg:grid-cols-7 gap-4 m-2">
                        @foreach($period as $date)
                            <div class="flex flex-col gap-2 rounded-lg shadow-md lg:rounded-none lg:shadow-none bg-gray-200 lg:bg-white p-2 lg:p-0">
                                <div class="text-xl">{{ucfirst($date->locale(config('app.locale'))->dayName)}}</div>
                                @foreach(['Déjeuner', 'Dîner', 'Souper'] as $moment)
                                    <div class="">{{$moment}}</div>
                                    <div class="flex justify-center items-center bg-white rounded-lg border-2 border-dashed border-gray-400 h-24">
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 stroke-gray-600 hover:fill-gray-300">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
