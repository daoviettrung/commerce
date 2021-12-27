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
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->description }}</td>
                    <td><img class="image-show" src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                            alt="Image here"></td>
                    <td>{{ $cate->created_at }}</td>
                    <td>
                        <a href= "{{url('categories/'.$cate->id.'/edit')}}"><i class="far fa-edit"></i></a>
                        <a class=""><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
