import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';
import mitt from 'mitt'

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

import VueLazyLoad from 'vue3-lazyload'

import VueTheMask from 'vue-the-mask'

import YmapPlugin from 'vue-yandex-maps'


/* Components */
import Header from '@/components/Fragments/Header.vue'
import Footer from '@/components/Fragments/Footer.vue'
import Modals from '@/components/Fragments/Modals.vue'
import Notifications from '@/components/Fragments/Notifications.vue'
import LoginForm from '@/components/Accounting/LoginForm.vue'
import RegistrationForm from '@/components/Accounting/RegistrationForm.vue'
import UserRegistrationForm from '@/components/Accounting/UserRegistrationForm.vue'
import GuideRegistrationForm from '@/components/Accounting/GuideRegistrationForm.vue'
import Benefits from '@/components/Fragments/Benefits.vue'
import TourCalendar from '@/components/Fragments/TourCalendar.vue'

import TourCard from '@/components/Tours/TourCard.vue'
import TourCategoriesListSlider from '@/components/Tours/TourCategoriesListSlider.vue'
import TourList from '@/components/Tours/TourList.vue'
import TourFavoriteList from '@/components/Tours/TourFavoriteList.vue'
import ImageModalDialog from '@/components/Fragments/ImageModalDialog.vue'
import MapModalDialog from '@/components/Fragments/MapModalDialog.vue'

/* Pages */
import MainPage from '@/pages/Main.vue'
import LoginPage from '@/pages/Login.vue'
import RegistrationPage from '@/pages/Registration.vue'
import AboutPage from '@/pages/About.vue'
import ContactPage from '@/pages/Contacts.vue'
import FAQPage from '@/pages/FAQ.vue'
import FavoritesPage from '@/pages/Favorites.vue'
import ForGuidesPage from '@/pages/ForGuides.vue'
import ForTouristPage from '@/pages/ForTourist.vue'
import GroupRegisterPage from '@/pages/GroupRegister.vue'
import GuidePage from '@/pages/Guide.vue'
import GuideCabinetPage from '@/pages/GuideCabinet.vue'
import HowBecomeGuidePage from '@/pages/HowBecomeGuide.vue'
import MessagesPage from '@/pages/Messages.vue'
import PartnersPage from '@/pages/Partners.vue'
import PrivacyPolicyPage from '@/pages/PrivacyPolicy.vue'
import RulesPage from '@/pages/Rules.vue'
import TourPage from '@/pages/tours/Tour.vue'
import ToursAllPage from '@/pages/tours/ToursAll.vue'
import ToursHotPage from '@/pages/tours/ToursHot.vue'
import TourObjectPage from '@/pages/tours/TourObject.vue'
import ToursSearchPage from '@/pages/tours/ToursSearch.vue'
import UserCabinetPage from '@/pages/UserCabinet.vue'

/*------------------------*/
import GuideTours from '@/components/GuideCabinet/GuideTours.vue'
import GuideTourList from '@/components/GuideCabinet/GuideTourList.vue'
import GuideTourCard from '@/components/GuideCabinet/GuideTourCard.vue'
import GuideTourObjects from '@/components/GuideCabinet/GuideTourObjects.vue'
import GuideTourObjectList from '@/components/GuideCabinet/GuideTourObjectList.vue'
import GuideTourObjectCard from '@/components/GuideCabinet/GuideTourObjectCard.vue'
import GuideTourObjectPaginate from '@/components/GuideCabinet/GuideTourObjectPaginate.vue'

const eventBus = mitt()
const app = createApp({})

app.config.globalProperties.eventBus = eventBus

app.use(VueLazyLoad,
    {
        loading: '/img/preloader.gif',
        error: '/img/error.png'
    })


const settings = {
    apiKey: 'c3ddaef1-2a3e-4aea-bd55-698a8735fc7d',
    lang: 'ru_RU',
    debug:true,
    coordorder: 'latlong',
    version: '2.1'
}
app.use(YmapPlugin, settings)

import moment from 'moment'

window.moment = moment

app.use(VueTheMask)

app.component('Datepicker', Datepicker);

app.component('header-component', Header)
app.component('footer-component', Footer)
app.component('modals-component', Modals)
app.component('notifications-component', Notifications)
//app.component('advantages-component', Benefits)
app.component('benefits-component', Benefits)
app.component('login-form-component', LoginForm)
app.component('registration-form-component', RegistrationForm)
app.component('guide-registration-form-component', GuideRegistrationForm)
app.component('user-registration-form-component', UserRegistrationForm)
app.component('tour-calendar-component', TourCalendar)

app.component('tour-card-component', TourCard)
app.component('tour-categories-list-slider-component', TourCategoriesListSlider)
app.component('tour-list-component', TourList)
app.component('tour-favorite-list-component', TourFavoriteList)
app.component('image-modal-dialog-component', ImageModalDialog)
app.component('map-modal-dialog-component', MapModalDialog)

app.component('main-page', MainPage)
app.component('login-page', LoginPage)
app.component('registration-page', RegistrationPage)
app.component('about-page', AboutPage)
app.component('contact-page', ContactPage)
app.component('faq-page', FAQPage)
app.component('favorites-page', FavoritesPage)
app.component('for-guides-page', ForGuidesPage)
app.component('for-tourist-page', ForTouristPage)
app.component('group-register-page', GroupRegisterPage)
app.component('guide-page', GuidePage)
app.component('guide-cabinet-page', GuideCabinetPage)
app.component('how-become-guide-page', HowBecomeGuidePage)
app.component('messages-page', MessagesPage)
app.component('partners-page', PartnersPage)
app.component('privacy-policy-page', PrivacyPolicyPage)
app.component('rules-page', RulesPage)
app.component('tour-page', TourPage)
app.component('tours-all-page', ToursAllPage)
app.component('tours-hot-page', ToursHotPage)
app.component('tour-object-page', TourObjectPage)
app.component('tour-search-page', ToursSearchPage)
app.component('user-cabinet-page', UserCabinetPage)

/*---------------------------*/
app.component('guide-tours-component', GuideTours)
app.component('guide-tour-list-component', GuideTourList)
app.component('guide-tour-card-component', GuideTourCard)
app.component('guide-tour-objects-component', GuideTourObjects)
app.component('guide-tour-object-paginate-component', GuideTourObjectPaginate)
app.component('guide-tour-object-list-component', GuideTourObjectList)
app.component('guide-tour-object-card-component', GuideTourObjectCard)


import store from './store'


app.use(store)

app.mount('#app')
