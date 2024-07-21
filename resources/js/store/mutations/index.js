import {SET_LOCALE,SET_LOCALE_LIVE_CHAT} from "./type";

export default {
    [SET_LOCALE]:(state,val)=> state.locale = val,
    [SET_LOCALE_LIVE_CHAT]:(state,val)=> state.locale_live_chat = val,
}