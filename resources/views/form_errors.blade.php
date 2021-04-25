@if ($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            @foreach ($errors->all() as $key => $error)
                <div class="mb-2">
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
            @endforeach
    </div>

@endif