import { createApp } from 'vue'
import BootstrapVue3 from 'bootstrap-vue-3'
import router from './routes'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'
import 'vue-loading-overlay/dist/vue-loading.css';
import App from './App.vue'

createApp(App)
	.use(BootstrapVue3)
	.use(router)
	.mount('#app')
