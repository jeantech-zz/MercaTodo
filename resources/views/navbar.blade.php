<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <img src="/storage/MercatodoLogo.png" class="attachment-0x0 size-1000x100" alt="" loading="lazy">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="main-navbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="main-navbar" class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        @guest
                            <a class="button is-light">
                                @lang('auth.login')
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
