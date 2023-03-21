@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">

        <h1 class="my-3">
            Update Project
        </h1>

        {{-- Errors --}}
        @include('partials.errors')

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $project->title) }}" id="title" required maxlength="100" placeholder="Write the title of the project...">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug *</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $project->slug) }}" required maxlength="100" placeholder="Write the slug...">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year *</label>
                <input type="number" class="form-control" name="year" id="year" required min="1970" max="2030" value="{{ old('year', $project->year) }}" placeholder="Write when you have worked on the project...">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image url</label>
                <input type="text" class="form-control" name="image" id="image" value="{{ old('image', $project->image) }}" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Inserisci una descrizione...">{{ old('description', $project->description) }}" </textarea>
            </div>
            <div class="mb-3">
                <p>
                    The fields with * are <strong>compulsory</strong>.
                </p>
            </div>

            <div>
                {{-- Update --}}
                <button type="submit" class="btn btn-success">
                    Update
                </button>

                 {{-- Delete --}}
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Delete comic
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to DELETE this project?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                No, come back
                            </button>
                            <button type="submit" class="btn btn-danger">
                                Yes, delete the project
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </form>
    </div>
</div>
@endsection