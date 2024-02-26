<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Tasks</title>
    <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<x-app-layout>
    <body>
      <div>
      <div class="container text-center mt-5">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark mt-5" aria-current="true">Task Name</li>
                <li class="list-group-item">{{ $task->task_name }}</li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark mt-5" aria-current="true">Description</li>
                <li class="list-group-item">{{ $task->description }}</li>
            </ul> 
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark mt-5" aria-current="true">Due Date</li>
                <li class="list-group-item">{{ $task->due_date }}</li>
            </ul> 
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</x-app-layout>

</html>