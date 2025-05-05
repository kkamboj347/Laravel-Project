<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login Customer</title>
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
              <div class="card-header bg-dark">
                <h4 class="text-center text-white">Register Form</h4>
              </div>
              <div class="card-body">
                <form method="post">
                  @csrf
                <div class="mb-3"> 
                    <label for="name" class="form-label h6">Name</label>
                    <input value="{{ old('name') }}" type="name" class="@error('name')is-invalid @enderror form-control form-control-lg" name="name" placeholder="Enter Name">
                    @error('name')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-3"> 
                    <label for="email" class="form-label h6">Email</label>
                    <input value="{{ old('email') }}" type="email" class="@error('email')is-invalid @enderror form-control form-control-lg" name="email" placeholder="Enter Email">
                    @error('email')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-3"> 
                    <label for="email_verified_at" class="form-label h6">Email Verified At</label>
                    <input value="{{ old('email_verified_at') }}" type="email" class="@error('email_verified_at')is-invalid @enderror form-control form-control-lg" name="email_verified_at" placeholder="Enter Email Verified">
                    @error('email_verified_at')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-3"> 
                    <label for="password" class="form-label h6">Password</label>
                    <input value="{{ old('password') }}" type="password" class="@error('password')is-invalid @enderror form-control form-control-lg" name="password" placeholder="Enter Password">
                    @error('password')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <button type="Submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div
        </div>
      </div>
    </div>
  </body>
</html>