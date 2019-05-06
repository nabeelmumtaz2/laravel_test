@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Tv Show</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('favourites.update', $tvShow->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="Season">Season:</label>
                <input type="text" class="form-control" name="Season" value={{ $tvShow->Season }} />
            </div>

            <div class="form-group">
                <label for="Episode">Episode:</label>
                <input type="text" class="form-control" name="Episode" value={{ $tvShow->Episode }} />
            </div>

            <div class="form-group">
                <label for="Quote">Quote:</label>
                <input type="text" class="form-control" name="Quote" value={{ $tvShow->Quote }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection