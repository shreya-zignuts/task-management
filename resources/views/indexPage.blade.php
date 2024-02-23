<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <body>
        <div class="container text-center">
            <h2 class="text-lg font-medium text-gray-900 mt-5">
                {{ __('Stay Organized') }}
             </h2>
            <table class="table table-secondary table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                    <th scope="col pl-3 table-dark">Task Name</th>
                    <th scope="col">Due Date</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->taskname }}</td>
                        <td>{{ $task->due_date }}<t/td>
                        <td><a href="{{ url('test/')}}/{{ $task->tasks_id}}"><i class="bi bi-eye"></i></a></td>
                        <td><a href="{{ url('test/edit')}}/{{ $task->tasks_id}}"><i class="bi bi-pen"></i></a></td>
                        <td>
                            <form action="{{ route('task.delete', ['tasks_id' => $task->tasks_id]) }}" method="post">
                                @csrf
                                <button type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <div class="container text-center">
                <a href="/test/view"><button class="btn btn-secondary p-2">Create New Task</button></a>
            </div>
            </x-app-layout>
    </body>

</html>