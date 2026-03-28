@extends('layout.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl font-semibold">
            {{ isset($book) ? 'Edit Buku' : 'Tambah Buku' }}
        </h1>
        <p class="text-gray-400 text-sm">
            {{ isset($book) ? 'Update data buku' : 'Tambahkan buku baru ke koleksi' }}
        </p>
    </div>

    <!-- CARD -->
    <form method="POST"
          action="{{ isset($book) ? '/admin/books/'.$book->id : '/admin/books' }}"
          enctype="multipart/form-data"
          class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 grid md:grid-cols-2 gap-8">

        @csrf
        @if(isset($book))
            @method('PUT')
        @endif

        <!-- LEFT SIDE -->
        <div class="space-y-5">

            <!-- TITLE -->
            <div>
                <label class="text-sm text-gray-400">Judul</label>
                <input name="title"
                    value="{{ $book->title ?? '' }}"
                    class="w-full mt-1 p-3 bg-gray-900/70 rounded-xl focus:ring-2 focus:ring-white/30 outline-none transition">
            </div>

            <!-- AUTHOR -->
            <div>
                <label class="text-sm text-gray-400">Author</label>
                <input name="author"
                    value="{{ $book->author ?? '' }}"
                    class="w-full mt-1 p-3 bg-gray-900/70 rounded-xl focus:ring-2 focus:ring-white/30 outline-none transition">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-sm text-gray-400">Deskripsi</label>
                <textarea name="description"
                    rows="5"
                    class="w-full mt-1 p-3 bg-gray-900/70 rounded-xl focus:ring-2 focus:ring-white/30 outline-none transition">{{ $book->description ?? '' }}</textarea>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div>

            <label class="text-sm text-gray-400">Cover Buku</label>

            <!-- PREVIEW -->
            <div class="mt-2 mb-4">

                @if(isset($book) && $book->cover)
                    <img src="{{ asset('storage/' . $book->cover) }}"
                        id="preview"
                        class="w-40 rounded-xl shadow-lg">
                @else
                    <img id="preview" class="w-40 rounded-xl hidden shadow-lg">
                @endif

            </div>

            <!-- INPUT -->
            <input type="file" name="cover" id="coverInput"
                class="text-sm text-gray-400">

        </div>

        <!-- BUTTON -->
        <div class="col-span-2 flex justify-end mt-4">
            <button
                class="px-6 py-2.5 bg-white text-black rounded-xl font-medium hover:scale-105 transition">
                {{ isset($book) ? 'Update' : 'Simpan' }}
            </button>
        </div>

    </form>

</div>

<script>
document.getElementById('coverInput').onchange = evt => {
    const [file] = evt.target.files
    if (file) {
        const preview = document.getElementById('preview')
        preview.src = URL.createObjectURL(file)
        preview.classList.remove('hidden')
    }
}
</script>

@endsection