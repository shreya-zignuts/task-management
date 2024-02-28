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
                <a href="/index"><div class="fs-4 mb-3 mt-2 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"></path>
                    </svg>
                    </div></a>
            </div>
            <div>
                <div class="container text-center mt-5">
                            <ul class="list-group card-body">
                                <li class="list-group-item list-group-item-dark mt-5" aria-current="true">Task Name</li>
                                <li class="list-group-item">{{ $task->title }}</li>
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