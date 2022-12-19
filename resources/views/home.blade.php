<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wybór tematów projektowych') }}
        </h2>
    </x-slot>


    @guest   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                <div class="p-6">
                    Aby uzyskać dostęp do panelu wyboru projektów, należy się <a class="text-blue-600 dark:text-blue-500 hover:underline" href="./login">zalogować</a>. <br/> 
                    Jeśli nie posiadasz konta w systemie, <a class="text-blue-600 dark:text-blue-500 hover:underline" href="./register">zarejestruj się</a>.         
                </div>
            </div>
        </div>
    </div>
    @else

        <script>
            window.location.href = '{{route("topic")}}'; 
        </script>

    @endguest

</x-app-layout>