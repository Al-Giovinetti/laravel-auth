@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <form action="{{ route('admin.projects.store') }}" method="post" class="card p-3">
        @csrf

            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex flex-column">
                <label for="title">Title</label> 
                <input type="text" name="title" id="title">
            </div>

            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-column">
                <label for="title">Image</label> 
                <input type="text" name="image" id="image">
            </div>

            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-column">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            @error('attachments')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-flex flex-column">
                <label for="attachments">Attachments</label>
                <input type="number" name="attachments" id="attachments" placeholder="Insert number of attachments file's">
            </div>
            
            <div class="d-flex p-2">
                <button type="submit" class="btn btn-sm btn-primary">
                    Create
                </button>
                <a href="{{route('admin.projects.index')}}" class="btn btn-sm btn-secondary ms-3">Go back</a>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
