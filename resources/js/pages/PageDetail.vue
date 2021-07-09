<template>

  <div>

      <div v-if="!loaded">
          <Loader />
      </div>

      <div 
      v-else 
      class="card mb-4">

              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">{{post.title}}</h3>
                  <span v-if="post.category" class="d-flex align-items-center badge badge-secondary">{{post.category.name}}</span>
                </div>
                <i>{{FormatDate.format(post.created_at)}}</i>
                <p class="card-text my-3">{{post.content}}</p>

                <div>
                    <i
                    v-for="tag in post.tags"
                    :key="'t' + tag.id"
                    class="badge badge-primary"
                    >
                    {{tag.name}}
                    </i>
                </div>
               
              </div>
        </div>
  </div>
</template>

<script>
import FormatDate from '../classes/FormatDate'
import axios from 'axios';
import Loader from '../components/Loader.vue';
export default {
  components: { Loader },
    name: 'PageDetail',
    data(){
        return{

            post:{},
            FormatDate,
            loaded:false
        }
    },
    mounted(){
        console.log(this.$route.params.slug);
        axios.get('http://127.0.0.1:8000/api/posts/'+ this.$route.params.slug) 
        .then(res =>{
            console.log(res.data);
            if(res.data.success){
                this.post = res.data.data;
                this.loaded = true;
            }else{
                this.$router.push({name:'error404'})
            }
        })
        .catch(err =>{
            console.log(err);
        })
    }
}
</script>

<style lang="scss" scoped>
i{
    display: inline-block;
    margin-right: 5px;
}
</style>