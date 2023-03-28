import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';
import mitt from 'mitt'
import NotificationsVue from '@kyvg/vue3-notification'
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
import PasswordRecoveryForm from '@/components/Accounting/PasswordRecoveryForm.vue'
import RegistrationForm from '@/components/Accounting/RegistrationForm.vue'

import Benefits from '@/components/Fragments/Benefits.vue'
import TourCalendar from '@/components/Fragments/TourCalendar.vue'
import DateTimeCalendar from '@/components/Fragments/DateTimeCalendar.vue'

import TourCard from '@/components/Tours/TourCard.vue'
import TourCategoriesListSlider from '@/components/Tours/TourCategoriesListSlider.vue'
import TourList from '@/components/Tours/TourList.vue'
import TourFavoriteList from '@/components/Tours/TourFavoriteList.vue'
import ImageModalDialog from '@/components/Fragments/ImageModalDialog.vue'
import ActionModalDialog from '@/components/Fragments/ActionModalDialog.vue'
import MapModalDialog from '@/components/Fragments/MapModalDialog.vue'
import MapWithPointsModalDialog from '@/components/Fragments/MapWithPointsModalDialog.vue'
import SelectedMapModalDialog from '@/components/Fragments/SelectedMapModalDialog.vue'
import Breadcrumbs from "@/components/Fragments/Breadcrumbs.vue";
import CallbackForm from '@/components/Callback/CallbackForm.vue'
import CallbackSection from '@/components/Fragments/CallbackSection.vue'

import TourObjects from '@/components/TourObjects/TourObjectGlobalList.vue'
import TourObjectCard from '@/components/TourObjects/TourObjectCard.vue'
/* Pages */
import MainPage from '@/pages/Main.vue'
import LoginPage from '@/pages/Login.vue'
import ForgotPasswordPage from '@/pages/ForgotPassword.vue'
import RegistrationPage from '@/pages/Registration.vue'
import AboutPage from '@/pages/About.vue'
import SettingsPage from '@/pages/Settings.vue'
import ContactPage from '@/pages/Contacts.vue'
import ContactUsPage from '@/pages/ContactUs.vue'
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
import TourObjectsPage from '@/pages/tours/TourObjects.vue'
import ToursHotPage from '@/pages/tours/ToursHot.vue'
import TourObjectPage from '@/pages/tours/TourObject.vue'
// ToursSearchPage from '@/pages/tours/ToursSearch.vue'
import UserCabinetPage from '@/pages/UserCabinet.vue'
import VerifyEmailPage from '@/pages/VerifyEmail.vue'


/*------------------------*/
import GuideTours from '@/components/GuideCabinet/GuideTours.vue'
import GuideTourList from '@/components/GuideCabinet/GuideTourList.vue'
import GuideTourCard from '@/components/GuideCabinet/GuideTourCard.vue'
import GuideTourObjects from '@/components/GuideCabinet/GuideTourObjects.vue'
import GuideTourObjectList from '@/components/GuideCabinet/GuideTourObjectList.vue'
import GuideTourObjectCard from '@/components/GuideCabinet/GuideTourObjectCard.vue'

import Paginate from '@/components/Fragments/Pagination.vue'
import GuideDocuments from "@/components/GuideCabinet/GuideDocuments.vue";
import GuideTourGroup from "@/components/GuideCabinet/GuideTourGroup.vue";
import ReviewList from "@/components/Reviews/ReviewList.vue";
import ReviewAddForm from "@/components/Reviews/ReviewAddForm.vue";
import ExcelUploader from "@/components/Fragments/ExcelUploader.vue";

import Rating from "@/components/Fragments/Rating.vue";

import PersonalReviewCard from '@/components/Reviews/PersonalReviewCard.vue'


import MobileFooterMenu from "@/components/Fragments/Mobile/MobileFooterMenu.vue";
import MobileSideBarMenu from "@/components/Fragments/Mobile/MobileSideBarMenu.vue";

const eventBus = mitt()
const app = createApp({})

app.use(NotificationsVue)
app.config.globalProperties.eventBus = eventBus

window.eventBus = eventBus;

app.use(VueLazyLoad,
    {
        loading: '/img/load.gif',
        error: '/img/error.png'
    })


