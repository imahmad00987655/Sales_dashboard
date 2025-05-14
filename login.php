<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect to dashboard
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if username is empty
    if(empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)) {
        // For demo purposes, allow any login with demo/demo
        if($username == "admin" && $password == "admin") {
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = 1;
            $_SESSION["username"] = $username;
            
            // Redirect user to dashboard
            header("location: index.php");
            exit;
        } else {
            // Username or password is invalid
            $login_err = "Invalid username or password. Try admin/admin.";
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .login-card {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-700 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="login-card max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="bg-indigo-600 p-6">
            <div class="flex justify-center">
                <svg class="h-12 w-12 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.75L19.25 9L12 13.25L4.75 9L12 4.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M9.25 12L4.75 15L12 19.25L19.25 15L14.6722 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <h1 class="mt-4 text-center text-2xl font-bold text-white">Admin Dashboard</h1>
            <p class="mt-1 text-center text-sm text-indigo-200">Sign in to access your dashboard</p>
        </div>
        
        <div class="p-6">
            <?php 
            if(!empty($login_err)){
                echo '<div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">';
                echo '<p class="font-bold">Error</p>';
                echo '<p>' . $login_err . '</p>';
                echo '</div>';
            }        
            ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="username" id="username" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:text-sm <?php echo (!empty($username_err)) ? 'border-red-500' : ''; ?>" placeholder="Enter username" value="<?php echo $username; ?>">
                    </div>
                    <?php if(!empty($username_err)): ?>
                        <p class="mt-1 text-sm text-red-500"><?php echo $username_err; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:text-sm <?php echo (!empty($password_err)) ? 'border-red-500' : ''; ?>" placeholder="Enter password">
                    </div>
                    <?php if(!empty($password_err)): ?>
                        <p class="mt-1 text-sm text-red-500"><?php echo $password_err; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
            
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Demo Credentials</span>
                    </div>
                </div>
                
                <div class="mt-4 text-center text-sm text-gray-600">
                    <p>Username: <span class="font-bold">admin</span></p>
                    <p>Password: <span class="font-bold">admin</span></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 