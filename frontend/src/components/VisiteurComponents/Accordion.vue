<template>
    <div class="container w-full flex text-blue-0 py-5">
        <div class="w-[50%] p-3 px-4">
            <div class="mb-5">
                <h1 class=" font-light text-4xl text-white">
                    <span class="font-bold">Une résidence étudiante</span> sans renoncer au confort de la location
                    traditionnelle
                </h1>
            </div>
            <div class="my-2 ">
                <Panel :toggleable="true" :collapsed="false" class="my-2">
                    <template #header>
                        <h2 class="text-lg  font-light text-center my-2 text-blue-2 uppercase  ">
                            Des résidences 100% sécurisées
                        </h2>
                    </template>
                    <div>
                        <h2 class="text-sm my-2 text-blue-2 uppercase font-semibold">Votre tranquillité est notre
                            priorité.</h2>
                    </div>
                    <p class="line-height-3 m-0">
                        L’accès à nos bâtiments est sécurisé (digicode et/ou interphone) et l’équipe d’accueil veille à
                        votre
                        confort.
                        Vous avez oublié votre clé, un de vos équipements est en panne ? Nous sommes là pour trouver la
                        solution
                        à tous les
                        petits tracas techniques !
                    </p>
                </Panel>
                <Panel :toggleable="true" :collapsed="true" class="my-2">
                    <template #header>
                        <h2 class="text-lg  font-light text-center my-2 text-blue-2 uppercase  ">
                            Demande de réservation rapide !
                        </h2>
                    </template>
                    <div>
                        <h2 class="text-sm my-2 text-blue-2 uppercase font-semibold">
                            Impatient de poser vos valises ?<br />
                            Nous traitons votre dossier dans des délais record. Essayez :
                        </h2>
                    </div>
                    <p class="line-height-3 m-0">
                    <ul>
                        <li class="my-2"><i class="fa-solid fa-tag mr-2"></i>Choisissez l'appartement que vous demandez</li>
                        <li class="my-2"><i class="fa-solid fa-tag mr-2"></i>Préréservez en quelques clics.</li>
                        <li class="my-2"><i class="fa-solid fa-tag mr-2"></i>Remplissez bien tout vos information </li>
                        <li class="my-2"><i class="fa-solid fa-tag mr-2"></i>Vous recevez votre réponse par e-mail.</li>
                        <li class="my-2"><i class="fa-solid fa-tag mr-2"></i>Signez votre bail et emménagez : vous êtes chez vous !
                        </li>
                    </ul>
                    </p>
                </Panel>
                <Panel :toggleable="true" :collapsed="true" class="my-2">
                    <template #header>
                        <h2 class="text-lg  font-light text-center my-2 text-blue-2 uppercase  ">
                            Une communauté active
                        </h2>
                    </template>
                    <div>
                        <h2 class="text-sm my-2 text-blue-2  font-semibold">
                            Les locataires des résidences les lodge sont étudiants ou stagiaires.
                            Issus de parcours différents, ils étudient dans tous types d’établissements, souvent proches
                            de chez
                            eux.
                        </h2>
                    </div>
                    <p class="line-height-3 m-0">
                        Dans nos couloirs, vous croiserez peut-être des étudiants de votre école. C’est le moment de
                        créer votre
                        communauté
                        : faites vos trajets ensemble, travaillez en équipe et partagez vos groupes d’amis !
                    </p>
                </Panel>
                <Panel :toggleable="true" :collapsed="true" class="my-2">
                    <template #header>
                        <h2 class="text-lg  font-light text-center my-2 text-blue-2 uppercase  ">
                            Plus de 15 ans d’expérience
                        </h2>
                    </template>
                    <div>
                        <h2 class="text-sm my-2 text-blue-2  font-semibold">
                            Depuis 2009, le Groupe Réside Études est le spécialiste français des résidences urbaines
                            avec services.
                        </h2>
                    </div>
                    <p class="line-height-3 m-0">
                        En plus de 1 et demi-décennies, nous avons appris à bien connaître nos locataires. Nous savons
                        comment les
                        accompagner pour qu’ils puissent totalement se consacrer à leurs études.
                        Le reste ? C’est notre métier de le prendre en charge.
                    </p>
                </Panel>
            </div>
        </div>
        <div class=" w-[50%] p-3">
            <div class="overflow-hidden">
                <img :src="require('@/assets/image/etudiantInfo.jpg')" alt="Image"
                    class="md:ml-auto block w-[700px] h-[800px] object-cover animate-jump-in  animate-once animate-ease-in-out">
            </div>
        </div>
    </div>
</template>

<script>
import Accordion from 'primevue/accordion';
import Panel from 'primevue/panel';
// import Accordion from 'primevue/accordion';
import AccordionTab from 'primevue/accordiontab';
export default {
    name: 'Accordion',
    components: {
        Panel, Accordion, AccordionTab
    },
    data() {
        return {
            panelVisible: false
        }
    },
    methods: {
        togglePanel() {
            this.panelVisible = !this.panelVisible;
        }
    }
}
</script>