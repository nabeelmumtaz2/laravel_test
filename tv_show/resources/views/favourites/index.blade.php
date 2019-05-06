@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<h2></h2>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">What’s your favourite TV show?</h1>    
	<a href="{{ route('favourites.create')}}" class="btn btn-primary">Create</a>
	<h2></h2>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Season</td>
          <td>Episode</td>
          <td>Quote</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tvShows as $tvShow)
        <tr>
            <td>{{$tvShow->id}}</td>
            <td>{{$tvShow->Season}}</td>
            <td>{{$tvShow->Episode}}</td>
			<td>{{$tvShow->Quote}}</td>
            <td>
                <a href="{{ route('favourites.edit',$tvShow->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('favourites.destroy', $tvShow->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection