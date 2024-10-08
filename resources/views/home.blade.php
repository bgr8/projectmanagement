@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h5 class="mt-4">Projects</h5>
                    <ul id="project-list" class="list-group">
                        <!-- Project list will be populated here -->
                    </ul>

                    

                    <h5 class="mt-4">Create New Project</h5>
                    <form id="create-project-form">
                        @csrf
                        <div class="mb-3">
                            <label for="project-name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="project-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="project-description" class="form-label">Project Description</label>
                            <textarea class="form-control" id="project-description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

<script>
    // Function to fetch and display projects
    function fetchProjects() {
        $.ajax({
            url: '/api/projects',
            method: 'GET',
            success: function(data) {
                $('#project-list').empty(); // Clear the list
                data.forEach(function(project) {
                    $('#project-list').append(
                        `<li class="list-group-item">
                            <strong>${project.name}</strong><br>
                            ${project.description}
                        </li>`
                    );
                });
            },
            error: function(error) {
                console.error('Error fetching projects:', error);
            }
        });
    }

    // Call fetchProjects on page load
    $(document).ready(function() {
        fetchProjects();

        // Handle form submission for creating a new project
        $('#create-project-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                url: '/api/projects',
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    // Add new project to the list
                    $('#project-list').append(
                        `<li class="list-group-item">
                            <strong>${data.name}</strong><br>
                            ${data.description}
                        </li>`
                    );
                    // Clear the form
                    $('#create-project-form')[0].reset();
                },
                error: function(error) {
                    console.error('Error creating project:', error);
                }
            });
        });
    });
</script>
@endsection
@endsection
