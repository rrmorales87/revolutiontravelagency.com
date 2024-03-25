import {ElNotification} from "element-plus";
import {wTrans} from "laravel-vue-i18n";
export default class Notifications {
    static open(message,type){
        switch (type) {
            case'error':
                ElNotification.error({
                    title: wTrans("error").value,
                    message: message,
                    customClass:'notification'
                })
                break;
            case 'success':
                ElNotification.success({
                    title: wTrans("success").value,
                    message: message,
                    customClass:'notification'
                })
                break;
            case 'warning':
                ElNotification.warning({
                    title: wTrans("warning").value,
                    message: message,
                    customClass:'notification'
                })
                break;
            default:
                ElNotification.info({
                    title: wTrans("info").value,
                    message: message,
                    customClass:'notification'
                })
                break;
        }
    }
}


