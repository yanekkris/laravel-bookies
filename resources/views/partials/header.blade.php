<header class="header">
    <div class="header__logo"><h1>Booookies</h1></div>
    <nav>
        <a href="{{ route('bookz')}}">Books</a>
    
        <a href="{{ route('publishers.index')}}">Publishers</a>

        <a href="{{ route('bookshops.index')}}">Bookshops</a>

        <a href="{{ route('reservations.create')}}">New Reservation</a>

        @auth
            <a href="{{ route('reservations.index')}}">My reservations</a>
        @endauth
    </nav>
</header>
