@extends('welcome')

@section('content')
    <main>
        <div class="py-5 text-center">
            <h2>Catalog List</h2>
        </div>
        <div>
            <a href="{{ route('catalog.create') }}" class="btn btn-dark float-end">Add</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Catalog</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($catalogs as $catalog)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td><a  href="{{ route('catalog.show', ['catalog'=>$catalog->id]) }}">{{ $catalog->title }}</a></td>
                    <td>
                        @if(count($catalog->category)>0)
                        <select class="form-select">
                            @foreach($catalog->category as $item)
                                <option>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @else
                            Not category
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('catalog.edit',['catalog'=>$catalog->id]) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('catalog.delete', ['catalog'=>$catalog->id]) }}" method="POST">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </main>
@endsection

