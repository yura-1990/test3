@extends('welcome')

@section('content')
    <div class="w-50 mx-auto mt-5">
        <h4 class="text-center ">Add category to {{ $category->title }}</h4>
        <a href="{{route('category.show', ['category'=>$category->id])}}" class="my-3 d-flex">Home</a>
        <form class="needs-validation" method="POST" action="{{ route('product.store') }}" >
            @csrf
            <input class="form-control mb-3" name="title" placeholder="Title of catalog" type="text">
            <input class="form-control mb-3" name="category_id" placeholder="Title of product" type="hidden" value="{{ $category->id }}">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
        </form>
    </div>
@endsection

