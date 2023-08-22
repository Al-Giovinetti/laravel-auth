@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <th scope="row">{{ $project['id'] }}</th>
                    <td> {{ $project['title'] }} </td>
                    <td> {{ $project['description'] }}</td>
                    <td class="d-flex">
                        <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-sm btn-primary ">View</a>
                        <a href="" class="btn btn-sm btn-success mx-3">Edit</a>
                        <a href="" class="btn btn-sm btn-warning">Destroy</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $projects->links() }}
        <div class="new-project d-flex justify-content-center">
            <a href="{{route('admin.projects.create') }}" class="btn btn-primary w-25 ">Create a new project</a>
        </div>
    </div>    
</div>

@endsection
