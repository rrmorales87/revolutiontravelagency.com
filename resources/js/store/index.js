import {createStore} from "vuex";
import  Mutations from "@/store/mutations/index";
import Getters from "@/store/getters/index";
export default createStore({
    state:{
        locale:''
    },
    mutations:{
        ...Mutations,
    },
    getters:{
        ...Getters,
    }
})