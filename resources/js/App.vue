<template>
   <div>
       <Header />
  <div class="container"> 
      <h1>I nostri post</h1>
      <section
      class="mb-5"
        v-for="post in posts"
        :key="post.id"
      >
          <h3>{{post.title}}</h3>
          <h4>Categoria: {{post.category}}</h4>
          <h5>{{formatDate(post.date)}}</h5>
          <div><a href="">vai...</a></div>
      </section>

      <div class="nav-pages">
          <button 
          v-if="pagination.current > 1"
            @click="getPosts(pagination.current - 1)"
          class="badge badge-primary">prev</button>
          <button
          v-if="pagination.current < pagination.last"
            @click="getPosts(pagination.current + 1)"
           class="badge badge-primary">next</button>
      </div>
  </div>
   </div>
</template>

<script>

import Header from './components/Header.vue';
import axios from 'axios';

export default {
    name: 'App',
    components: {
        Header 
    },
    data(){
        return{
            posts:[],
            pagination:{}
        }
    },
    methods:{

        getPosts(page = 1){
            axios.get('http://127.0.0.1:8000/api/posts',{
                params:{
                    page:page
                }
            })
                .then(res =>{
                    this.posts = res.data.data
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    }
                    console.log(this.posts);
                })
                .catch(err =>{
                    console.log(err);
                })
        },
        formatDate(date){
            let d = new Date(date);
            let dy = d.getDate();
            let m = d.getMonth() +1;
            let y = d.getFullYear();

            if(dy < 10) dy = '0' + dy;
            if(m < 10) m = '0' + m;

            return `${dy}/${m}/${y}`;
        }
    },
    created(){
        this.getPosts();
    }
}
</script>

<style lang="scss">

    @import '../sass/frontoffice/global';

</style>