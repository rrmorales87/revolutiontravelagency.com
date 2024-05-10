<script setup>
import {UploadFilled} from "@element-plus/icons-vue";
import {computed, onMounted, ref, watch} from "vue";
import { helpers, required} from "@vuelidate/validators";
import InputError from "@/Components/InputError.vue";
import {wTrans} from "laravel-vue-i18n";
import {useVuelidate} from "@vuelidate/core";
import {usePage} from "@inertiajs/vue3";
const layer = ref([]);
const map = ref({});
const page = usePage();
const props = defineProps(['data','update']);
const emits = defineEmits(['submit']);
import Notifications from "../../Components/Notifications";
import {router} from "@inertiajs/vue3";
const rules = computed(() => {
  return {
    name:{ required: helpers.withMessage(wTrans("requiredField"), required)},
    likes:{required: helpers.withMessage(wTrans("requiredField"), required)},
    price:{required: helpers.withMessage(wTrans("requiredField"), required)}
  }
});
const $v = useVuelidate(rules, props.data);
const sendData = async ()=> {
  const valid = await $v.value.$validate();
  console.log("Valid",valid);
  if(props.data.images.length === 0){
    Notifications.open(wTrans('notImage').value,'error');
    return;
  }
  if (valid)
    emits('submit',props.data);
  else
    Notifications.open(wTrans('errorField').value,'error');
}

const initMap = () => {
  map.value =  L.map('map').setView([22.004, -76.707], 6);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map.value);
  function onMapClick(e) {

    if(layer.value.length>0){
      layer.value[0].remove();
      layer.value = [];
    }
    layer.value.push(L.marker(e.latlng).addTo(map.value));
    props.data.location = e.latlng;
  }
  map.value.on('click', onMapClick);
}
const destroyMap = ()=>map.value.remove();
const cancelSend = () => {
  if(props.update)
  {
    router.visit(route('topDestinations'));
    return;
  }
  props.data.reset();
  destroyMap();
  initMap();
}
const loadImage = () => {

  props.data.images = [
    {
      name: props.data.photo.split('/')[props.data.photo.split('/').length-1],
      url: props.data.photo
    }
  ];
}
const loadMap = () => {
  if(props.data.location){
    //console.log("Maapppppp",JSON.parse(props.data.location));
    const marker = L.marker(JSON.parse(props.data.location)).addTo(map.value);
    layer.value.push(marker);
    map.value.flyTo(marker.getLatLng(),12);
  }

}
onMounted(()=>{
  initMap();
  if (props.update) {
    loadImage();
    loadMap();
  }

})
watch(()=>page.props.success,(newVal)=>{
  console.log("Change",newVal);
      if (!newVal)
      {
        Notifications.open(page.props.message,'error');
      }
});
</script>

<template>

<div class="card  flex justify-center  w-full">
  <div  class="form border rounded-2xl shadow-md m-5 p-5 gap-4 w-full">
      <div class="flex  lg:flex-nowrap sm:flex-wrap xs:flex-wrap gap-4 ">
        <div class="w-full">
          <label for="id-name">{{$t('Name')}}</label>
          <el-input id="id-name" name="name" v-model="props.data.name"/>
          <InputError :errors="$v.name.$errors"/>
        </div>
        <div class="w-3/6  grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-2">
          <div class=" flex flex-col">
            <label for="id-price">{{$t('Price')}}</label>
            <el-input-number
                id="id-price"
                name="price"
                controls-position="right"
                :precision="2"
                :step="0.1"
                v-model="props.data.price" />
            <InputError :errors="$v.price.$errors"/>
          </div>
          <div class=" flex flex-col">
            <label for="id-likes">Likes</label>
            <el-input-number
                id="id-likes"
                name="likes"
                controls-position="right"
                :min="0"
                v-model="props.data.likes"
            />
            <InputError :errors="$v.likes.$errors"/>
          </div>
        </div>

      </div>
      <!-- Upload image -->
      <div class="w-full mt-5">
        <el-upload
            v-model:file-list="props.data.images"
            class="upload-demo"
            drag
            :action="route('image.store')"
            method="POST"


        >
          <el-icon class="el-icon--upload"><UploadFilled /></el-icon>
          <div class="el-upload__text">
            Drop file here or <em>click to upload</em>
          </div>
          <template #tip>
            <div class="el-upload__tip">
              {{$t('limitImage')}}
            </div>
          </template>
        </el-upload>
      </div>
      <!-- Mapa -->
      <label class="mt-5">{{$t('location')}}</label>
      <div class="w-full mb-5 border-2" id="map" style="height:450px">

      </div>
      <div class="float-right">
        <el-button round  @click="cancelSend" class="w-56">
          {{$t('Cancel')}}
        </el-button>
        <el-button round color="#0F3B53" @click="sendData" class="w-56">
          {{$t('send')}}
        </el-button>
      </div>




    </div>


</div>
</template>

<style scoped lang="scss">

</style>