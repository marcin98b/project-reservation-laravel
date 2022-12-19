<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel wysyłania projektu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                       
                            <div class="pb-5 text-center text-lg"> 
                                Upload Center
                                
                            </div>

                            <div class="pb-3">
                            Wyślij swój projekt pt. <b>"{{$topic->title}}"</b> w archiwum (.zip, .rar, .7z, .tar) o maksymalnej wielkości 100 MB. <br/>
                            Dozwolone jest 3-krotne wysłanie archiwów w ramach poprawy oceny. <br/>
        
                            <span class="font-bold text-orange-700">Jeśli wyślesz swoje pierwsze archiwum zmiana tematu nie będzie możliwa!</span>
                            </div>      
                       
                            <b>Twoje przesłane pliki ({{Auth::user()->files->count()}}/3 możliwych prób):</b>
                            <ul>
                                @foreach ($files as $file)
                                     <li class="text-sm text-blue-600 dark:text-blue-500 hover:underline"><a href="{{asset($file->file_path)}}"> {{$file->name}} </a></li>
                                @endforeach  
                            </ul>
                            <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
        
                                  @csrf
                                  @if ($message = Session::get('success'))
                                  <div>
                                      <strong>{{ $message }}</strong>
                                  </div>
                                @endif
                      
                                @if (count($errors) > 0)
                                  <div>
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                            <li class="text-red-600">{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                                @endif
        
                                  <div class="pt-3">
                                      <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                      {{-- <label class="custom-file-label" for="chooseFile">Wybierz plik</label> --}}
                                  </div>
                                  <div class="btnsShow">
                                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        

                                  <div class="text-center pt-5">
                                    <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        <a href="{{route("topicMyProject")}}">Powrót</a>
                                    </button>
        
                                @if(Auth::user()->files->count() != 3)
                                  <button class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="submit" name="submit" class="btn btn-primary mt-3">
                                      Wyślij projekt
                                  </button>
                                @else
                                     <button class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" disabled>3/3 wykorzystane próby</button>    
                                @endif
        
                                </div>
                              </form>
 
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>