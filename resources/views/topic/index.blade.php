<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          @if(Auth::user()->role == 'student')
            {{ __('Wybór tematów projektowych') }}
          @else
            {{ __('Zarządzanie projektami') }}
          @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                            
                             @if (Session::has('message'))
                            <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-medium"> {{session('message')}} </span>
                                </div>
                            </div>

                            @endif
        
                            @if(Auth::user()->mark->mark ?? '' != NULL)
                            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-medium">Wystawiono ocenę, zajrzyj w zakładkę "Mój projekt".</span>
                                </div>  
                            </div>   

                            @endif
        
                            @if(Auth::user()->reservedTopic != NULL && Auth::user()->role == 'student')
                                <div class="pb-5 text-center text-lg"> 
                                    Twój wybrany temat:
                                    <a class="text-blue-600 font-bold dark:text-blue-500 hover:underline" href="topics/myproject" >
                                        {{$topics->find(Auth::user()->reservedTopic)->title ?? ' wybierz temat'}}
                                    </a>
                                </div>
                            @endif

                            <div class="pb-3 text-left text-lg">Lista dostępnych tematów:</div>
        
                            @foreach ($topics as $topic)
                                <div>
                                    <a class="text-black-600 font-bold hover:underline" href="./topics/{{$topic-> id}}">
                                       {{$loop -> iteration}}. {{$topic -> title }} 
                                       @if(Auth::user()->reservedTopic != NULL && Auth::user()->role == 'student' && Auth::user()->reservedTopic == $topic -> id)
                                            <b>(Wybrany projekt)</b>
                                       @endif
                                    </a>
                                    <br/>
                                    <div class="pb-2 text-sm">Opis: {{$topic -> description}} </div>
                                    @if(!$loop->last) <hr class="my-2 h-px bg-gray-200 border-0"> @endif
                             
                                </div>
                            @endforeach
                            
                
                </div>
            </div>
        </div>
    </div>




</x-app-layout>