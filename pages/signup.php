<?php
$title = "Sign Up | SneakerHub";
include './utils/header.php';
?>

<body class="bg-gray-100 flex items-center justify-center h-screen">
     <div class="w-96 bg-gray-200 p-8 rounded-lg shadow-lg">
          <h1 class="text-2xl font-bold mb-4 text-center">SneakerHub</h1>
          <h2 class="text-xl font-semibold mb-2">Sign Up</h2>
          <p class="text-sm text-gray-600 mb-4">Create your account and join the SneakerHub community!</p>
          <form action="" method="POST" class="space-y-4">
               <?php
               include './../func/auth.php';

               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $number = $_POST['number'] ?? '';
                    $password = $_POST['password'] ?? '';

                    $result = signup($name, $email, $number, $password);
                    echo $result;
               }
               ?>
               <input
                    type="text"
                    name="name"
                    placeholder="Full Name"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
               <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
               <input
                    type="number"
                    name="number"
                    placeholder="Phone Number"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
               <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
               <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
                    Sign Up
               </button>
          </form>
          <div class="text-center my-4 text-gray-600">Or</div>
          <button
               onclick="window.location.href='login.php';"
               class="w-full bg-gray-300 text-black py-3 rounded-lg hover:bg-gray-400 transition">
               Login
          </button>
          <div class="text-right mt-4">
               <a href="forgot-password.php" class="text-blue-500 hover:underline">Forgot Password?</a>
          </div>
     </div>
</body>


</html>