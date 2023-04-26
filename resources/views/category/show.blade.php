@extends('welcome')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold"> Category: {{ $category->title }}</h1>
            <div>
                <a href="{{ route('catalog.show', ['catalog'=>$catalog_id]) }}" type="button">Go Back</a>
                <a href="{{ route('product.create', ['category'=>$category->id]) }}" class="btn btn-dark float-end">Add</a>
            </div>


            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Products</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category->products as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="{{ route('product.show', ['product'=>$item->id]) }}">{{ $item->title }}</a></td>
                        <td class="d-flex">
                            <a href="{{ route('product.edit', ['product'=>$item->id]) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('product.delete', ['product'=>$item->id]) }}" method="POST">
                                @csrf
                                @method('Delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>


        </div>
    </div>
@endsection
