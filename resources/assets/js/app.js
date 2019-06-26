require('./bootstrap');

//Vue Js
window.Vue = require('vue');
//Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Vue Form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Vue Components
Vue.component('example', require('./components/Example.vue'));
const test = Vue.component('test', require('./components/Test.vue'));

const thread = Vue.component('thread', require('./components/chat/thread.vue'));
const chat = Vue.component('chat', require('./components/chat/chat.vue'));
const properties = Vue.component('properties', require('./components/owner/Properties.vue'));
const addProperty = Vue.component('addProperty', require('./components/owner/addProperty.vue'));

//temp
const messaging = Vue.component('messaging', require('./components/general_chat/Messaging.vue'));

//Properties components
const updateProperty = Vue.component('updateProperty', require('./components/owner/updateProperty.vue'));

//Renter Properties components
const renterProperties = Vue.component('renterProperties', require('./components/renter/renterProperties.vue'));
const propertyView = Vue.component('propertyView', require('./components/renter/propertyView.vue'));

// Public Properties
const showproperties = Vue.component('showproperties', require('./components/properties/PropertiesIndex.vue'));
const allproperties = Vue.component('allproperties', require('./components/properties/AllProperties.vue'));
const propertyview = Vue.component('propertyview', require('./components/properties/PropertyView.vue'));

//Renter
const renterprofile = Vue.component('renterprofile', require('./components/renter/Profile.vue'));

//Owner
const ownerprofile = Vue.component('ownerprofile', require('./components/owner/Profile.vue'));

//Vue js pagination package
const pagination = Vue.component('pagination', require('laravel-vue-pagination'));

//Register components routes

// Vue Bootstrap: https://bootstrap-vue.js.org/docs
import BootstrapVue from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

const routes = [ 
    //Admin paths
    { path: '/test', component: test },

    //Owner Property Paths
    { path: '/properties', component: properties },
    { path: '/addProperty', component: addProperty },
    { path: '/updateProperty/:id', component: updateProperty},

    //Chat paths
    //One and only one
    { path: '/chat', component: chat, name: 'chat', props: true},

    //Properties Paths
    { path: '/renterProperties', component: renterProperties },
    { path: '/propertyView/:id', component: propertyView },

    //Public Properties
    { path: '/showproperties', component: showproperties, name: 'showproperties', props: true },
    { path: '/allproperties', component: allproperties, name: 'allproperties', props: true },
    { path: '/propertypublicview/:id', component: propertyview, props: true },

    //Owner
    { path: '/owner_profile', component: ownerprofile, name: 'ownerprofile' },

    //Renter
    { path: '/renter_profile', component: renterprofile, name: 'renterprofile' },

    //Other routes
    { path: '/', component: pagination, name: 'pagination' },
    { path: '/', component: BootstrapVue, name: 'BootstrapVue' },
    { path: '/messaging', component: messaging, name: 'messaging' },
]

// Sharing data across all components
Vue.prototype.$appName = 'My App';
Vue.prototype.$myId = 'null';
Vue.prototype.$friendId = 'null';

//Uncomment it for live server
Vue.prototype.$baseURL = '';
// Vue.prototype.$baseURL = '/2019/ovrvue';


// Vue.prototype.$getCountries = {
//     'AF': 'Afghanistan',
//     'AX': 'Åland Islands',
//     'AL': 'Albania',
//     'DZ': 'Algeria',
//     'AS': 'American Samoa'
//   };

const router = new VueRouter({
//Will register routes for all components
    mode: 'history', //Show simple url not complete path
    routes, // short for `routes: routes` 
    linkActiveClass: 'active'
})
const app = new Vue({
    el: '#app',
    router,
});

//Vue js global variables
const shared = new Vue({data:{
    myId: "",
    friendId: "",
 }})
 
shared.install = function(){
    Object.defineProperty(Vue.prototype, '$get', {
    get () { return shared }
})}
Vue.use(shared);



//Sweet Alert
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.Swal = Swal; //Globally available
//Event handling
window.Fire = new Vue();    //window.var make var globally available.
//Toast
const toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;


//Moment js integeration
import moment from 'moment';
Vue.filter('timeAgo', function(date){
    return moment(date).fromNow();
  });


  //Date range picker
import DateRangePicker from "@gravitano/vue-date-range-picker";
Vue.config.productionTip = false;
// use the plugin
Vue.use(DateRangePicker);
