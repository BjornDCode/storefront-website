<script>
    import Form from '../helpers/Form';

    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    email: ''
                })
            }
        },

        methods: {
            onSubmit(e) {
                this.form.post('/newsletter/subscribe')
            }
        }
    }
</script>
