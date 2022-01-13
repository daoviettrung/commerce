@extends('layouts.admin')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Created</th>
                <th scope="col">Tool</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $cate)
                <tr>
                    <td class="column-show">{{ $cate->name }}</td>
                    <td class="column-show">{{ $cate->description }}</td>
                    <td><img class="image-show" src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                            alt="Image here"></td>
                    <td>{{ $cate->created_at }}</td>
                    <td>
                        <button class="btn-tool bg-warning"><a href="{{ url('categories/' . $cate->id . '/edit') }}"><i
                                    class="far fa-edit"></i></a></button>
                        <form class="mt-1" method="POST" action="{{ url('categories/' . $cate->id) }}">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure you want to delete?')" class="btn-tool bg-danger" type="submit"><i
                                    class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
