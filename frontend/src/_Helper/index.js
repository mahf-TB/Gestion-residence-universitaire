import router from "@/router/index";

let adminConnect = (to) => {
    let user = JSON.parse(localStorage.getItem('user-info'))
    console.log(user)
    if (user && user.nom == 'admin') {
        return true
    }
    router.push('/login')
}

let userConnect = (to) => {
    let user = JSON.parse(localStorage.getItem('user-info'))
    console.log(user)
    if (user && user.nom == 'user') {
        return true
    }
    router.push('/login')
}

let userVisite = (to , from) => {
    let user = JSON.parse(localStorage.getItem('user-info'))

    console.log('route from ',from)
    console.log('route to ',to)

    if ( from.name == 'HomeUser' || user.nom == 'user') {
        return true
    }
    router.push({name:'Admin'})
}

let Deconnect = (to) => {
    let token = localStorage.getItem('user-info')
    let user = JSON.parse(localStorage.getItem('user-info'))
    if (!token) {
        return true
    }
    if (user.nom == 'admin') {
        router.push('/admin/home')
    } else if (user.nom == 'user') {
        router.push('/')
    }
}

export const auth = {
    Deconnect, adminConnect, userConnect, userVisite
}