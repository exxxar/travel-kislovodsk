import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import { createStore } from 'vuex'
import VueLazyLoad from 'vue3-lazyload'


/*import Head from '@/components/Fragments/Header'
import Footer from '@/components/Fragments/Footer'

*/

/* Components */
import Header from '@/components/Fragments/Header.vue'
import Footer from '@/components/Fragments/Footer.vue'
import Modals from '@/components/Fragments/Modals.vue'
import Notifications from '@/components/Fragments/Notifications.vue'
import LoginForm from '@/components/Accounting/LoginForm.vue'
import Benefits from '@/components/Fragments/Benefits.vue'

import TourCard from '@/components/Tours/TourCard.vue'
import TourCategoriesListSlider from '@/components/Tours/TourCategoriesListSlider.vue'
import TourList from '@/components/Tours/TourList.vue'

/* Pages */
import MainPage from '@/pages/Main.vue'
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

const app = createApp({})

app.use(VueLazyLoad, {
    loading: '/img/preloader.gif',
    error: '/img/error.png',
})

app.component('header-component', Header)
app.component('footer-component', Footer)
app.component('modals-component', Modals)
app.component('notifications-component', Notifications)
//app.component('advantages-component', Benefits)
app.component('benefits-component', Benefits)
app.component('login-form-component', LoginForm)

app.component('tour-card-component', TourCard)
app.component('tour-categories-list-slider-component', TourCategoriesListSlider)
app.component('tour-list-component', TourList)

app.component('main-page', MainPage)
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



const store = createStore({
    state () {
        return {
            count: 1
        }
    }
})

app.use(store)

app.mount('#app')
