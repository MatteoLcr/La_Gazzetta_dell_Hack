<x-layout>
    <div class="container-fluid">
        <div class="row">
            <h3>TUTTI GLI ARTICOLI</h3>
            
            @foreach($articles as $article)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> {{$article->title}} </h5>
                        <h6 class="card-title"> {{$article->subtitle}} </h6>
                        <p class="card-text"> {{$article->body}} </p>
                        <a href="{{route('show.articles', compact('article'))}}" class="btn btn-primary">Leggi articolo completo</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-layout>