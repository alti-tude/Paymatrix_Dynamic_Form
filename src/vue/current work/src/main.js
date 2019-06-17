import Vue from 'vue'
import App from './App.vue'
import router from './router'
import tinymce from 'vue-tinymce-editor'
import vSelect from 'vue-select'
import Vuex from 'vuex'
import store from './components/mainform/store.js'
import VueLodash from 'vue-lodash'
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);
Vue.use(VueLodash)
Vue.component('tinymce', tinymce)
Vue.component('v-select', vSelect)
Vue.use(Vuex)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')

