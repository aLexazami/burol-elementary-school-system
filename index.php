<section><!DOCTYPE html></section>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles.css" rel="stylesheet">
  <title>Burol Elementary School</title>
</head>
<body class="bg-gradient-to-b from-white to-emerald-800 h-screen">
  <!-- Header Section -->
  <header class=" bg-white shadow-md sticky-top-0 z-10">
    <section class="max-w-4xl mx-auto flex justify-between items-center">
        <div class="flex items-center ">
          <img src="./assets/img/bes-logo1.png" alt="Burol Elementary School Logo" class="h-20 ">
          <p class="text-4xl font-medium text-emerald-800 ml-5">
            Burol Elementary School
          </p>
        </div>
      <nav>
        <ul class="flex space-x-4 mr-3">
          <li><a href="#signin" class="text-emerald-800 text-md hover:text-emerald-600 pr-10">Sign in</a></li>
          <li><a href="/pages/feedback-form.php" class="text-emerald-800 text-md hover:text-emerald-600">Feedback</a></li>
          <li><a href="/pages/faqs.php" class="text-emerald-800 text-md hover:text-emerald-600">FAQs</a></li>
          </ul>
      </nav>
    </section>
  </header>

  <!-- Main Content Section -->
  <main class="max-w-4xl mx-auto px-4 pt-10 ">
    <section id="signin"class="flex flex-col h-auto py-10 ">
      <form action="">
        <p class="text-emerald-800 text-2xl text-center font-bold">
          SIGN IN
        </p>
        <div class="flex justify-center items-center my-5  w-90 m-auto  rounded-lg border-2">
          <img src="./assets/img/username.png" class="h-5 mr-1">
          <input type="text" id="username" name="username" class="h-12 w-80 p-2 border-l-2  focus:outline-none" placeholder="Username" required>
        </div>
        <div class="flex justify-center items-center my-5  w-90 m-auto border-2 rounded-lg">
          <img src="./assets/img/password.png" class="h-5 mr-1">
          <input type="password" id="password" name="password" class="h-12 w-80 p-2  border-l-2 focus:outline-none" placeholder="Password" required>
        </div>
        <div class="flex justify-center items-center my-5 w-90 m-auto border border-black rounded-lg ">
          <p>Login-attempt:<span class="text-red-700 pl-1">0</span></p>
        </div>
        <div class="text-center">
          <button type="submit" class="w-55 bg-emerald-800 text-white p-2 rounded hover:bg-emerald-600">
            Login
          </button>
        </div>
        <div class="text-center mt-5">
          <a href="#" class="text-emerald-800 hover:underline font-bold">
            Reset/Forgot Password?
          </a>
        </div>
      </form>
    </section>
  </main>

  <!--Footer Section-->
  <footer class="bg-emerald-950 absolute bottom-0 w-full">
    <section class="text-center py-3">
      <p class="text-white text-sm">
        Copyrights &copy; 2025. Burol Elementary School. All rights reserved.
      </p>
    </section>
  </footer>
</body>
</html>