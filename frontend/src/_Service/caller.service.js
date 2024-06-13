import axios from "axios";

// const Axios = axios.create({ baseURL: 'http://192.168.1.137:8000/api/'})
// const Axios = axios.create({ baseURL: 'http://172.20.10.3:8000/api/'})
const Axios = axios.create({ baseURL: process.env.VUE_APP_URL_BACK})

// console.log( process.env.VUE_APP_URL_BACK )

Axios.interceptors.request.use(request => {
    const token = JSON.parse(localStorage.getItem("token"));
    if(token){
        request.headers.Authorization = 'Bearer '+ token
    }
    return request
})

export default Axios;