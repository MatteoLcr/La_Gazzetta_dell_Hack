<x-layout>

    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-8">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        
                    @foreach($ad as $el)
                        <div class="carousel-item active">
                            <img src="{{$el[0]}}" class="d-block imgDetailCard " alt="...">
                        </div>
                    @endforeach    

                    </div>
                </div>
            </div>
        </div>

        @foreach($categories as $category)
        <div class="row my-5 ">
            <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                <div class="linea"></div>
                <h5 class="categoryName mx-5">{{$category->name}}</h5>
                <div class="linea"></div>
            </div>
        </div>

        <div class="row flex-row justify-content-between align-items-center">
            @foreach($category->articles as $article)

            <div class="col-3 card mx-3" style="width: 18rem;">
                <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    @foreach($article->countries as $country)
                    <a href="{{route('index.country', compact('country'))}}" style="text-decoration: none;"><span class="region px-2">{{$country->name}}</span></a>
                    @endforeach
                    <a href="{{route('show.articles', compact('article'))}}" class="text-decoration-none text-black">
                        <h5 class="card-title mt-2 styleTitle"> {{$article->title}} </h5>
                        <h6 class="card-title"> {{$article->subtitle}} </h6>
                    </a>
                </div>
            </div>

            @endforeach
        </div>

    </div>
    @endforeach

    </div>
</x-layout>