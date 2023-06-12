<x-layout>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <main class="mid main">
        <form method="POST" action="/login" class="mid form">
            @csrf
            <h1 class="login-h1">Login</h1>
            <x-form.input name="email" type="email" autocomplete="username" /><br>
            <x-form.input name="password" type="password" autocomplete="new-password" /><br>

            <button type="submit" class="bg-gray-300 p-1 pl-2 pr-2 rounded-xl mt-2">
                login
            </button>
            <h4 class="register">
                New User? 
                <a href="/register" class="text-blue-700"> Register</a>
            </h4><br>
            <a href="/auth/github/redirect" class=" border p-2 mr-2 bg-gray-400 rounded-l">sign in using Github</a>
            <a href="/auth/google/redirect" class=" border p-2  bg-gray-400 rounded-l">sign in using Google</a>
            <div class="mt-2">
                <x-flash />    
            </div>
            


        
        </form>
    </main>
</x-layout>
