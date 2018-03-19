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
                <checkout-form inline-template>
                    <form class="checkout-form" @submit.prevent="onSubmit">
                        {{ csrf_field() }}
                        <div class="group">
                            <input 
                                type="email" 
                                name="email" 
                                placeholder="EMAIL"
                                v-model="form.email"
                            >
                        </div>
                        <div class="group">
                            <input 
                                type="text" 
                                name="company" 
                                placeholder="COMPANY"
                                v-model="form.company"
                            >
                        </div>
                        <div class="group">
                            <input 
                                type="text" 
                                name="domain" 
                                placeholder="DOMAIN"
                                v-model="form.domain"
                            >
                        </div>
                        <div class="group">
                                <card class='stripe-card'
                                    :class='{ complete }'
                                    stripe='{{ config('services.stripe.key') }}'
                                    :options='{}'
                                    @change='complete = $event.complete'
                                />
                        </div>
                        <button type="submit" class="button">Purchase</button>
                    </form> 
                </checkout-form>
            </div>
        </div>
    </div>
</section>
