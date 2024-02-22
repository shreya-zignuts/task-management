<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.css">
</head>
<x-app-layout>

    <body>
        <div class="mx-auto" style="width: 60%;">
            <h1 class="text-center h1">All Task Details</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Task Name</th>
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
                            <td>{{ $task->due_date }}</td>
                            <td><a href="{{ url('task/view') }}/{{ $task->tasks_id }}"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View</a>
                            </td>
                            <td><a href="{{ url('task/edit/') }}/{{ $task->tasks_id }}"
                                    class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('task/delete/') }}/{{ $task->tasks_id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{-- {{ dd('here') }} --}}
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                <a href="{{ route('task.create') }}"><button type="button" class="rounded-mg bg-red-800 text-white focus:ring-red-600 px-4 py-2">Add new task</button></a>
            </div>

        </div>
    </body>
</x-app-layout>

</html>