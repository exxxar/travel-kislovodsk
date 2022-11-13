import current from './guide_current_tours'
import archive from './guide_archive_tours'
import inDraft from './guide_in_draft_tours'
import inModerate from './guide_in_moderate_tours'

const BASE_GUIDE_TOURS_LINK = '/api/guide-cabinet/tours'

let state = {
    ...archive.state,
    ...current.state,
    ...inDraft.state,
    ...inModerate.state,
}

const getters = {
    ...archive.getters,
    ...current.getters,
    ...inDraft.getters,
    ...inModerate.getters,
}

const actions = {
    ...archive.actions,
    ...current.actions,
    ...inDraft.actions,
    ...inModerate.actions,
    async editTour({commit}, tour, tourId) {
        return axios.put(`${BASE_GUIDE_TOURS_LINK}/${tourId}`,
            tour).then((response) => {
            this.loadGuideCurrentToursByPage(commit)
            this.loadInDraftToursByPage(commit)
        }).catch(err => {

        })
    },
    async createTour({commit}, tour) {
        return axios.post(`${BASE_GUIDE_TOURS_LINK}`,
            tour).then((response) => {
            this.loadGuideCurrentToursByPage(commit)
            this.loadInDraftToursByPage(commit)
        }).catch(err => {

        })
    },
    async removeTour({commit}, tourId) {
        return axios.delete(`${BASE_GUIDE_TOURS_LINK}/remove/${tourId}`).then((response) => {
            this.loadGuideArchiveToursByPage(commit)
            this.loadGuideCurrentToursByPage(commit)
            this.loadInDraftToursByPage(commit)
            this.loadInModerateToursByPage(commit)
        }).catch(err => {

        })

    },
}

const mutations = {
    ...archive.mutations,
    ...current.mutations,
    ...inDraft.mutations,
    ...inModerate.mutations,
}

const guideToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideToursModule;
