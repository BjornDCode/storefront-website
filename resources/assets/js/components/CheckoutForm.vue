<script>
import Form from '../helpers/Form';
import { Card, createToken } from 'vue-stripe-elements-plus'

export default {
    data() {
        return {
            form: new Form({
                email: '',
                company: '',
                domain: '',
                token: ''
            }),
            complete: false
        }
    },

    components: { Card },

    methods: {
        onSubmit(e) {
            createToken().then(result => {
                if (result.error) {
                    console.log(result.error)
                    return;
                } 
                
                this.form.token = result.token.id
                this.form.post('/license')
            })
        }
    }    
}
</script>
