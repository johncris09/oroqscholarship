<!DOCTYPE html>
<html>
  <head>
    <title>Login Form Overlapping Background Image</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
      /* Custom styles for the background image and the login form */
      body {
        background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/800px-Image_created_with_a_mobile_phone.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        overflow: hidden;
      }
      .login-form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.8);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      }
      .form-control {
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #fff;
        border-radius: 0;
        box-shadow: none;
        color: #fff;
      }
      .form-control:focus {
        border-color: #fff;
        box-shadow: none;
      }
      .form-label {
        color: #fff;
      }
      .btn-primary {
        background-color: #fff;
        border: none;
        border-radius: 5px;
        color: #000;
      }
      .btn-primary:hover {
        background-color: #000;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
          <div class="login-form">
            <h2 class="mb-3">Login</h2>
            <form>
              <div class="form-group">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
