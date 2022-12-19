<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel realizowanego projektu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                            @if(Auth::user()->files->count() && (Auth::user()->mark->mark ?? '') == NULL)

                            <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-medium">Archiwum z projektem wysłane. Proszę o cierpliwość, ocena pojawi się wkrótce. </span> 
                                </div>
                              </div>
                              
                       
                            @endif

                            @if(Auth::user()->mark->mark ?? '' != NULL)

                                <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                    <span class="font-medium">Ocena została wystawiona. Twój projekt otrzymuje ocenę {{Auth::user()->mark->mark}}.</span>
                                    </div>
                                </div>

                            @endif


                            @if (Auth::user()->reservedTopic == NULL)
                                <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                    <span class="font-medium">Brak wybranego tematu!</span>
                                    </div>
                                </div>
                            @else
                                
                                @if($topic != NULL)

                                <div class="pb-5 text-center text-lg"> 
                                    Twój wybrany temat:
                                    <a class="text-blue-600 font-bold dark:text-blue-500 hover:underline" href="../topics/{{$topic->id}}"" >
                                        {{$topic -> title ?? '<brak>'}}
                                    </a>
                                </div>

                                <div class="pb-2">
                                    <b>Opis:</b> 
                                   <div class="text-sm"> {{$topic -> description}}</div>
                                </div>
                                <hr class="my-1 h-px bg-gray-200 border-0">

                                <div class="pb-2">
                                    <b>Wymagane technologie:</b>
                                    <div class="text-sm">{{$topic -> technologies}}</div>
                                </div>
                                <hr class="my-1 h-px bg-gray-200 border-0">

                                <div class="pb-2">
                                    <b>Poziom trudności:</b>
                                    <div class="text-sm">{{$topic -> difficulty}}</div>
                                </div>
                                    
                                
                                @else
                                     <p>Wybrany projekt nie istnieje, być może został usunięty przez administratora. Proszę wybrać nowy temat z listy.</p>
                                     @php $notExists = TRUE; @endphp
                                @endif 
        
                            @endif
        
                             
        

        
                                <div class="text-center pt-5">
                                
                                 {{-- <button class="btn btn-primary"><a href="{{route("topic")}}">Powrót</a></button>
         --}}
                                    @if(Auth::user()->reservedTopic != NULL)
                                     
                                    <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        <a href="{{route("fileUpload")}}">Upload Center</a>
                                    
                                    </button>

        
                                        @if(isset($notExists))
                                            <form style="margin:0px; padding:0px; display:inline;" action="{{route("topicChooseAnother")}}" method="POST">
                                                @csrf
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                  
                                                    <button type="submit" onclick="return confirm('Potwierdź rezygnację z projektu. Konieczne jest wybranie innego.')" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                        
                                                        Zrezygnuj z tematu
                                                    </button>
                                                       
                                            </form>
                                        @endif
        
        
                                   @endif
                                   
        
        
                                </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>