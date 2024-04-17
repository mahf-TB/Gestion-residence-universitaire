import router from "@/router/index";
import Axios from '@/_Service/caller.service'


// #####################################
// Admin Connecting...
let adminConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))

    try {
        const res = await Axios.get('userConnect')
        const type_user = res.data.user.type
        
        if (token && type_user == 'admin') {
            return true
        }
    } catch (error) {
        console.log('error connecting go to login page')
    }
    router.push('/login')
}

// #####################################
// User Connecting...
let userConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))

    try {
        const res = await Axios.get('userConnect')
        const type_user = res.data.user.type
        
        if (token && type_user == 'user') {
            return true
        }
    } catch (error) {
        console.log('error connecting go to login page')
    }

    router.push('/login')
}

// #####################################
// User Connecting...
let userVisite = async (to, from) => {
    const token = JSON.parse(localStorage.getItem('token'))

    if (!token) {
        return true
    }
    try {
        const res = await Axios.get('userConnect')
        const type_user = res.data.user.type
        
        if (type_user == 'admin') {
            router.push('/admin/dashboard')
        } else if (type_user == 'user') {
            router.push('/user/home')
        }
    } catch (error) {
        console.log('error connecting go to login page')

    }
}

// #####################################
// Deconnecting...
let Deconnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))

    if (!token) {
        return true
    }
    try {
        const res = await Axios.get('userConnect')
        const type_user = res.data.user.type

        if (type_user == 'admin') {
            router.push('/admin/dashboard')
        } else if (type_user == 'user') {
            router.push('/accueil')
        }
    } catch (error) {
        console.log('error connecting go to login page')

    }
}

export const auth = {
    Deconnect, adminConnect, userConnect, userVisite
}