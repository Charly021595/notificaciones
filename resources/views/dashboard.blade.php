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
                <form action="{{ route('mensaje.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <x-jet-label>
                            Asunto
                        </x-jet-label>

                        <x-jet-input type="text" class="w-full" placeholder="Ingrese el Asunto" name="asunto" value="{{ old('asunto') }}">
                        </x-jet-input>

                        <x-jet-input-error for="asunto"></x-jet-input-error>
                    </div>

                    <div class="mb-4">
                        <x-jet-label>
                            Mensaje
                        </x-jet-label>

                        <textarea class="form-control w-full" name="mensaje" rows="4" placeholder="Escriba su mensaje">{{ old('mensaje') }}</textarea>
                        <x-jet-input-error for="mensaje"></x-jet-input-error>
                    </div>

                    <div class="mb-4">
                        <x-jet-label>
                            Destinatario
                        </x-jet-label>

                        <select name="to_user_id" class="form-control w-full">
                            <option value="" {{ old("to_user_id") ? '' : 'selected' }} disabled>Seleccione un Usuario</option>
                            @foreach ($users as $user)
                                <option {{ old("to_user_id") == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="to_user_id"></x-jet-input-error>
                    </div>

                    <x-jet-button>
                        Enviar
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
