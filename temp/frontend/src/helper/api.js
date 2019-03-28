import axios from 'axios'

export const api = axios.create({
  baseURl: 'http://localhost:8000/ToDo_App_Using_Lumen_&_Vue/public/'
})
