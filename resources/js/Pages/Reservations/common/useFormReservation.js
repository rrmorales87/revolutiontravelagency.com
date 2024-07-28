import {computed, ref, defineProps} from "vue";
import moment from "moment/moment";
import {usePage} from "@inertiajs/vue3";

export default function useFormReservation (origins,destinations) {
    let timeout;
    const page = usePage();
    const user = computed(()=>page.props.auth.user);
    const form = ref({
        origin:  '',
        destiny: '' ,
        date:moment().format("YYYY-MM-DD"),
        time:moment().format("HH:mm:ss"),
        travellers:1,
        name:user.value.name,
        contact:user.value.email,
        status:"",
        tax:1
    })
    const resetForm = () => {
        form.value = {
            origin:  '',
            destiny:  '',
            date:moment().format("YYYY-MM-DD"),
            time:moment().format("HH:mm:ss"),
            time_end:moment().format("HH:mm:ss"),
            travellers:1,
            name:user.value.name,
            contact:user.value.email,
            status:"",
            tax:1
        }
    }

    const querySearchAsyncAutoCompleteOrigin = (queryString, cb) => {
        const results = queryString
            ? origins.filter(v=>v.name.toLowerCase().includes(queryString.toLowerCase())).map(v=>{
                return {value:v.name};})
            : origins.map(v=>{
                    return {value:v.name};
                }

            );

        clearTimeout(timeout)
        timeout = setTimeout(() => {
            cb(results)
        }, 900 * Math.random())
    }

    const querySearchAsyncAutoCompleteDestinations = (queryString, cb) => {
        const results = queryString
            ? destinations.filter(v=>v.name.toLowerCase().includes(queryString.toLowerCase())).map(v=>{
                return {value:v.name};})
            : destinations.map(v=>{
                    return {value:v.name};
                }

            );

        clearTimeout(timeout)
        timeout = setTimeout(() => {
            cb(results)
        }, 900 * Math.random())
    }

    return {
        form,
        resetForm,
        querySearchAsyncAutoCompleteOrigin,
        querySearchAsyncAutoCompleteDestinations
    }
}