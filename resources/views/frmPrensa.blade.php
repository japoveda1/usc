<html>
    <head>
        <title>Titulares prensa @yield('titulo')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            <form action="">
                Email: <input type="email" name="" id="">
                Fecha del día que se analiza: <input type="date" name="" id="">

                @yield('checkbox')
            </form>
        </div>
    </body>
</html>