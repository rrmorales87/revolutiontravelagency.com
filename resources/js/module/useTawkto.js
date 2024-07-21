import { inject,computed } from "vue";
import {useStore} from "vuex";
import {GET_LOCALE, GET_LOCALE_LIVE_CHAT} from "../store/getters/type";
import {SET_LOCALE_LIVE_CHAT} from "../store/mutations/type";
export function useTawkto() {
    const propertyId = '65e5ce3b9131ed19d974c793';
    const src_en = '1ho4qr6tt';
    const src_es = '1hq43401q';
    const onBeforeLoad = inject('onBeforeLoad');
    const switchWidget = inject('switchWidget');
    const store = useStore();
    const locale_chat = computed(()=>store.getters[GET_LOCALE_LIVE_CHAT]);
    const showlocale = computed(()=>store.getters[GET_LOCALE]);

    function mounted () {

            onBeforeLoad(() => {
                const widgetId = store.state.locale === 'es'?src_es:src_en;
                if(showlocale.value !== locale_chat.value){
                    switchWidget({
                        propertyId : propertyId,
                        widgetId : widgetId
                    }, function (resp) {
                        console.log("Change widget",resp);
                        store.commit(SET_LOCALE_LIVE_CHAT,showlocale.value);

                    });
                }

            });

    }

    function changeWidgetByLocale(locale) {
        const widgetId = locale === 'es'?src_es:src_en;
        //console.log("Pasa por aqui",locale);
        if(locale !== locale_chat.value){
            switchWidget({
                propertyId : propertyId,
                widgetId : widgetId
            }, function (resp) {
                //console.log("Change widget",resp);
                store.commit(SET_LOCALE_LIVE_CHAT,locale);

            });
        }




    }

    return {
        changeWidgetByLocale,
        mounted
    }

}