<x-user-layout>
    <div class="w-full mx-auto">
        <div class="flex justify-center font-bold text-xl mb-3 text-left lg:text-2xl">
            @if (Auth::check())
                {{ Auth::user()->status ? '' : 'Anda belum diverifikasi oleh admin' }}
            @endif
        </div>
        <h4 class="font-bold text-teal-900 text-xl mb-3 text-left lg:text-2xl">Available Stock</h4>
        <div class="flex justify-center">
            <div class="flex flex-wrap max-w-screen-xl mx-auto">
                @foreach ($data as $row)
                    <div class="w-full px-4 py-4 md:w-1/4 lg:w-1/6">
                        <div
                            class="bg-stone-200 rounded-md shadow-lg overflow-hidden transition duration-200 hover:scale-105 ease-in-out">
                            <img src="{{ asset('productphoto/' . $row->photo) }}" alt="{{ $row->name }}"
                                class="px-2 py-2 modalTrigger cursor-pointer w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="font-semibold text-teal-950 text-base mb-1">{{ $row->name }}</p>
                                <p class="font-medium text-teal-950 text-base">
                                    {{ 'Rp ' . number_format($row->price, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-user-layout>
