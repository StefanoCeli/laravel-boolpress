<template>
  <div>
      <h1 class="mb-5">Blog</h1>
          
          <div>

            <div 
            v-if="!loaded"
            class="loader text-center">
              <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </div>

           <div v-if="loaded">
              <div class="card mb-4"
            v-for="post in posts"
            :key="'p' + post.id"
            >
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">{{post.title}}</h3>
                  <span class="d-flex align-items-center badge badge-secondary">{{post.category}}</span>
                </div>
                <i>{{formatDate(post.date)}}</i>
                <p class="card-text">{{post.content}}</p>
                <a href="#" class="btn btn-primary">Vai al post</a>
              </div>
            </div>

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

export default {
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

<style lang="scss" scoped>
.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: rgb(126, 124, 124);
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}

</style>