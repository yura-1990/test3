@extends('welcome')

@section('content')
    <div class="w-50 mx-auto mt-5">
        <h4 class="text-center ">Edit Category</h4>
        <a href="{{route('category.show', ['category'=>$product->category->id])}}" class="my-3 d-flex">Home</a>
        <form class="needs-validation" method="POST" action="{{ route('product.update',['product'=>$product->id]) }}" >
            @csrf
            @method('PUT')
            <input class="form-control mb-3" name="title" value="{{ $product->title }}" type="text">
            <input class="form-control mb-3" name="category_id" value="{{ $product->category->id }}" type="hidden">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
        </form>
    </div>
@endsection
