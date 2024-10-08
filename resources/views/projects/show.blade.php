@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $project->name }}</div>

                <div class="card-body">
                    <h5>Description</h5>
                    <p>{{ $project->description }}</p>

                    <h5>Tasks</h5>
                    <ul id="task-list" class="list-group">
                        @foreach ($project->tasks as $task)
                            <li class="list-group-item" data-task-id="{{ $task->id }}">
                                <strong>{{ $task->name }}</strong> - {{ $task->status }}<br>
                                <em>{{ $task->description }}</em>
                                <button class="btn btn-sm btn-info edit-task" data-task-name="{{ $task->name }}" data-task-description="{{ $task->description }}" data-task-status="{{ $task->status }}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-task">Delete</button>
                            </li>
                        @endforeach
                    </ul>

                    <h5 class="mt-4">Add New Task</h5>
                    <form id="create-task-form">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="mb-3">
                            <label for="task-name" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="task-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="task-description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="task-description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="task-status" class="form-label">Status</label>
                            <select class="form-select" id="task-status" name="status" required>
                                <option value="todo">To Do</option>
                                <option value="in-progress">In Progress</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Handle form submission for creating a new task
        $('#create-task-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/projects/' + $(this).find('input[name="project_id"]').val() + '/tasks',
                method: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    $('#task-list').append(
                        `<li class="list-group-item" data-task-id="${data.id}">
                            <strong>${data.name}</strong> - ${data.status}<br>
                            <em>${data.description}</em>
                            <button class="btn btn-sm btn-info edit-task" data-task-name="${data.name}" data-task-description="${data.description}" data-task-status="${data.status}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-task">Delete</button>
                        </li>`
                    );
                    $('#create-task-form')[0].reset();
                },
                error: function(error) {
                    console.error('Error creating task:', error);
                }
            });
        });

        // Handle editing tasks
        $('#task-list').on('click', '.edit-task', function() {
            const taskId = $(this).closest('li').data('task-id');
            const taskName = $(this).data('task-name');
            const taskDescription = $(this).data('task-description');
            const taskStatus = $(this).data('task-status');

            // Pre-fill the form for editing
            $('#task-name').val(taskName);
            $('#task-description').val(taskDescription);
            $('#task-status').val(taskStatus);
            $('#create-task-form').off('submit').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: '/api/projects/' + $(this).find('input[name="project_id"]').val() + '/tasks/' + taskId,
                    method: 'PUT',
                    data: {
                        name: $('#task-name').val(),
                        description: $('#task-description').val(),
                        status: $('#task-status').val(),
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(data) {
                        const listItem = $('#task-list').find(`li[data-task-id="${taskId}"]`);
                        listItem.find('strong').text(data.name);
                        listItem.find('em').text(data.description);
                        listItem.find('span.status').text(data.status);
                        
                        // Clear form
                        $('#create-task-form')[0].reset();
                    },
                    error: function(error) {
                        console.error('Error updating task:', error);
                    }
                });
            });
        });

        // Handle deleting tasks
        $('#task-list').on('click', '.delete-task', function() {
            const taskId = $(this).closest('li').data('task-id');
            const projectId = $('input[name="project_id"]').val();

            $.ajax({
                url: '/api/projects/' + projectId + '/tasks/' + taskId,
                method: 'DELETE',
                success: function() {
                    $('#task-list').find(`li[data-task-id="${taskId}"]`).remove();
                },
                error: function(error) {
                    console.error('Error deleting task:', error);
                }
            });
        });
    });
</script>
@endsection
@endsection
