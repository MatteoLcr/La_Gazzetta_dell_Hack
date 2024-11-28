<nav class="navbar navbar-expand-lg bg-body-tertiary shadow" data-bs-theme="dark">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarNav">
      
      <ul class="navbar-nav d-flex flex-row justify-content-around align-items-center mx-auto">

        <li class="nav-item">
          <a class="nav-link active mx-5" aria-current="page" href="{{route('welcome')}}"><i class="bi bi-house fs-3"></i></a>
        </li>

        <a class="navbar-brand logo mx-5 text-center" href="#" style="width: 900px;">La Gazzetta dell'HAck</a>

        @auth
        <li class="nav-item dropdown mx-5">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Ciao, {{ Auth::user()->name }}!
          </a>
          <ul class="dropdown-menu">

            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="dropdown-item"" type=" submit">logout</button>
            </form>
            <li><a class="dropdown-item" href="">Visualizza profilo</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('create.articles')}}">Crea un nuovo articolo</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="">Contattaci</a></li>
            <li><a class="dropdown-item" href="">FAQ</a></li>
          </ul>
        </li>
        @endauth

        @guest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Ciao!
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
          </ul>
        </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>


<!-- SOTTONAVBAR -->

<div class="container-fluid">
  <div class="row">
    <div class="col-12 sottonavbar shadow d-flex justify-content-center align-items-center">

      @foreach($categories as $category)
      <div class="mx-4 ">
        <a href="{{route('index.category', compact('category'))}}" class="sottonavbarLink">{{$category->name}}</a>
      </div>
      @endforeach

    </div>
  </div>
</div>

<!-- SOTTONAVBAR2 -->

<div class="container-fluid">
  <div class="row">
    <div class="col-12 sottonavbar2 shadow d-flex justify-content-center align-items-center">

      @foreach($countries as $country)
      <div class="mx-3 ">
        <a href="{{route('index.country', compact('country'))}}" class="sottonavbarLink2">{{$country->name}}</a>
      </div>
      @endforeach

    </div>
  </div>
</div>