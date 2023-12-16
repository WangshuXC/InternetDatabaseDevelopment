import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
      meta: {
        showNavBar: true
      },
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
      meta: {
        showNavBar: false
      },
    },
    {
      path: '/movie',
      name: 'movie',
      component: () => import('../views/MovieView.vue'),
      meta: {
        showNavBar: true
      },
    },
    {
      path: '/movieplay',
      name: 'movieplay',
      component: () => import('../views/MoviePlay.vue'),
      meta: {
        showNavBar: true
      },
    },
    {
      path: '/comic',
      name: 'comic',
      component: () => import('../views/ArticalView.vue'),
      meta: {
        showNavBar: true
      },
    },
    {
      path: '/user',
      name: 'user',
      component: () => import('../views/UserView.vue'),
      meta: {
        showNavBar: true
      },
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
      meta: {
        showNavBar: true
      },
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/AdminView.vue'),
      meta: {
        showNavBar: false
      },
    },
  ]
})

export default router
