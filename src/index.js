import Vue from 'vue';
import App from './App.vue';
import ElementUI  from './element';
import VueResource from 'vue-resource';
Vue.use(VueResource);
Vue.http.options.emulateHTTP = true;
Vue.http.options.emulateJSON = true;

new Vue({
	render: h=>h(App)
}).$mount("#app");