<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Saas Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
      <h1 class="text-white text-center">Saas Project!</h1>
    </div>
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
          <a class="btn btn-dark" href="{{ route('tasks.create') }}">Create</a>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        @if (Session::has('success'))
          <div class="col-md-10">
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          </div>
        @endif
        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
              <h3 class="text-white text-center">Tasks</h3>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Task</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @if($tasks->isNotEmpty())
                @foreach($tasks as $task)
                <tr>
                  <td>{{ $task->id }}</td>
                  <td>{{ $task->name }}</td>
                  <td>{{ $task->task }}</td>
                  <td>{{ $task->status }}</td>
                  <td>
                    <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
 </body>
</html>