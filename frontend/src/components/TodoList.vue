<template>
  <div class="hello" style="position:relative; bottom:60px">
<center><br><br>
    <h1>To Do List</h1>
    <router-link to="/create">
    <button type="button" class="btn btn-sm btn-success " style="position:relative; bottom:10px; right:350px;">tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>Kegiatan</th>
        <th>Deskripsi</th>
      </tr>
      <tr v-for="(todolist, i) in data_todolist" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ todolist.kegiatan }}</td>
          <td>{{ todolist.deskripsi }}</td>
          <td>
            <router-link :to="'/todo/' + todolist.id"><button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(todolist.id)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
    </table>
    </center><br><br><br><br><br>
    <p class="top-right"><b><i>@copyright Muhammad Rafli Izulhak</i></b></p>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Home',
  data () {
    return {
      data_todolist: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:8000/'
      let url2 = 'todo'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_todolist = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:8000/todo/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
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
