<x-layout>
    <div class="row">
        <div class="col-12 d-flex flex-row justify-content-between align-items-center">
            @forelse($categories->articles as $article)
            <div class="col-3 card m-4" style="width: 18rem;">
                <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    @foreach($article->countries as $country)
                    <span class="region px-2">{{$country->name}}</span>
                    @endforeach
                    <a href="{{route('show.articles', compact('article'))}}" class="text-decoration-none text-black">
                        <h5 class="card-title mt-2 styleTitle"> {{$article->title}} </h5>
                        <h6 class="card-title"> {{$article->subtitle}} </h6>
                    </a>
                </div>
            </div>
            @empty
            <h3 class="text-center">
                Ancora nessun articolo con questo tag associato
            </h3>
            @endforelse
        </div>
    </div>
</x-layout>