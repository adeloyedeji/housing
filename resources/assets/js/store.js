import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        notifications: [], 
        auth_user: {},
        ads: [],
    }, 
    getters: {
        all_notifications(state) {
            return state.notifications
        }, 
        all_notifications_count(state) {
            return state.notifications.length
        }, 
        all_ads(state) {
            return state.ads
        },
        all_ads_count(state) {
            return state.ads.length
        }
    }, 
    mutations: {
        add_notification(state, notification) {
            state.notifications.push(notification)
        }, 
        auth_user_data(state, user) {
            state.auth_user = user
        }, 
        add_ad(state, ad) {
            state.ads.push(ad)
        },
        delete_ad(state, payLoad) {
            var ad = state.ads.find( (a) => {
                return a.id === payLoad.ad_id
            } )
            console.log("From store:")
            console.log("What is going to be removed")
            console.log(ads.indexOf(ad))
            //aa = ads.indexOf(ad)

            //ads.splice(aa, 1)
        }
    }, 
    actions: {

    }
})