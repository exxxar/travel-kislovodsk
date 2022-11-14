import booked from './user_booked_tours'
import watched from './user_watched_tours'

const BASE_USER_TOURS_LINK = '/api/user-cabinet/tours'

let state = {
    ...booked.state,
    ...watched.state,
}

const getters = {
    ...booked.getters,
    ...watched.getters,
}

const actions = {
    ...booked.actions,
    ...watched.actions,
}

const mutations = {
    ...booked.mutations,
    ...watched.mutations,
}

const userToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default userToursModule;
