<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Tasks</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>
            <div class="row">
                <div class="col-md-12">

                    <!-- Validate fields -->
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                            {{$error}}<br>
                        @endforeach
                    </div>
                    @endif

                    <form method="post" action="/saveTask">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here">
                        <br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                    </form>
                    <br>
                    <br>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Task</th>
                                <th>Completed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Add retrieved data to the table and display -->
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>
                                        <!-- Show whether the task is completed or not -->
                                        @if($task->iscompleted)
                                            <button class="btn btn-success">Completed</button>
                                        @else
                                            <button class="btn btn-warning">Not Completed</button>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Mark task as completed or not completed -->
                                        @if(!$task->iscompleted)
                                            <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                                        @else
                                            <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark As Not Completed</a>
                                        @endif
                                        <a href="/updatetask/{{$task->id}}" class="btn btn-success">UPDATE</a>
                                        <a href="/deletetask/{{$task->id}}" class="btn btn-warning">DELETE</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
