@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add favourite TV show
  </div>
  <img src="https://picsum.photos/200/300.jpg"/>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('favourites.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Season: </label>
              <input type="text" class="form-control" name="Season"/>
          </div>
          <div class="form-group">
              <label for="price">Episode: </label>
              <input type="text" class="form-control" name="Episode"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quote:</label>
              <input type="text" class="form-control" name="Quote"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection