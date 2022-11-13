import util from '../../utilites';

const BASE_GUIDE_ARCHIVE_TOURS_LINK = '/api/guide-cabinet/tours/archive'

let state = {
    guide_archive_tours: [],
    guide_archive_tours_paginate_object: [],
}

const getters = {
    getGuideArchiveTours: state => state.guide_archive_tours || [],
    getGuideArchiveToursById: (state) => (id) => {
        return state.guide_archive_tours.find(item => item.id === id)
    },
    getGuideArchiveToursPaginateObject: state => state.guide_archive_tours_paginate_object || [],
}

const actions = {
    errorsGuideArchiveTours({commit}) {
        commit('setGuideArchiveTours',
            !localStorage.getItem('travel_store_guide_archive_tours') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_archive_tours')))

        commit('setGuideArchiveToursPaginateObject',
            !localStorage.getItem('travel_store_guide_archive_tours_paginate_object') ?
                [] : JSON.parse(localStorage.getItem('travel_store_guide_archive_tours_paginate_object')))
    },
    async guideArchiveToursPage({commit}, link, method = 'GET', data = null) {
        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            commit('setGuideArchiveTours', dataObject.data)
            delete dataObject.data
            commit('setGuideArchiveToursPaginateObject', dataObject)

        }).catch(err => {
            this.errorsGuideArchiveTours(commit)
        })
    },
    async addTourToArchive({commit}, tourId) {
        return await this.guideArchiveToursPage(commit,
            `${BASE_GUIDE_ARCHIVE_TOURS_LINK}/add/${tourId}`)
    },
    async clearArchiveTours({commit}) {
        return await this.guideArchiveToursPage(commit,
            `${BASE_GUIDE_ARCHIVE_TOURS_LINK}/clear`)
    },
    async restoreTourFromArchive({commit}, tourId) {
        return await this.guideArchiveToursPage(commit,
            `${BASE_GUIDE_ARCHIVE_TOURS_LINK}/restore/${tourId}`)
    },
    async loadGuideArchiveToursFilteredByPage({commit}, filterObject, page = 0, size = 15) {
        return await this.guideArchiveToursPage(commit,
            `${BASE_GUIDE_ARCHIVE_TOURS_LINK}/search?page=${page}&size=${size}`,
            'POST',
            filterObject)
    },
    async loadGuideArchiveToursByPage({commit}, page = 0, size = 15) {
        return await this.guideArchiveToursPage(commit,
            `${BASE_GUIDE_ARCHIVE_TOURS_LINK}?page=${page}&size=${size}`)
    },
}

const mutations = {
    setGuideArchiveTours(state, payload) {
        state.guide_archive_tours = payload.data || [];
        localStorage.setItem('travel_store_guide_archive_tours', JSON.stringify(payload));
    },
    setGuideArchiveToursPaginateObject(state, payload) {
        state.guide_archive_tours_paginate_object = payload.data || [];
        localStorage.setItem('travel_store_guide_archive_tours_paginate_object', JSON.stringify(payload));
    }
}

const guideArchiveToursModule = {
    state,
    mutations,
    actions,
    getters
}
export default guideArchiveToursModule;
