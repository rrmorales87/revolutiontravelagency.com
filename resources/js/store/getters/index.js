import {GET_LOCALE,GET_LOCALE_LIVE_CHAT} from "./type";

export default {
    [GET_LOCALE]:(state) => state.locale,
    [GET_LOCALE_LIVE_CHAT]:(state) => state.locale_live_chat
}