@extends('layouts/account')

@section('title')
  Account | Dashboard
@endsection

@section('content')
  <div>
    <div class="row">
      <div class="col-md-10">
        <h1>Edit Project</h1>
        <h6>This is where all your projects are located</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="row">
            <div class="col-md-10">
              <form class="" action="/account/projects/{{$project->id}}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="row">
                  <div class="col-md-6">
                    <label for="title">Title</label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="title" value="{{$project->title}}" placeholder="Project Title">
                  </div>
                </div>
                <div class="img-section">
                  <div class="row">
                    @foreach ($project->inspirations as $inspiration)

                    <div class="col-md-3">
                      <div class="box">
                        <div style="position: relative; background: url('{{$inspiration->image_url}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                        </div>
                        <a href="/projects/inspiration/{{$inspiration->img_info}}/delete" onclick="confirm()">Delete Inspiration</a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <button type="submit" name="button">Save</button>
              </form>
            </div>
            <div class="col-md-2">
              <a href="/account/projects/id/delete" onclick="confirm()" class="delete-btn">Delete</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
  <script>

  </script>
@endsection
