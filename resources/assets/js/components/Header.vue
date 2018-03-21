
<script>
    export default {
        data() {
            return {
                header: document.querySelector('header'),
                fixed: false,
                open: false,
                documentationNavOpen: false
            }
        },

        mounted() {
            window.addEventListener('loaded', e => this.handleScroll(e));
            window.addEventListener('scroll', e => this.handleScroll(e))
        },

        methods: {
            handleScroll(e) {
                if (window.scrollY) {
                    this.fixed = true;
                    return;
                }
                
                this.fixed = false;
            },

            toggleNav() {
                this.open = !this.open;
            }
        }
    }
</script>
