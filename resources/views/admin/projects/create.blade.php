@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
        <h1 class="my-3">
            Projects
        </h1>

        {{-- Errors --}}
        @include('partials.errors')

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" id="title" required maxlength="100" placeholder="Write the title of the project...">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug *</label>
                <input type="text" class="form-control" name="slug" id="slug" required maxlength="100" placeholder="Write the slug...">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year *</label>
                <input type="number" class="form-control" name="year" id="year" required min="1970" max="2030" placeholder="Write when you have worked on the project...">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image url</label>
                <input type="text" class="form-control" name="image" id="image">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Inserisci una descrizione..."></textarea>
            </div>
            <div class="mb-3">
                <p>
                    The fields with * are <strong>compulsory</strong>.
                </p>
            </div>
            <div>
                <button type="submit" class="btn btn-success">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection