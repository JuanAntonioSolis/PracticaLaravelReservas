<x-layout>

    <x-slot:title>
        Home
    </x-slot:title>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div
            class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-1 font-medium">BIENVENIDO APP RESERVA SALAS</h1>
            <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">Reserva tu sala ahora</p>
            <ul class="flex gap-3 text-sm leading-normal">
                <li>
                    @if(auth()->user()->admin)
                        <x-button_w link="{{route('reservas.pendientes')}}" texto="Ver reservas pendientes"></x-button_w>
                    @else
                        <x-button_w link="{{route('nueva_reserva')}}" texto="Haz una reserva ahora"></x-button_w>
                    @endif
                </li>
            </ul>
        </div>

    </main>
</x-layout>
