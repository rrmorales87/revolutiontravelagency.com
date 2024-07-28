import {wTrans} from "laravel-vue-i18n";

export default function useFilterStatus(){

    const filterStatus = () => {
        return [
            { text: wTrans('Confirmed'), value:'confirmed' },
            { text: wTrans('Draft'), value:'draft' },
            { text: wTrans('Canceled'), value:'canceled' },
            { text: wTrans('Approved'), value:'approved' },
        ]
    }



    const filterStatusHandler = ( value, row) => {
        return row.status === value
    }
    return {
        filterStatus,
        filterStatusHandler
    }
}