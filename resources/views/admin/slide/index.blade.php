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
            @foreach ($slides as $slide)
                <tr>
                    <td class="column-show">{{ $slide->name }}</td>
                    <td class="column-show">{{ $slide->description }}</td>
                    <td><img class="image-show" src="{{ asset('assets/uploads/slide/' . $slide->image) }}"
                            alt="Image here"></td>
                    <td>{{ $slide->created_at }}</td>
                    <td>
                        <button class="btn-tool bg-warning"><a href="{{ url('slide/' . $slide->id . '/edit') }}"><i
                                    class="far fa-edit"></i></a></button>
                        <form class="mt-1" method="POST" action="{{ url('slide/' . $slide->id) }}">
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
