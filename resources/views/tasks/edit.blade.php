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
      <div class="row d-flex justify-content-center">
          <div class="col-md-10 my-5">
            <div class="card border-0 shadow-lg">
              <div class="card-header">
                <h4 class="text-center">Edit Task</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('tasks.update',$task->id) }}" method="post">
                  @method('put')
                  @csrf
                <div class="mb-3"> 
                  <label for="name" class="form-label h6">Name</label>
                  <input value="{{ old('name', $task->name) }}" type="text" class="@error('name')is-invalid @enderror form-control form-control-lg" name="name" placeholder="Enter Name">
                  @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="task" class="form-label h6">Task</label>
                  <textarea type="text" value="{{ old('task', $task->task) }}" class="@error('task')is-invalid @enderror form-control form-control-lg" cols="30" rows="5" name="task" placeholder="Enter Task">{{ old('task',$task->task) }}</textarea>
                  @error('task')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="task" class="form-label h6">Staus</label>
                  <input type="text" value="{{ old('status',$task->status) }}" class="@error('status')is-invalid @enderror form-control form-control-lg" name="status" placeholder="Enter Status">
                  @error('status')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
</body>
</html>