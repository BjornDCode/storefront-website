<newsletter-form inline-template>
    <section class="newsletter">
        <div class="container">
            <h2>Stay up to date</h2>
            <p>Get updates about the development of the library.</p>
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="group" :class="form.errors.has('name') ? 'has-error' : ''">
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="NAME" 
                        v-model="form.name" 
                    >
                    <span class="error" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>
                <div class="group" :class="form.errors.has('email') ? 'has-error' : ''">
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="EMAIL" 
                        v-model="form.email"
                    >
                    <span class="error" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </div>
                <submit-button
                    :loading="form.loading"
                    :has-errors="form.errors.any()"
                    :completed="form.completed"
                >
                    <span slot="completed">Subscribed!</span>
                    Get Updates
                </submit-button>

            </form>
        </div>
    </section>
</newsletter-form>
