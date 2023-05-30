@extends('layouts.admin')

@section('content')

    <div id="dashboard-container" class="container p-5">
        
        <h1 class="display-5 fw-bold mb-5">
            Welcome to your projects portfolio, {{ Auth::user()->name }}!
        </h1>

        <h2>This is your administration page.</h2>

        <h4 class="mb-5">Here you can choose what to do next.</h4>

        <div class="content">

            <h5 class="my-3">Projects:</h5>

            <div>
                <button class="btn btn-dark">
                    <a href="{{route('admin.projects.index')}}">Show all projects</a>
                </button>
    
                <button class="btn btn-dark">
                    <a href="{{route('admin.projects.create')}}">Add a new project</a>
                </button>
            </div>

            <h5 class="my-3">Project types:</h5>

            <div>
                <button class="btn btn-dark">
                    <a href="{{route('admin.types.index')}}">Show all types</a>
                </button>
    
                <button class="btn btn-dark">
                    <a href="{{route('admin.types.create')}}">Add a new type</a>
                </button>
            </div>

            <h5 class="my-3">Technologies:</h5>

            <div>
                <button class="btn btn-dark">
                    <a href="{{route('admin.technologies.index')}}">Show all technologies</a>
                </button>
    
                <button class="btn btn-dark">
                    <a href="{{route('admin.technologies.create')}}">Add a new technology</a>
                </button>
            </div>
            
        </div>

    </div>

@endsection