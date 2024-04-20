import router from "@/router/index";
import Axios from '@/_Service/caller.service'


// #####################################
// Admin Connecting...
let adminConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))
    if (token) {
        try {
            const res = await Axios.get('userConnect')
            const type_user = res.data.user.type

            if (type_user == 'admin') {
                return true
            }
        } catch (error) {
            console.log('error connecting go to login page')
        }
    }
    router.push('/login')
}


// Maintenace Connecting...
let maintenanceConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))
    if (token) {
        try {
            const res = await Axios.get('userConnect')
            const type_user = res.data.user.type

            if (type_user == 'admin' || type_user == 'P-maintenance') {
                return true
            }
        } catch (error) {
            console.log('error connecting go to login page')
        }
    }
    router.push('/login')
}

// Accueil Connecting...
let accueilConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))
    if (token) {
        try {
            const res = await Axios.get('userConnect')
            const type_user = res.data.user.type

            if (type_user == 'admin' || type_user == 'P-accueil') {
                return true
            }
        } catch (error) {
            console.log('error connecting go to login page')
        }
    }
    router.push('/login')
}

// Service Connecting...
let serviceConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))
    if (token) {
        try {
            const res = await Axios.get('userConnect')
            const type_user = res.data.user.type

            if (type_user == 'admin' || type_user == 'P-service') {
                return true
            }
        } catch (error) {
            console.log('error connecting go to login page')
        }
    }
    router.push('/login')
}



// #####################################
// User Connecting...
let userConnect = async (to) => {
    const token = JSON.parse(localStorage.getItem('token'))
    if (token) {
        try {
            const res = await Axios.get('userConnect')
            const type_user = res.data.user.type

            if (token && type_user == 'user') {
                return true
            }
        } catch (error) {
            console.log('error connecting go to login page')
        }
    }

    router.push('/login')
}

// #####################################
// Visiteur Connecting...
let userVisite = async (to, from) => {
    const token = JSON.parse(localStorage.getItem('token'))

    if (!token) {
        return true
    }
    try {
        const res = await Axios.get('userConnect')
        const type_user = res.data.user.type

        switch (type_user) {
            case 'admin':
                router.push('/admin/dashboard')
                break;
            case 'user':
                router.push('/user/home')
                break;
            case 'P-maintenance':
                router.push('/admin/dashboard-maintenance')
                break;
            case 'P-accueil':
                router.push('/admin/dashboard-accueil')
                break;
            case 'P-service':
                router.push('/admin/dashboard-service')
                break;

            default:
                break;
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
    Deconnect, adminConnect, userConnect, userVisite, maintenanceConnect, serviceConnect, accueilConnect
}