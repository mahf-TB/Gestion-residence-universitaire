import Home from './Dashboard.vue'
import DashboardAccueil from './Personnel/DashboardAccueil.vue'
import DashboardService from './Personnel/DashboardService.vue'
import DashboardMaintenance from './Personnel/DashboardMaintenance.vue'


import LayoutAdmin from './LayoutAdmin.vue'
import Etudiant from './Reservation/Etudiant.vue'
import Logement from './Reservation/Logement.vue'
import Reservation from './Reservation/Reservation.vue'
import Maintenace from './Maintenance/ListeDemande.vue'
import Restaurant from './ServiceDemander/Restaurent.vue'
import ListeCommande from './ServiceDemander/ListeCommande.vue'
import Service from './ServiceDemander/Service.vue'
import Utilisateur from './Utilisateur/Utilisateur.vue'

//exporter ato no alefa any route/index.js

export {
    LayoutAdmin, 
    Home, 
    Etudiant, 
    Logement, 
    Reservation,
    Maintenace,
    Restaurant, 
    ListeCommande,
    Utilisateur,
    Service,
    DashboardMaintenance,
    DashboardService,
    DashboardAccueil
}