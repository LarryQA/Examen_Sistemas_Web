<nav class="navbar navbar-expand-lg bg-light px-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="inicio">SuperClass</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @auth
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="/recibidas">Clases que recibo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/impartidas">Clases que imparto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/nueva-clase">Nueva clase</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/unirse">Unirse a una clase</a>
          </li>
      </ul>
      </div>

    <form class="d-flex" >
        
        <ul class="navbar-nav mr-5 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <p>{{ auth()->user()->primer_nombre}} {{ auth()->user()->primer_apellido}}</p>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Configurar cuenta</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout">Cerrar seción</a></li>
              </ul>
            </li>
            
        </ul>

        {{-- @include('clases.nueva-clase')
        @include('clases.unirse') --}}

        @endauth

        @guest
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="mr-3"><a href="/login"  class="btn btn-primary" role="button">Inicia Seción</a></li>
            <li><a href="/register"  class="btn btn-success" role="button">Regístrate</a></li>   
        </ul>
        
        
        @endguest
        
      
     </form>      
    </div>
  </nav>