const settings = {
    apiKey: 'c3ddaef1-2a3e-4aea-bd55-698a8735fc7d',
    lang: 'ru_RU',
    coordorder: 'latlon',
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
app.component('password-recovery-form-component', PasswordRecoveryForm)
app.component('registration-form-component', RegistrationForm)

app.component('tour-calendar-component', TourCalendar)
app.component('date-time-calendar-component', DateTimeCalendar)
app.component('breadcrumbs-component', Breadcrumbs)
app.component('callback-component', CallbackForm)
app.component('callback-section-component', CallbackSection)


app.component('tour-card-component', TourCard)
app.component('tour-categories-list-slider-component', TourCategoriesListSlider)
app.component('tour-list-component', TourList)
app.component('tour-favorite-list-component', TourFavoriteList)
app.component('image-modal-dialog-component', ImageModalDialog)
app.component('action-modal-dialog-component', ActionModalDialog)
app.component('map-modal-dialog-component', MapModalDialog)
app.component('map-with-points-modal-dialog-component', MapWithPointsModalDialog)
app.component('selected-map-modal-dialog-component', SelectedMapModalDialog)

app.component('main-page', MainPage)
app.component('login-page', LoginPage)
app.component('registration-page', RegistrationPage)
app.component('forgot-password-page', ForgotPasswordPage)
app.component('about-page', AboutPage)
app.component('settings-page', SettingsPage)
app.component('contact-page', ContactPage)
app.component('contact-us-page', ContactUsPage)
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
app.component('tour-objects-page', TourObjectsPage)
app.component('tours-hot-page', ToursHotPage)
app.component('tour-object-page', TourObjectPage)
//app.component('tour-search-page', ToursSearchPage)
app.component('user-cabinet-page', UserCabinetPage)
app.component('verify-email-page', VerifyEmailPage)

app.component('tour-objects-component', TourObjects)
app.component('tour-object-card-component', TourObjectCard)
/*---------------------------*/
app.component('guide-tours-component', GuideTours)
app.component('guide-tour-list-component', GuideTourList)
app.component('guide-tour-card-component', GuideTourCard)
app.component('guide-tour-objects-component', GuideTourObjects)

app.component('guide-tour-object-list-component', GuideTourObjectList)
app.component('guide-tour-object-card-component', GuideTourObjectCard)
app.component('guide-documents-component', GuideDocuments)
app.component('guide-tour-group-component', GuideTourGroup)

app.component('personal-review-card-component', PersonalReviewCard)
app.component('review-list-component', ReviewList)
app.component('review-add-form-component', ReviewAddForm)
app.component('rating-component', Rating)
app.component('excel-uploader-component', ExcelUploader)

app.component('paginate-component', Paginate)

app.component('mobile-footer-menu-component', MobileFooterMenu)
app.component('mobile-sidebar-menu-component', MobileSideBarMenu)

/*************Admin*****************/

import AdminCabinetPage from '@/pages/AdminCabinet.vue'
import AdminToursPage from '@/pages/admin/Tours.vue'
import AdminTourObjectsPage from '@/pages/admin/TourObjects.vue'
import AdminUsersPage from '@/pages/admin/Users.vue'
import AdminTransactionsPage from '@/pages/admin/Transactions.vue'

import AdminMenuComponent from '@/components/AdminCabinet/AdminMenuBar.vue'
import AdminToursComponent from '@/components/AdminCabinet/Tours/AdminTours.vue'
import AdminTourCardComponent from '@/components/AdminCabinet/Tours/AdminTourCard.vue'
import AdminTourObjectsComponent from '@/components/AdminCabinet/TourObjects/AdminTourObjects.vue'
import AdminTourObjectCardComponent from '@/components/AdminCabinet/TourObjects/AdminTourObjectCard.vue'
import AdminAddTourComponent from '@/components/AdminCabinet/Tours/AdminAddTour.vue'
import AdminAddTourObjectComponent from '@/components/AdminCabinet/Tours/AdminTours.vue'
import AdminUsersComponent from '@/components/AdminCabinet/Users/AdminUsers.vue'
import AdminTransactionsComponent from '@/components/AdminCabinet/Transactions/AdminTransactions.vue'
import AdminAddUserComponent from '@/components/AdminCabinet/Tours/AdminTours.vue'
import AdminUserCardComponent from '@/components/AdminCabinet/Users/AdminUserCard.vue'
import AdminEditUserComponent from '@/components/AdminCabinet/Tours/AdminTours.vue'
import AdminEditTourComponent from '@/components/AdminCabinet/Tours/AdminEditTour.vue'
import AdminEditTourObjectComponent from '@/components/AdminCabinet/Tours/AdminTours.vue'
import WeatherComponent from '@/components/Fragments/Weather.vue'
import FindWeatherComponent from '@/components/Fragments/FindWeather.vue'

app.component('admin-cabinet-page', AdminCabinetPage)
app.component('admin-tours-page', AdminToursPage)
app.component('admin-tour-objects-page', AdminTourObjectsPage)
app.component('admin-users-page', AdminUsersPage)
app.component('admin-transactions-page', AdminTransactionsPage)

app.component('admin-menu-component', AdminMenuComponent)
app.component('admin-tours-component', AdminToursComponent)
app.component('admin-tour-card-component', AdminTourCardComponent)

app.component('admin-tour-objects-component', AdminTourObjectsComponent)
app.component('admin-tour-object-card-component', AdminTourObjectCardComponent)

app.component('admin-add-tour-component', AdminAddTourComponent)
app.component('admin-add-tour-object-component', AdminAddTourObjectComponent)
app.component('admin-users-component', AdminUsersComponent)
app.component('admin-transactions-component', AdminTransactionsComponent)
app.component('admin-add-user-component', AdminAddUserComponent)
app.component('admin-user-card-component', AdminUserCardComponent)
app.component('admin-edit-user-component', AdminEditUserComponent)
app.component('admin-edit-tour-component', AdminEditTourComponent)
app.component('admin-edit-tour-object-component ', AdminEditTourObjectComponent)
app.component('weather-component', WeatherComponent)
app.component('find-weather-component', FindWeatherComponent)

import store from './store'

app.config.globalProperties.$filters = {
    phoneFilter(value) {
        let v = ""+value
        return `+${v[0]}(${v[1]}${v[2]}${v[3]}) ${v[4]}${v[5]}${v[6]}-${v[7]}${v[8]}-${v[9]}${v[10]}`
    }
}

app.use(store)

app.mount('#app')


window.app = app;
