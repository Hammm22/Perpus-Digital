@extends('layout.app')

@section('content')

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-semibold">Admin Buku</h1>
                <p class="text-gray-400 text-sm">Kelola semua koleksi buku</p>
            </div>

            <a href="/admin/books/create"
                class="px-5 py-2.5 bg-white text-black rounded-xl font-medium hover:scale-105 transition">
                + Tambah Buku
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden">

            @if($books->count())

                <!-- TABLE -->
                <table class="w-full text-sm">
                    <thead class="text-gray-400 border-b border-white/10">
                        <tr>
                            <th class="p-4 text-left">Judul</th>
                            <th class="p-4 text-left">Author</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($books as $book)
                            <tr class="border-b border-white/5 hover:bg-white/5 transition duration-200">

                                <td class="p-4 flex items-center gap-3">

                                    @if($book->cover)
                                        <img src="{{ asset('storage/' . $book->cover) }}" class="w-12 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-12 h-16 bg-gray-800 rounded-lg"></div>
                                    @endif

                                    <span>{{ $book->title }}</span>

                                </td>

                                <td class="p-4 text-gray-400">
                                    {{ $book->author }}
                                </td>

                                <td class="p-4 text-right flex justify-end gap-2">

                                    <a href="/admin/books/{{ $book->id }}/edit"
                                        class="px-3 py-1.5 text-xs bg-white/10 rounded-lg hover:bg-white/20 transition">
                                        Edit
                                    </a>

                                    <form action="/admin/books/{{ $book->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="px-3 py-1.5 text-xs bg-red-500/10 text-red-400 rounded-lg hover:bg-red-500/20 transition">
                                            Hapus
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <!-- EMPTY STATE -->
                <div class="text-center py-20">
                    <div class="text-5xl mb-4 opacity-30">📚</div>
                    <p class="text-gray-400">Belum ada buku</p>

                    <a href="/admin/books/create" class="inline-block mt-4 px-5 py-2 bg-white text-black rounded-xl">
                        Tambah Buku
                    </a>
                </div>

            @endif

        </div>

    </div>

@endsection