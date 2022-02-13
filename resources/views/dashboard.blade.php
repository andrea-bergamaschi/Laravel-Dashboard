<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Auth::user()->name}}, benvenut*!
        </h2>
        @if(Auth::user()->role == 2)
        <p> Sei amministratore! &#128110; &#128077;</p>
        @else
        <p>Non sei amministratore: &#10060; &#10060;</p>
        @endif
    </x-slot>

    <div class="py-12">
        @yield('content')
    </div>
    
</x-app-layout>
