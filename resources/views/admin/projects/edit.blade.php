@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Insert Project Title" name="title" value="{{ old ('title', $project->title) }}">
            </div>


            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="text" class="form-control" id="image" placeholder="https://...." name="image" value="{{ old ('image', $project->image) }}">
            </div>

            @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlInput1">Date</label>
                <input type="date" class="form-control" id="project_start" name="project_start" placeholder="Type date of start" value="{{ old ('project_start', $project->project_start) }}">
            </div>

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="content" rows="10" name="content" placeholder="Insert Your Content">
                {{ old ('content', $project->content) }}
                </textarea>
            </div>
            <div class="mb-3">
                <button type="submit">
                    Update 
                </button>
                <button type="reset">
                    Reset
                </button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
