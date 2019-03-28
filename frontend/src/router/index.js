import Vue from 'vue'
import Router from 'vue-router'
import TodoList from '@/components/TodoList'
import TodoForm from '@/components/TodoForm'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'TodoList',
      component: TodoList
    },
    {
      path: '/create',
      name: 'TodoCreate',
      component: TodoForm
    },
    {
      path: '/:id',
      name: 'TodoEdit',
      component: TodoForm
    }
  ]
})
