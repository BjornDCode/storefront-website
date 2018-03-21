<header-component inline-template class="{{ request()->is('/') ? 'is-index' : '' }}">
    <header :class="fixed ? 'fixed' : ''">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="/images/logo.svg" alt="Storefront Logo">
                </a>
            </div>
            <div class="nav">
                <button 
                    class="hamburger hamburger--squeeze nav--toggle hide-desktop" 
                    :class="open ? 'is-active' : ''" 
                    type="button" 
                    @click="toggleNav"
                >
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <nav :class="open ? 'open' : ''">
                    <div class="nav-inner" :class="documentationNavOpen ? 'documentationOpen' : ''">
                        <a href="/" class="hide-desktop {{ request()->is('/') ? 'active' : '' }}">
                            Home
                        </a>  
                        @if (request()->is('docs/*'))
                            <a href="#" class="{{ request()->is('docs/*') ? 'active' : '' }}" @click.prevent="documentationNavOpen = !documentationNavOpen;" >
                                Documentation <span class="documentation-toggle-arrow">&#9662;</span>
                            </a>
                            <div class="documentation-nav" :class="documentationNavOpen ? 'open' : ''">
                                @yield('index')
                            </div>
                        @else
                            <a href="/docs" class="{{ request()->is('docs/*') ? 'active' : '' }}">
                                Documentation
                            </a>
                        @endif
                        <a href="/roadmap" class="{{ request()->is('roadmap') ? 'active' : '' }}">Roadmap</a>
                        <a href="/support" class="{{ request()->is('support') ? 'active' : '' }}">Support</a>

                        @if (request()->is('/'))
                            <a href="#" v-scroll-to="'#license'" class="button small">Buy</a>  
                        @else
                            <a href="/#license" class="button small">Buy</a>  
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </header>
</header-component>
