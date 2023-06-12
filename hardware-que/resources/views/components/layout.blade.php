<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css" />
</head>

<body>
    <header class="head">
        <div>
            <ul class="menu">
                <li class="admin">
                    <ion-icon name="menu-outline" size="dlarge"></ion-icon>
                </li>
                @auth
                @admin
                <li class="menu-button">
                  <a href="/admin/posts"><ion-icon name="person-outline"></ion-icon></a>
                </li>
                @endadmin
                <li class="user-name">Welcom, 
                  {{ auth()->user()->username }}
              </li>
                @endauth
                @guest
                    <a href="/login">
                        <li class="login">
                            <ion-icon name="log-in-outline"></ion-icon>
                        </li>
                    </a>
                @endguest
                @auth
                    
                    <li class="logout">
                        <form action="/logout" method="POST" id="logout-form">
                          @csrf
                            <button type="submit">
                                <ion-icon name="log-out-outline" size="dlarge"></ion-icon>
                            </button>
                        </form>
                    </li>
                @endauth
                <li>
                    <input class="search" type="text" name="search" placeholder="Search..." />
                </li>
                <li class="logo">
                    <a href="/"><img src="/images/logo1.png" alt="hardware que" /></a>
                </li>
            </ul>
            <br />
            <br />
        </div>
    </header>

    {{ $slot }}

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
