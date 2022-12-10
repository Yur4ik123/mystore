import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vuetify from './plugins/vuetify' // path to vuetify export
import { TiptapVuetifyPlugin } from 'tiptap-vuetify'
// don't forget to import CSS styles
import 'tiptap-vuetify/dist/main.css'
// Vuetify's CSS styles
Vue.config.productionTip = false;
Vue.use(TiptapVuetifyPlugin, {
    // the next line is important! You need to provide the Vuetify Object to this place.
    vuetify, // same as "vuetify: vuetify"
    // optional, default to 'md' (default vuetify icons before v2.0.0)
    iconsGroup: 'md'
})
console.log('kurwa')
const app = new Vue({
  router,
  store, vuetify,
  render: (h) => h(App),
}).$mount("#app");
