<script>
import Form from '../helpers/Form';

let stripe = Stripe('pk_test_mw71bU6Bqr8NLx1hHadiYxqb'),
    elements = stripe.elements({
        fonts: [
            {
                cssSrc: 'https://use.typekit.net/ime7qlg.css'
            }
        ]
    }),
    card = undefined;

export default {

    data() {
        return {
            form: new Form({
                email: '',
                company: '',
                domain: '',
                token: ''
            }),
            completed: false
        }
    },

    mounted() {
        const options = {
            style: {
                base: {
                    color: '#545E6B',
                    lineHeight: '50px',
                    fontSize: '14px',
                    fontFamily: 'brandon-grotesque',
                    fontWeight: 'bold',
                    '::placeholder': {
                        color: '#545E6B',
                        textTransform: 'uppercase',
                        letterSpacing: '1px'
                    }
                }
            }
        };

        card = elements.create('card', options);
        card.mount(this.$refs.card);
    },

    methods: {
        onSubmit(e) {
            if (!this.$refs.card.classList.contains('StripeElement--complete')) {
                this.form.errors.record({ 'card': ['Please provide valid card details.'] });
                return;
            }

            this.form.loading = true;

            stripe.createToken(card).then(result => {
                if (result.error) {
                    return;
                } 
                
                this.form.token = result.token.id
                this.form.post('/license')
                    .then(data => {
                        this.completed = true;
                    })
            })
        }
    }    
}
</script>
