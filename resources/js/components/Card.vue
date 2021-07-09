<template>
  
      <div class="card mb-4">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">{{title}}</h3>
                  <span class="d-flex align-items-center badge badge-secondary">{{category}}</span>
                </div>
                <i>{{FormatDate.format(date)}}</i>
                <p class="card-text my-3">{{truncateText}}</p>
                <router-link class="btn btn-primary" :to="{name: 'pagedetail',params:{slug}}">Vai al post</router-link>
              </div>
        </div>

</template>

<script>
import FormatDate from '../classes/FormatDate';
export default {
    name: 'Card',
    props: ['title','category','date','content','slug'],
    data(){
        return{
            maxLenghtText:150,
            FormatDate
        }
    },
    computed:{
        truncateText(){
            let text = this.content;
            if(text.lenght > this.maxLenghtText){
                text = text.substr(0,this.maxLenghtText) + '...';
            }
            return text;
        }
    }
}
</script>

<style>

</style>