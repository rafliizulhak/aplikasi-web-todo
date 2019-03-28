import Vue from 'vue'
import Router from 'vue-router'
import TodoList from '@/components/TodoList'
import TodoForm from '@/components/TodoForm'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'TodoList',
      component: TodoList
    },
    {
      path: '/todo/create',
      name: 'todoCreate',
      component: TodoForm
    },
    {
      path: '/todo/:id',
      name: 'todoEdit',
      component: TodoForm
    }
  ]
})
