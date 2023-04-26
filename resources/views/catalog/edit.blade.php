@extends('welcome')

@section('content')
    <div class="w-50 mx-auto mt-5">
        <h4 class="text-center ">Add catalog</h4>
        <a href="{{route('catalog.index')}}" class="my-3 d-flex">Home</a>
        <form class="needs-validation" method="POST" action="{{ route('catalog.update',['catalog'=>$catalog->id]) }}" >
            @csrf
            @method('PUT')
            <input class="form-control mb-3" name="title" value="{{ $catalog->title }}" type="text">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
        </form>
    </div>
@endsection
