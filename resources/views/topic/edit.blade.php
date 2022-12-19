<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edycja projektu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        
                            <form method="POST" action="/topics/{{$topic -> id}}/edit">
                                @csrf
                                @method('PUT')
                                <div class="mb-4 flex flex-wrap ">
                                    <label for="title" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Tytuł projektu:') }}</label>
        
                                    <div class="md:w-1/2 pr-4 pl-4">
                                        <input class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="title" type="text" name="title" required autocomplete="title" autofocus value="{{$topic -> title}}">
        
                                    </div>
                                </div>
        
                                <div class="mb-4 flex flex-wrap ">
                                    <label for="description" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Opis projektu:') }}</label>
        
                                    <div class="md:w-1/2 pr-4 pl-4">
                                        <textarea style="height:150px" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="description" name="description" required autocomplete="description" autofocus>{{$topic -> description}}</textarea>
        
                                    </div>
                                </div>     
                                
                                <div class="mb-4 flex flex-wrap ">
                                    <label for="technologies" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Technologie:') }}</label>
        
                                    <div class="md:w-1/2 pr-4 pl-4">
                                        <input class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="technologies" type="text" name="technologies" required autocomplete="technologies" autofocus value="{{$topic -> technologies}}">
        
                                    </div>
                                </div>                              
                                
                                <div class="mb-4 flex flex-wrap ">
                                    <label for="difficulty" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Trudność:') }}</label>
        
                                    <div class="md:w-1/2 pr-4 pl-4">
                                        <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" style="Width:100%;" id="difficulty" name="difficulty">
                                            <option @if ($topic -> difficulty == 'Niska') selected @endif value="Niska">Niska</option>
                                            <option @if ($topic -> difficulty == 'Średnia') selected @endif value="Średnia">Średnia</option>
                                            <option @if ($topic -> difficulty == 'Trudna') selected @endif value="Trudna">Trudna</option>
                                        </select>    
        
                                    </div>
                                </div>      
        
        
                                <div class="text-center pt-6">
                                        <button type="submit" class="text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                            {{ __('Edytuj projekt') }}
                                        </button>
                                </div>

                            </form>

                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>