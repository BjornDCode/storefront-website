<script>
    export default {

        data() {
            return {
                switcherOpen: false
            }
        },

        mounted() {
            this.setActiveElement();
            document.querySelectorAll('aside h2').forEach(elem => {
                elem.addEventListener('click', e => this.toggleNavItem(e.currentTarget.parentElement));
            });
        },

        methods: {

            setActiveElement() {
                const activeElement = document.querySelector('aside a[href="' + window.location.pathname + '"]');

                if (!activeElement) return;

                activeElement.classList.add('active');

                this.toggleNavItem(activeElement.parentElement.parentElement.parentElement);
            },

            toggleNavItem(elem) {
                elem.classList.toggle('active');
            },

            toggleSwitcher(e) {
                this.switcherOpen = !this.switcherOpen;
            }

        }
    }
</script>
