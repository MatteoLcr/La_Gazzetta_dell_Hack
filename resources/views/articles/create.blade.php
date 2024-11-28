<x-layout>
    <div class="container min-vh-100 py-5">
        <div class="row  align-items-center justify-content-center pt-5">
            <div class="col-12 py-4">
                <h3 class="text-center text-white display-4 text-shadow-dark">
                    Inserisci i dati del libro
                </h3>
            </div>
        </div>

        <div class="row justify-content-center pt-4">

            <div class="col-12 col-md-6">

                <form action="{{ route('store.articles') }}" method="POST" class="rounded shadow p-5 bg-light"
                    enctype="multipart/form-data">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="cover">Immagine di copertina</label>
                        <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                        @error('cover')
                            <p class="text-danger fst-italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo Articolo</label>
                        <input value="{{ old('title') }}" type="text" name="title"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <p class="text-danger fst-italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input value="{{ old('subtitle') }}" type="text" name="subtitle"
                            class="form-control @error('subtitle') is-invalid @enderror">
                        @error('subtitle')
                            <p class="text-danger fst-italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="body">Articolo</label>
                        <textarea name="body" id="body" cols="30" rows="10"
                            class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-danger fst-italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categories" class="form-label">Seleziona dei generi:</label>
                        <select name="categories[]" id="categories" class="form-control" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="countries" class="form-label">Seleziona la Regione:</label>
                        <select name="countries" id="countries" class="form-control" >
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"> {{ $country->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-custom">Crea articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>