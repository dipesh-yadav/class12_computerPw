<?php require "includes/loginprocess.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <?php include 'includes/navbar.php'; ?>

</head>


<body>

    <section class="vh-100" style="background-color:black;">

        <div class="container   py-4 h-80">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0"> <!-- gutter space -->
                <div class="col-md-6 col-lg-5 d-none d-md-block ms-auto">
                    <img src="images/logo.jpg"  
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>

                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                    
                        <ul class="nav nav-tabs" id="authTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register">Register</a>
                        </li>
                        </ul>

                        <div class="tab-content mt-3">


                        <!-- Login Form -->
                        <div class="tab-pane fade show active" id="login">

                            <form method="POST">
                                <h5 class="fw-normal mb-3 pb-3">Sign into your account</h5>

                            <?php if (isset($register_success)) 
                                echo "<p class='text-success'>$register_success</p>"; ?>

                            <?php if (isset($login_error)) 
                                echo "<p class='text-danger'>$login_error</p>"; ?>

                            <div class="form-outline mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" required />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" class="form-control form-control-lg" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>
                            </form>
                        </div>

                        <!-- Registration Form -->
                        <div class="tab-pane fade" id="register">
                            <form method="POST">
                            <h5 class="fw-normal mb-3 pb-3">Create a new account</h5>

                            
                            <?php if (isset($register_error)) echo "<p class='text-danger'>$register_error</p>"; ?>

                            <div class="form-outline mb-4">
                                <input type="text" name="name" class="form-control form-control-lg" required />
                                <label class="form-label" for="name">Full Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" required />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" class="form-control form-control-lg" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-dark btn-lg btn-block" type="submit" name="register">Register</button>
                            </form>
                        </div>
                        </div>

                        <p class="mt-4 text-muted small">By signing in, you agree to our Terms of Use and Privacy Policy.</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
