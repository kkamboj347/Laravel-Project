<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-md bg-white shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret">
            <div class="container">
                <a class="navbar-brand" href="#">
                   <strong>Laravel Project</strong>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 gap-4">
                    @if(Auth::user()?->name)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::user()->name }}</a>

                            <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">                          
                                <li>
                                    <a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                        @else 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.login') }}" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                        </li>
                        <p class="my-2">Welcome, Guest!</p>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
 </nav>
    <div class="bg-dark py-3">
      <h1 class="text-white text-center">Saas Project!</h1>
    </div>
    <div class="container">
      <div class="row d-flex justify-content-center my-5">
        @if(Session::has('success'))
         <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
          <div class="col-md-10 my-5">
            <div class="card border-0 shadow-lg">
              <div class="card-header bg-dark">
                <h4 class="text-center text-white">Login Form</h4>
              </div>
              <div class="card-body">
                <form action ="{{ route('account.authenticate') }}" method="post">
                  @csrf
                <div class="mb-3"> 
                    <label for="email" class="form-label h6">Email</label>
                    <input value="{{ old('email') }}" id="email" type="email" id="email" class="@error('email')is-invalid @enderror form-control form-control-lg" name="email" placeholder="Enter Email">
                    @error('email')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-3"> 
                    <label for="password" class="form-label h6">Password</label>
                    <input value="{{ old('password') }}" id="password" type="password" id="password" class="@error('password')is-invalid @enderror form-control form-control-lg" name="password" placeholder="Enter Password">
                    @error('password')
                      <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="mb-3 d-flex gap-md-4 flex-cloumn justify-content-center">
                    <button type="Submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="mb-3 d-flex gap-md-4 flex-cloumn justify-content-center">
                    <a href="{{ route('account.register') }}" class="link-secondary text-decoration-none">Click For Customer Registeration </a>
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