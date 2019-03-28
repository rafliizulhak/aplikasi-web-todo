<template>
  <div class="hello" style="position:relative; bottom:60px">
    <center><br><br>
    <router-link to="/">
    <button type="button" class="btn btn-md btn-success" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Masukan hal yang harus dilakukan</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Kegiatan </label></td>
        <td><input type="text" v-model="todolist.kegiatan"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Deskripsi </label></td>
        <td><input type="text" v-model="todolist.deskripsi"  class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-info" style="position:relative; left:360px;">Save</button>
    </form>
    </center><br><br><br><br><br><br>
    <p class="top-right"><b><i>@copyright Muhammad Rafli Izulhak</i></b></p>
  </div>
</template>

<script>
import {api} from '@/helper/api'

export default {
  name: 'TodoForm',
  data () {
    return {
      todolist: {
        id: null,
        kegiatan: '',
        deskripsi: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:8000/todo/'
      api.get(url + id).then(res => {
        this.todolist = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.todolist
      let url = 'http://localhost:8000/todo/'

      if (this.todolist.id) {
        url += '/' + this.todolist.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/')
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
