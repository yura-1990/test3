@extends('welcome')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Catalog: {{ $catalog->title }}</h1>
            <div>
                <a href="{{ route('catalog.index') }}" type="button">Go Back</a>
                <a href="{{ route('category.create', ['catalog'=>$catalog->id]) }}" class="btn btn-dark float-end">Add</a>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($catalog->category as $item)
                    <tr>
                       <td>{{ $loop->index + 1 }}</td>
                       <td><a href="{{ route('category.show',['category'=>$item->id]) }}">{{ $item->title }}</a></td>
                       <td>
                           @if(count($item->products)>0)
                               <select class="form-select">
                                   @foreach($item->products as $prod)
                                       <option>{{ $prod->title }}</option>
                                   @endforeach
                               </select>
                           @else
                               Not Product
                           @endif

                       </td>
                        <td class="d-flex">
                            <a href="{{ route('category.edit',['category'=>$item->id]) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('category.delete', ['category'=>$item->id]) }}" method="POST">
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
