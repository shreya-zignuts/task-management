<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <body>
        <h3 class="text-center h3 mt-3">My Tasks</h3>
        <div class="container text-center">
            <table class="table table-secondary table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                    <th scope="col pl-3 table-dark">Task Name</th>
                    <th scope="col">Due Date</th>
                    <th scope="col" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->due_date }}<t/td>
                        <td><a href="{{ url('task/')}}/{{ $task->id}}"><i class="bi bi-eye"></i></a></td>
                        <td><a href="{{ url('edit')}}/{{ $task->id}}"><i class="bi bi-pen"></i></a></td>
                        <td>
                            <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="post">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    {{ $tasks->links() }}
                </tbody>
            </table>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <div class="container text-center">
                <a href="/view"><button class="btn btn-secondary p-2">Create New Task</button></a>
            </div>
            </x-app-layout>
    </body>

</html>