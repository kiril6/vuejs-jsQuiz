import Vue from 'vue'
import VueRouter from 'vue-router'
import QuestionsSegment1 from '../views/QuestionsSegment1.vue'
import QuestionsSegment2 from '../views/QuestionsSegment2.vue'
// import Booklet from '../views/Booklet.vue'
import Success from '../views/Success.vue'
import Failed from '../views/Failed.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/page/:id',
    name: 'QuestionsSegment1',
    component: QuestionsSegment1
  },
  {
    path: '/page/:id',
    name: 'QuestionsSegment2',
    component: QuestionsSegment2,
  },
  // {
  //   path: '/booklet',
  //   name: 'Booklet',
  //   component: Booklet,
  // },
  {
    path: '/success',
    name: 'Success',
    component: Success,
  },
  {
    path: '/failed',
    name: 'Failed',
    component: Failed,
  },

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.replace({ path: 'start', redirect: '/' });

// router.beforeRouteUpdate((to, from, next) => {
//   if (to.params.id) {
//     alert('dsds');
//     next();
//   }
// })

export default router