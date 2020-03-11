@extends('layouts.cover')
@section('content')
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand dash-brand">Pawn Shop</h3>
        <nav class="nav nav-masthead justify-content-center">
            @if (Route::has('login'))
                @auth
                    <a class="nav-link active" href="{{url('/home')}}">{{Auth::user()->name}}</a>
                @else
                    <a class="nav-link active" href="{{route('login')}}">Login</a>

                    @if (Route::has('register'))
                        <a class="nav-link active" href="{{route('register')}}">Register</a>
                    @endif
                @endauth

            @endif
          <a class="nav-link" href="/forum">Forum</a>
          <a class="nav-link" href="/help">How to use?</a>
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover">
      <h1 class="cover-heading dash-brand">Pawn Shop</h1>
      <p class="lead">
        [sub description about this website]
      </p>
      <p class="lead">
      <a href="{{url('/learn')}}" class="btn btn-lg btn-secondary">More Info</a>
      </p>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>Version beta 1.0</p>
      </div>
    </footer>
  </div>
@endsection
