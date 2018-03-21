<header-component inline-template class="{{ request()->is('/') ? 'is-index' : '' }}">
    <header :class="fixed ? 'fixed' : ''">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="images/logo.svg" alt="Storefront Logo">
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
                    <a href="/" class="hide-desktop {{ request()->is('/') ? 'active' : '' }}" >Home</a>  
                    <a href="/docs" class="{{ request()->is('docs') ? 'active' : '' }}">Documentation</a>
                    <a href="/roadmap" class="{{ request()->is('roadmap') ? 'active' : '' }}">Roadmap</a>
                    <a href="/support" class="{{ request()->is('support') ? 'active' : '' }}">Support</a>

                    @if (request()->is('/'))
                        <a href="#" v-scroll-to="'#license'" class="button small">Buy</a>  
                    @else
                        <a href="/#license" class="button small">Buy</a>  
                    @endif

                </nav>
            </div>
        </div>
    </header>
</header-component>
