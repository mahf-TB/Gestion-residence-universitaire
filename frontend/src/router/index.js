import { createRouter, createWebHistory } from 'vue-router'
import { auth  } from "../_Helper";

import Login from '../views/Login.vue'
import Signup from '../views/Signup.vue'
import Page404 from '../views/Page404.vue'

import * as Admin from '@/views/Admin/_NavAdmin'
import * as Etudiant from '@/views/Residents/_NavUser'
import * as User from '@/views/Visiteur/_NavVisite'

const routes = [
  {
    path: '/admin',
    name: 'Admin',
    component: Admin.LayoutAdmin,
    beforeEnter: auth.adminConnect,
    children:[
      { path: 'dashboard',  name: 'Dashboard', component: Admin.Home },
      { path: 'etudiant',  name: 'Etudiant', component: Admin.Etudiant },
      { path: 'logement',  name: 'Logement', component: Admin.Logement },
      { path: 'listeReservation',  name: 'Liste Reservation', component: Admin.Reservation },
      { path: 'listeMaintenace',  name: 'Liste Maintenace', component: Admin.Maintenace },
    ]
  },
  {
    path: '/user',
    name: 'HomeUser',
    beforeEnter: auth.userConnect,
    component: Etudiant.LayoutUser,
    children:[
      { path: 'home',  name: 'HomePage', component: Etudiant.HomePage },
      { path: 'evenement',  name: 'Evenement', component: Etudiant.Evenement },
      { path: 'service',  name: 'Service', component: Etudiant.Service },
    ]
  },
  {
    path: '/',
    name: 'Home',
    redirect: 'accueil',
    beforeEnter: auth.userVisite,
    component: User.LayoutPage,
    children:[
      { path: 'accueil',  name: 'Accueil', component: User.Accueil },
      { path: 'fondation',  name: 'Fondation', component: User.Fondation },
      { path: 'residences',  name: 'Residence', component: User.Residence },
      { path: 'activites',  name: 'Activites', component: User.Activites },
      { path: 'contact',  name: 'Contact', component: User.Contact },
      { path: 'reservation/:id',  name: 'Reservation', component: User.Reservation },
    ]
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    beforeEnter: auth.Deconnect,
  },
  {
    path: '/signup',
    name: 'SignUp',
    component: Signup,
    beforeEnter: auth.Deconnect,
  },
  {
    path:'/:pathMatch(.*)*',
    name: 'Page404',
    component: Page404
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
