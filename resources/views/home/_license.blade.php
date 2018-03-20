<section class="license" id="license">
    <div class="container">    
        <h2>License</h2>
        <div class="flex-container">
            <div class="copy">
                <div>
                    <h3>Commercial License</h3>
                    <p>
                        In order to use Storefront JS on a commercial site you need to buy a license. It costs <span>49$</span>. A license is valid for one website. Once you've purchased a license you'll receive a PDF.
                    </p>
                </div>
                <div>
                    <h3>Open Source</h3>
                    <p>
                        If you are working on an open source project or just want to play around with the library it’s free to do so. 
                    </p>
                </div>
            </div>
            <div class="buy">
                <h3>Buy a license</h3>
                <checkout-form inline-template>
                    <div class="completed" v-if="completed">
                        <p>
                            Thanks for purchasing a Storefront license. You will receive your license in an email shortly. Check out how to use Storefront in the <a href="/docs">docs</a>.
                        </p>
                    </div> 
                    <form 
                        class="checkout-form" 
                        @submit.prevent="onSubmit" 
                        @keydown="form.errors.clear($event.target.name)"
                        v-else
                    >
                        {{ csrf_field() }}
                        <div class="group" :class="form.errors.has('email') ? 'has-error' : ''">
                            <input 
                                type="email" 
                                name="email" 
                                placeholder="EMAIL"
                                v-model="form.email"
                            >
                            @component('components.tooltip')
                                The email which the license will be sent to
                            @endcomponent
                            <span class="error" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                        </div>
                        <div class="group" :class="form.errors.has('company') ? 'has-error' : ''">
                            <input 
                                type="text" 
                                name="company" 
                                placeholder="COMPANY"
                                v-model="form.company"
                            >
                            @component('components.tooltip')
                                The name of the company who owns the webshop
                            @endcomponent
                            <span class="error" v-if="form.errors.has('company')" v-text="form.errors.get('company')"></span>
                        </div>
                        <div class="group" :class="form.errors.has('domain') ? 'has-error' : ''">
                            <input 
                                type="text" 
                                name="domain" 
                                placeholder="DOMAIN"
                                v-model="form.domain"
                            >
                            @component('components.tooltip')
                                The domain the webshop will be hosted on
                            @endcomponent
                            <span class="error" v-if="form.errors.has('domain')" v-text="form.errors.get('domain')"></span>
                        </div>
                        <div class="group">
                                <div ref="card" class="stripe-card"></div>
                                <span class="error" v-if="form.errors.has('card')" v-text="form.errors.get('card')"></span>
                        </div>
                        <submit-button
                            :loading="form.loading"
                            :has-errors="form.errors.any()"
                            :completed="form.completed"
                        >
                            <span slot="completed">Thanks!</span>
                            Purchase
                        </submit-button>
                        <span class="error server-error" v-if="form.errors.has('server')" v-html="form.errors.get('server')"></span>
                    </form> 
                </checkout-form>
            </div>
        </div>
    </div>
</section>
