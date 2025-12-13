<x-layout>
<main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-4 font-medium">MIS RESERVAS</h1>


            <ul class="bg-gray-300 rounded-md shadow-sm divide-y divide-gray-100 mb-4">
                @foreach($reservas as $reserva)
                    <li class="px-4 py-3 flex items-center justify-between">
                        <div class="text-sm text-gray-600">Fecha: {{$reserva->fecha}} - {{$reserva->hora}}</div>
                        <div class="text-sm text-gray-500">
                            Sala {{$reserva->sala->id}} Personas {{$reserva->numPersonas}}
                        </div>
                        @php
                            $color = match($reserva->estado) {
                                'pendiente' => 'bg-yellow-500 text-white',
                                'confirmada' => 'bg-green-500 text-white',
                                'cancelada' => 'bg-red-500 text-white',
                                default => 'bg-gray-500 text-white',
                            };
                        @endphp
                        <div class="text-sm text-gray-500 px-1 {{ $color }}">
                            {{$reserva->estado}}
                        </div>
                        <div class="text-sm text-red-400 hover:underline">
                            <a href="{{ route('reservas.cancelar', [ 'reserva' => $reserva->id ]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <x-button_w link="{{route('nueva_reserva')}}" texto="Haz una reserva ahora">

            </x-button_w>

        </div>

</main>
</x-layout>
