<x-layout>
   <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

   <main class="mid main">
       <form method="POST" action="/register" class="mid form">
           @csrf
           <h1 class="login-h1">Register</h1>
           <x-form.input name="name" type="text" autocomplete="username" /><br>
           <x-form.input name="username" type="text" autocomplete="username" /><br>
           <x-form.input name="email" type="email" autocomplete="username" /><br>
           <x-form.input name="password" type="password" autocomplete="new-password" /><br>

           <button type="submit" class="bg-gray-300 p-1 pl-2 pr-2 rounded-xl mt-2">
               Register
           </button>
           <h4 class="register ">
               Already have an acount? 
               <a href="/login" class="text-blue-700"> Login</a>
           </h4>

       </form>
   </main>
</x-layout>
