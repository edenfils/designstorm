@extends('layouts/main')

@section('title')
  DesingStorm | Inspiration For Developers
@endsection

@section('content')

<div id="site-section">
  <div class="container">
    <div id="home">
      <div class="search-area">
        <div class="search-container">
          <h1>DesignStorm</h1>
          <form class="" action="/results" method="POST">
              @csrf
              <input class="search" type="text" value="" placeholder="Search" name="search">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
