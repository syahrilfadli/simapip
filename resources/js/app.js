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

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
})

app.use(vuetify)

app.mount('#app');
