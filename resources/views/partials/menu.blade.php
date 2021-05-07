<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand" >BookApp</span>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="{{ url('/') }}">Accueil <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
            aria-expanded="false"> <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>Genres <span
              class="caret"></span></a>
          <ul class="dropdown-menu">

            @if (isset($genres))
            @forelse($genres as $id => $name)
            <li><a href="{{ url('genre', $id) }}">{{ $name }}</a></li>

            @empty
            <li>Aucun genre pour l'instant</li>
            @endforelse
            @endif
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        {{-- renvoie true si vous êtes connecté --}}
        @if (Auth::check())
        <li><a href="{{ route('book.index') }}">Dashboard</a></li>
        <li><a href="{{ route('logout') }}""
                onclick=" event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>