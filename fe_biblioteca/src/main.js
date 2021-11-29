import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router';

import BookDetail from "./components/BookDetail";
import BookList from "./components/BookList";
import InsertBook from "./components/InsertBook";
import './style.css';

Vue.use(VueRouter);
Vue.config.productionTip = false

const routes = [
  {
    path: '/list',
    name: "books_list",
    component: BookList,
  },
  {
    path: '/insert',
    name: "insert_book",
    component: InsertBook,
  },
  {
    path: '/detail/:id',
    name: "detail_book",
    component: BookDetail,
  },
  {
    path: '',
    redirect: '/list',
  }
];

const router = new VueRouter({
  routes,
  mode: "history",
});

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
