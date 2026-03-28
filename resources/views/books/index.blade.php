@extends('layout.app')
@section('content')
    <div class="max-w-6xl mx-auto mb-10">

        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 text-center">

            <h1 class="text-4xl font-semibold mb-3">
                Perpustakaan Digital
            </h1>

            <p class="text-gray-400 max-w-xl mx-auto">
                Temukan dan kelola koleksi buku favoritmu dengan tampilan modern dan cepat
            </p>

            <!-- SEARCH (next step nanti kita hidupin) -->
            <div class="mt-6">
                <input placeholder="Cari buku..."
                    class="w-full md:w-1/2 p-3 bg-gray-900/70 rounded-xl text-sm focus:ring-2 focus:ring-white/30 outline-none">
            </div>

        </div>

    </div>
    <h1 class="text-3xl font-bold mb-6">Daftar Buku</h1>

    <div class="grid md:grid-cols-4 gap-6">
        @foreach ($books as $book)

            <a href="/books/{{ $book->id }}"
                class="group rounded-2xl overflow-hidden bg-white/5 border border-white/10 hover:border-white/20 transition">

                <div class="relative h-52 overflow-hidden">

                    @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <div class="w-full h-full bg-gray-800"></div>
                    @endif

                    <!-- gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent opacity-70"></div>

                </div>

                <div class="p-4">
                    <h2 class="font-semibold text-white">
                        {{ $book->title }}
                    </h2>

                    <p class="text-sm text-gray-400">
                        {{ $book->author }}
                    </p>
                </div>

            </a>

        @endforeach
    </div>

@endsection