@extends('layouts/main')

@section('title')
  DesingStorm | Inspiration For Developers
@endsection

@section('content')

  <div id="site-section">
    <div class="container">
      <div id="results">
        <div>
          <div class="search-container">
            <form class="" action="/results" method="POST">
                @csrf
                <input class="search" type="text" value="{{$search}}" placeholder="Search" name="search">
          </form>
          </div>
          <div class="boxes">
            <div class="row">
              @if (count($filteredData) >= 1)
                @foreach ($filteredData as $inspiration)
                  <div class="col-md-3">
                    <div class="box">
                      <div style="position: relative; background: url('{{ $inspiration->covers->{'202'} }}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        @php
                          $codeUrl = urlencode($inspiration->covers->{'202'})
                        @endphp
                        <a href="/projects/inspiration/{{$inspiration->id}}/add?image_url={{$codeUrl}}">
                          <div class="add-btn @if (in_array($inspiration->id, $arrayInfo))
                            active
                          @endif"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </a>
                      </div>
                      <h4>{{$inspiration->name}}</h4>
                    </div>
                  </div>
                @endforeach
                @else
                  <h1>Sorry no results</h1>
              @endif



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
