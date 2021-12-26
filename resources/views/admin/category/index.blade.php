@extends('layouts.admin')
@section('content')
    <div>
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
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <a><i class="far fa-edit"></i></a>
                    <a class=""><i class="far fa-trash-alt"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection