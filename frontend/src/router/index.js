import { createRouter, createWebHistory } from 'vue-router'
import { auth } from "../_Helper";


import * as Admin from '@/views/Admin/_NavAdmin'
import * as Etudiant from '@/views/Residents/_NavUser'
import * as User from '@/views/Visiteur/_NavVisite'
import * as Page from '@/views/Pages/_pageNav'

const routes = [
  {
    path: '/admin',
    name: 'Admin',
    component: Admin.LayoutAdmin,
    children: [
      { path: 'dashboard', name: 'Dashboard', component: Admin.Home, beforeEnter: auth.adminConnect },

      { path: 'dashboard-accueil', name: 'Dashboard Accueil', component: Admin.DashboardAccueil, beforeEnter: auth.accueilConnect },
      { path: 'etudiant', name: 'Etudiant', component: Admin.Etudiant, beforeEnter: auth.accueilConnect },
      { path: 'logement', name: 'Logement', component: Admin.Logement, beforeEnter: auth.accueilConnect },
      { path: 'listeReservation', name: 'Liste Reservation', component: Admin.Reservation, beforeEnter: auth.accueilConnect },


      { path: 'dashboard-maintenance', name: 'Dashboard Maintenance', component: Admin.DashboardMaintenance, beforeEnter: auth.maintenanceConnect },
      { path: 'listeMaintenace', name: 'Liste Maintenace', component: Admin.Maintenace, beforeEnter: auth.maintenanceConnect },

      { path: 'messenger', name: 'Admin Messenger', component: Page.Messenger },
      {  path: 'profile', name: 'Profile Admin', component: Page.ProfileAdmin},

      { path: 'dashboard-service', name: 'Dashboard Service', component: Admin.DashboardService, beforeEnter: auth.serviceConnect },
      { path: 'restaurent', name: 'Restaurent', component: Admin.Restaurant, beforeEnter: auth.serviceConnect },
      { path: 'liste-commande', name: 'Liste Commande', component: Admin.ListeCommande, beforeEnter: auth.serviceConnect },
      { path: 'service', name: 'Service ', component: Admin.Service, beforeEnter: auth.serviceConnect },

      { path: 'liste-utilisateur', name: 'Liste Utilisateur', component: Admin.Utilisateur, beforeEnter: auth.adminConnect },
      
    ]
  },
  {
    path: '/user',
    name: 'HomeUser',
    beforeEnter: auth.userConnect,
    component: Etudiant.LayoutUser,
    children: [
      { path: 'home', name: 'HomePage', component: Etudiant.HomePage },
      { path: 'evenement', name: 'Evenement', component: Etudiant.Evenement },
      { path: 'service', name: 'Service', component: Etudiant.Service },
      { path: 'maintenance', name: 'Maintenance', component: Etudiant.Maintenance },
      { path: 'chambre', name: 'Chambre Etudiant', component: Etudiant.Chambre },
      { path: 'show-pub/:id', name: 'ShowPub', component: Etudiant.ShowPub },

      { path: 'messenger', name: 'Messenger User', component: Page.Messenger },
      {  path: 'profile', name: 'Profile', component: Page.Profile
      },
    ]
  },
  {
    path: '/',
    name: 'Home',
    redirect: 'accueil',
    beforeEnter: auth.userVisite,
    component: User.LayoutPage,
    children: [
      { path: 'accueil', name: 'Accueil', component: User.Accueil },
      { path: 'fondation', name: 'Fondation', component: User.Fondation },
      { path: 'residences', name: 'Residence', component: User.Residence },
      { path: 'activites', name: 'Activites', component: User.Activites },
      { path: 'contact', name: 'Contact', component: User.Contact },
      { path: 'reservation/:id', name: 'Reservation', component: User.Reservation },
    ]
  },

  {
    path: '/login',
    name: 'Login',
    component: Page.Login,
    beforeEnter: auth.Deconnect,
  },
  {
    path: '/signup/:id',
    name: 'SignUp',
    component: Page.Signup,
    beforeEnter: auth.Deconnect,
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'Page404',
    component: Page.Page404
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  document.title = `${to.name} | ${process.env.VUE_APP_TITLE}`
  next();
})

export default router
