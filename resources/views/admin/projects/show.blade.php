@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <div class="card">
            <ul>
                <li> <strong> ID </strong> {{ $project['id']}}</li>
                <li> <strong>Title</strong> {{ $project['title']}}</li>
                <li> <strong>Description</strong> {{ $project['description']}}</li>
                <li> <strong>Number of attachments</strong> {{ $project['attachments']}}</li>
                <li> <strong>Last modified</strong> {{ $project['last_modified']}}</li>
            </ul>
            <div class="d-flex p-2">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-primary ">Go back</a>
                <a href="{{ route('admin.projects.edit',$project->id) }}" class="btn btn-sm btn-success mx-3">Edit</a>
                <a href="" class="btn btn-sm btn-warning">Destroy</a>
            </div>
        </div>
    </div>
</div>

@endsection
