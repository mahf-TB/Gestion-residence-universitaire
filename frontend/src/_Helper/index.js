import router from "@/router/index";

// #####################################
// Admin Connecting...
let adminConnect = (to) => {
    let user = JSON.parse(localStorage.getItem('user-info'))
    console.log(user)
    if (user.type == 'admin') {
        return true
    }
    router.push('/login')
}

// #####################################
// User Connecting...
let userConnect = (to) => {
    let user = JSON.parse(localStorage.getItem('user-info'))
    console.log(user)
    if (user.type == 'user') {
        return true 
    }
    router.push('/login')
}
// #####################################
// User Connecting...
let userVisite = (to , from) => {
    let user = JSON.parse(localStorage.getItem('user-info'))
    let token = localStorage.getItem('user-info')

    console.log('route from ',from)
    console.log('route to ',to)

    if ( !token || from.name == 'HomeUser' || user.type == 'user') {
        return true
    }
    router.push('/admin/home')
}

// #####################################
// Deconnecting...
let Deconnect = (to) => {
    let token = localStorage.getItem('user-info')
    let user = JSON.parse(localStorage.getItem('user-info'))
    if (!token) {
        return true
    }

    if (user.type == 'admin') {
        router.push('/admin/home')
    } else if (user.type == 'user') {
        router.push('/accueil')
    }
}

export const auth = {
    Deconnect, adminConnect, userConnect, userVisite
}