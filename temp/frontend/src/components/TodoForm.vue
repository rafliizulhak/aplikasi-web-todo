<template>
  <div class="hello" style="position:relative; bottom:60px">
    <center><br><br>
    <router-link to="/home">
    <button type="button" class="btn btn-md btn-success" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Tambah Hal Untuk Dilakukan</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Kegiatan </label></td>
        <td><input type="text" v-model="todolist.kegiatan"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Asal Daerah </label></td>
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
      todoForm: {
        id: null,
        kegiatan: '',
        deskripsi: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:8000/ToDo_App_Using_Lumen_&_Vue/public/'
      api.get(url + id).then(res => {
        this.todoForm = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.todoForm
      let url = 'http://localhost:8000/ToDo_App_Using_Lumen_&_Vue/public/'

      if (this.todoForm.id) {
        url += '/' + this.todoForm.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/todo')
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
