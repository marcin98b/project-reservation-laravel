<x-app-layout>
    <link rel="stylesheet" href="<?php echo asset('css/print.css')?>" type="text/css"> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wybór tematów projektowych') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        
                        
                            @if (Session::has('message'))
                            <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-medium"> {{session('message')}} </span>
                                </div>
                            </div>
                            @endif
        
                            <div class="pb-5 text-center text-lg">Wykaz ocen studentów</div>
                            <div class="block w-full overflow-auto scrolling-touch">
                                <table id="marksTable" class="w-full max-w-full mb-4 bg-transparent table-bordered table-striped">
                                    <thead>
                                        <tr class="border-2">
                                          <th class="border-r-2 text-left" scope="col">#</th>
                                          <th class="border-r-2 text-left" scope="col">Imię i nazwisko</th>
                                          <th class="border-r-2 text-left" scope="col">Indeks</th>
                                          <th class="border-r-2 text-left" scope="col">Temat projektowy</th>
                                          <th class="border-r-2 text-left" scope="col">Przesłane pliki</th>
                                          <th class="text-left" scope="col">Ocena</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($users as $user)
                                            <tr class="border-2">
                                                <td class="border-r-2 p-3" scope="row"> {{$loop -> iteration}}.</td>
                                                <td class="border-r-2 p-3"> {{$user -> name}} </td>
                                                <td class="border-r-2 p-3"> {{$user -> index}} </td>
                                                <td class="border-r-2 p-3"> {{$topics->find($user->reservedTopic)->title ?? '-'}}</td>
                                                <td class="border-r-2 p-3">
                                                    <ol style="padding-left:10px">
                                                    @foreach($user->files as $file)
                                                            <li class="text-xs text-gray-700"><a href="{{asset($file->file_path)}}"> {{$file->name}} ({{$file->created_at}})</a></li>
                                                    @endforeach
                                                    </ol>
                                                </td>
                                                <td class="p-3"> 
                                                    {{$user->mark->mark ?? '-'}}
                                                 
                                                 @if($user->reservedTopic ?? '')
                                                    &nbsp; <input type="checkbox" onclick="check()" class="check"/>

                                                        <div id="markCheckbox" class="inline-block">

                                                            <div class="checkForm">
                                                                <form method="POST" action="{{route('markAssign')}}">
                                                                    @csrf
                                                                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                                                <select class="ml-2" id="mark" name="mark">
                                                                    <option @if(($user->mark->mark ?? '-') == '2.0') disabled @endif value="2.0">2.0</option>                                           
                                                                    <option @if(($user->mark->mark ?? '-') == '3.0') disabled @endif value="3.0">3.0</option>
                                                                    <option @if(($user->mark->mark ?? '-') == '3.5') disabled @endif value="3.5">3.5</option>
                                                                    <option @if(($user->mark->mark ?? '-') == '4.0') disabled @endif value="4.0">4.0</option>
                                                                    <option @if(($user->mark->mark ?? '-') == '4.5') disabled @endif value="4.5">4.5</option>
                                                                    <option @if(($user->mark->mark ?? '-') == '5.0') disabled @endif value="5.0">5.0</option>
                                                                </select> 
                                                                <input type="submit"/>
                                                            </form> 
                                                            </div>
                                                        </div>
                                                @endif
                                                </td>
            
                                            </tr>
                                        @endforeach
                                      </tbody>
                                </table>
                            </div>
                        <div id="btnPanel" class="text-center pt-6">
                            <button style="display:inline" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                <a href="{{route('exportJSON')}}">Eksport JSON</a>
                            </button>
                            <button style="display:inline" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="window.print(); return false;">
                                Drukuj
                            </button>
        
                        </div>
                
                </div>
            </div>
        </div>
    </div>


    <script>

        //Panel edytowania ocen
        
        var el = document.getElementsByClassName('checkForm');
        for (var i=0;i<el.length; i++) {
            el[i].style.visibility="hidden";
        }
        
        function check(){
        
        let check = document.getElementsByClassName('check');
        for (var i=0;i<check.length; i++) {
        
        if(check[i].checked)
            {
                el[i].style.visibility="visible";
            }
        else el[i].style.visibility="hidden";
        
        }
        
        }
        
    </script>

</x-app-layout>