import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js'
import { createPinia } from 'pinia'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

import PenugasanPage from './vue/Pages/Penugasan.vue'

const app = createApp({
    components: {
        PenugasanPage
    }
})

const pinia = createPinia()
app.use(pinia)

app.mount('#app');
