@extends('layouts.admin')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Original price</th>
                <th scope="col">Selling price</th>
                <th scope="col">Trending</th>
                <th scope="col">Created</th>
                <th scope="col">Tool</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="column-show">{{ $product->name }}</td>
                    <td class="column-show">{{ $product->categories->name }}</td>
                    <td class="column-show">{{ $product->description }}</td>
                    <td><img class="image-show" src="{{ asset('assets/uploads/product/' . $product->image) }}"
                            alt="Image here"></td>
                    <td>{{ $product->original_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ ($product->trending)== "1"? "yes":"no" }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <button class="btn-tool bg-warning"><a href="{{ url('product/' . $product->id . '/edit') }}"><i
                                    class="far fa-edit"></i></a></button>
                        <form class="mt-1" method="POST" action="{{ url('product/' . $product->id) }}">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure you want to delete?')" class="btn-tool bg-danger"
                                type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
