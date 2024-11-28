<x-layout>
    <div class="container-fluid">
        <div class="row">
            <h3>DETTGLIO ARTICOLO</h3>

            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex">
                            <h6>Tag: @foreach ($article->categories as $category)
                                <a href="{{route('index.category', compact('category'))}}" class="btn btn-outline-secondary">{{ $category->name }}</a>
                                @endforeach
                            </h6>
                        </div>
                        <h5 class="card-title"> {{$article->title}} </h5>
                        <h6 class="card-title"> {{$article->subtitle}} </h6>
                        <p class="card-text"> {{$article->body}} </p>
                        <div class="d-flex flex-row justify-content-between ">
                            <!-- MODIFICA -->
                            <a href="{{route('edit.articles', compact('article'))}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <!-- ELIMINA -->
                            <form action="{{ route('delete.articles', compact('article')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    onclick="confirm('Sei sicuro di voler cancellare?')"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height:100px">

    </div>
</x-layout>