import Vue from "vue";
import VueRouter from "vue-router";

import ProductView from "../views/ProductsView";
import EditProductView from "../views/EditProductView";
import axios from 'axios';
import CreateProductView from "../views/CreateProductView";
Vue.use(VueRouter);

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const routes = [
  {
    path: "/products",
    name: "products",
    component: ProductView,
  },
    { path: '/products/create', component: CreateProductView },
    { path: '/products/:id', component: EditProductView },

  // {
  //   path: "/about",
  //   name: "about",
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () =>
  //     import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  // },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
