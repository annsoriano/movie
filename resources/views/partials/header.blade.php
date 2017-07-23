
<nav class="navbar navbar-fixed-top" style="background-color:rgba(0,0,0,0.5);">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">QWERTY<span src=""></span></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/') }}">HOME</a></li>
      <li><a href="/entry/movie">MOVIES</a></li>
      <li><a href="/entry/tv">TV SHOWS</a></li>
      <li><a href="/entry/new">RECENTLY ADDED</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">GENRE
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          @foreach($genres as $genre)
            <a href="/entry/genre/{{$genre->name}}" value="{{$genre->name}}"><li>{{$genre->name}}</a></li>
          @endforeach
        </ul>
      </li>
    </ul>
    

    <div id="app">
      <ul class="nav navbar-nav navbar-right">

          <!-- Authentication Links -->
        @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ucwords(strtolower(Auth::user()->firstname))}}
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/user/{{auth()->user()->id}}" title="">Profile</a></li>
              <li><a href="/entry/create" title="">Add Entry</a></li>
              <li><a href="/entry/edit-list" title="">Edit</a></li>
              <li><a href="/entry/delete" title="">Delete</a></li>
              <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>

        @endif
      </ul>        
      <div class="navbar-right">
          <input type="text" name="search" id="searchInput" onkeyup="search()" autocomplete="off" class="form-control" placeholder="Search....">
          <ul style="background-color: white;position: absolute" class="list-unstyled list-group" id="results"></ul>
      </div> 
    </div>
  </div>
</nav>
<script>
  function search(){
    var title= $('#searchInput').val();
    $('#results').empty();
    $.ajax({
      url: '/search/' + title,
      success: function(data){
        data.forEach(function(item,index){
          $('#results').append("<a class='list-group-item' href='/entry/" + item['id'] + "''><li>" + item['title'] + "</li></a>");
        });
      }
    });
  }
</script>