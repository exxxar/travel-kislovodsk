import { createStore } from 'vuex'
import tours from'./modules/tours';
import reviews from'./modules/reviews';
import favorites from'./modules/favorites';
import dictionaries from'./modules/dictionaries';
import categories from'./modules/tour-categories';
import bookings from'./modules/bookings';
import chats from'./modules/chats';
import guideCabinet from'./modules/guide_cabinet';
import userCabinet from'./modules/user_cabinet';


export default createStore({
    modules: {
        tours,
        favorites,
        dictionaries,
        categories,
        bookings,
        chats,
        reviews,
        guideCabinet,
        userCabinet
    }
})
