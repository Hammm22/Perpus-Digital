@extends('layout.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- CONTAINER -->
    <div class="grid md:grid-cols-2 gap-10 items-start">

        <!-- LEFT: COVER -->
        <div class="relative">

            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}"
                    class="w-full h-[450px] object-cover rounded-2xl shadow-xl">
            @else
                <div class="w-full h-[450px] bg-gray-800 rounded-2xl"></div>
            @endif

            <!-- subtle glow -->
            <div class="absolute inset-0 rounded-2xl bg-white/5 backdrop-blur-[2px] pointer-events-none"></div>

        </div>

        <!-- RIGHT: CONTENT -->
        <div class="space-y-6">

            <!-- TITLE -->
            <div>
                <h1 class="text-4xl font-semibold leading-tight">
                    {{ $book->title }}
                </h1>

                <p class="text-gray-400 mt-2">
                    oleh {{ $book->author }}
                </p>
            </div>

            <!-- DESCRIPTION -->
            <div class="text-gray-300 leading-relaxed">
                {{ $book->description ?? 'Tidak ada deskripsi.' }}
            </div>

            <!-- ACTION -->
            <div class="flex gap-3 pt-4">

                <a href="/"
                    class="px-5 py-2.5 bg-white text-black rounded-xl font-medium hover:scale-105 transition">
                    ← Kembali
                </a>

                <a href="/admin/books/{{ $book->id }}/edit"
                    class="px-5 py-2.5 bg-white/10 border border-white/20 rounded-xl hover:bg-white/20 transition">
                    Edit
                </a>

            </div>

        </div>

    </div>

</div>

@endsection