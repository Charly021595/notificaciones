<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- <x-jet-welcome /> -->
                <center><label for="Mensaje"><b>Mensaje</b></label></center>
                <div class="divide-y-2">
                    <div class="row">
                        <div class="col-12">
                            <h2 id="descripcion_mensaje"><b>Descripcion del Mensaje</b></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 id="cuerpo_mensaje">{{ $mensaje->body }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/mensajes.js') }}"></script>
</x-app-layout>
