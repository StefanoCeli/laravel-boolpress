<template>
  <div>
      <h1 class="mb-5">Blog</h1>
          
          <div>

            <div 
            v-if="!loaded"
            class="text-center">
              <Loader />
            </div>

            <div v-else>
                <Card
                  v-for="post in posts"
                  :key="'p' + post.id"
                  :title = post.title
                  :content = post.content
                  :slug = post.slug
                  :date = post.date
                  :category = post.category
                  />

              <nav aria-label="Page navigation example">
                <ul class="pagination">

                  <li class="page-item" 
                  :class="{disabled: pagination.current === 1}" >
                  <button class="page-link" @click="getPosts(pagination.current - 1)">Previous</button>
                  </li>

                  <li
                    v-for=" i in pagination.last"
                    :key=" 'i' + i"
                    :class="{'active' : pagination.current === i}"
                    class="page-item">
                    <button 
                    @click="getPosts(i)"
                    class="page-link">{{i}}</button></li>

                  <li class="page-item" 
                :class="{disabled: pagination.current === pagination.last}">
                  <button class="page-link" @click="getPosts(pagination.current + 1)">Next</button>
                  </li>
                </ul>
              </nav>
           </div>
          </div>
  </div>
</template>

<script>

import axios from 'axios';
import Loader from '../components/Loader.vue';
import Card from '../components/Card.vue';

export default {
  components: { Loader, Card },
  name:'Blog',
    data(){
        return{
            posts:[],
            pagination:{},
            loaded:false,
        }
    },
    methods:{

        getPosts(page = 1){
          this.loaded = false;
            axios.get('http://127.0.0.1:8000/api/posts',{
                params:{
                    page:page
                }
            })
                .then(res =>{
                    this.posts = res.data.data
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page,
                    }
                    this.loaded = true;
                    console.log(this.posts);
                })
                .catch(err =>{
                    this.loaded = false;
                    console.log(err);
                });
        }
    },
    created(){
        this.getPosts();
    }
}
</script>

<style lang="scss" scoped>

</style>