<script>
    export default {
        mounted() {
            this.setActiveElement();
            document.querySelectorAll('aside h2').forEach(elem => {
                elem.addEventListener('click', e => this.toggleNavItem(e.currentTarget.nextSibling.nextSibling));
            });
        },

        methods: {

            setActiveElement() {
                const activeElement = document.querySelector('aside a[href="' + window.location.pathname + '"]');
                activeElement.classList.add('active');

                this.toggleNavItem(activeElement.parentElement.parentElement);
            },

            toggleNavItem(elem) {
                elem.classList.toggle('active');
            }

        }
    }
</script>
