<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Temat projektowy #{{$topic->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="pb-5 text-center text-lg"> 
                        Temat:
                        <b>{{$topic -> title ?? '<brak>'}}</b>
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
        
                  
        
                        @if(Auth::user()->role === 'admin')
                        <hr class="my-1 h-px bg-gray-200 border-0">
                            <b>Studenci wykonujący ten projekt:</b>
                            @if(!$users->isEmpty())
                            <ol>
                                @foreach($users as $user)
                                <li class="text-sm">{{$user->name}}</li>
                                @endforeach
                            </ol>
                            @else <br/> <div class="text-sm"> BRAK </div>
                            @endif
                        @endif
        
        
                        <div class="text-center pt-5">
                            <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                <a href="{{route("topic")}}">Powrót</a>
                            </button>
                        
                            @if (Auth::user()->role === 'admin')
                             
                                <button style="display:inline" class="text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    <a href="{{route('topicEdit', $topic -> id)}}">Edytuj temat</a>
                                </button>
                            
                                <form style="margin:0px; padding:0px; display:inline;" action="/topics/{{$topic -> id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="return confirm('Potwierdź usunięcie projektu')">
                                            Usuń temat
                                        </button>
                                </form>
        
        
                            @else
                                @if(Auth::user()->reservedTopic != $topic -> id)
                                 
                                    @if((Auth::user()->mark->mark ?? '') == NULL && (Auth::user()->files->count() == 0)) 
                                    <form style="margin:0px; padding:0px; display:inline;" action="{{route('topicChoose')}}" method="POST">
                                        @csrf
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="topic_id" value="{{$topic -> id}}">
                                            <button type="submit" onclick="return confirm('Potwierdź wybór projektu')"  class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                Wybierz temat
                                            
                                            </button>


                                    </form>
                                    @endif
                                @else 
                                <button disabled type="button" class=" text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Ten temat jest przez ciebie wybrany
                                </button>

                                @endif 
        
                            @endif
        
        
                        </div>
        
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>