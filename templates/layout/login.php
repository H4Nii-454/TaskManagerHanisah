<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap 5 CDN -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        /* Background for the whole page */
        body {
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            font-family: Arial, sans-serif;
        }

        /* Main login card */
        .login-card {
            width: 900px;          /* Card width */
            max-width: 95%;        /* Responsive */
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        /* Left section (image/logo area) */
        .logo-section {
            background: #0d6efd;   /* Bootstrap primary blue */
            color: white;
            min-height: 500px;
        }

        /* Force image to be smaller */
        .logo-section img {
            width: 120px !important;       /* Fixed width */
            max-width: 120px !important;   /* Prevent Bootstrap from enlarging it */
            height: auto !important;       /* Keep image proportion */
            display: block;
            margin: 0 auto 1.5rem auto;    /* Center image */
            object-fit: contain;
        }

        /* Responsive for tablets/mobile */
        @media (max-width: 768px) {
            .logo-section {
                min-height: 250px;
                padding: 2rem !important;
            }

            .logo-section img {
                width: 90px !important;
                max-width: 90px !important;
            }
        }
    </style>
</head>
<body>

    <!-- Center the login card horizontally and vertically -->
    <div class="d-flex justify-content-center align-items-center vh-100">

        <!-- Login Card -->
        <div class="card login-card shadow-lg">

            <!-- Two-column layout -->
            <div class="row g-0">

                <!-- Left Column: Image Section -->
                <div class="col-md-6 logo-section d-flex flex-column justify-content-center align-items-center text-center p-4">

                    <!-- Logo Image -->
                    <img
                        src="logo.png"
                        alt="Task Manager"
                        class="img-fluid rounded shadow mb-4"
                    >

                    <h3 class="fw-bold">Welcome Back</h3>
                    <p class="mb-0">Please login to continue.</p>
                </div>

                <!-- Right Column: Login Form -->
                <div class="col-md-6 bg-white">
                    <div class="card-body p-5">

                        <!-- Form Title -->
                        <h3 class="text-center mb-4 fw-bold">Login</h3>

                        <!-- Email -->
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            id="email"
                            class="form-control mb-3"
                            placeholder="Enter your email"
                        >

                        <!-- Password -->
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            id="password"
                            class="form-control mb-3"
                            placeholder="Enter your password"
                        >

                        <!-- Forgot Password -->
                        <div class="text-end mb-3">
                            <a href="#" class="text-decoration-none small">
                                Forgot Password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid">
                            <a href="dashboard.php" class="btn btn-primary btn-lg">
                                Login
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle CDN -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>

   
    
