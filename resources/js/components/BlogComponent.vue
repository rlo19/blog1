<template>
    <div class="container">
        <div class="row justify-content-center" v-for="data in datas">            
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12">
                            Image                       
                        </div>
                        <div class="col-md-12">
                            <a :href="profileUrl + data.id">{{data.name}}</a>                   
                        </div>
                        <div class="col-md-12">
                            {{data.created_at}}                    
                        </div>  
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a :href="profileUrl + data.id + '/' + data.aid">{{data.title}}</a></div>

                    <div class="card-body">

                        {{data.body}}

                    </div>
                </div>
            </div>    
            <div class="col-md-12"><br></div>                   
        </div>
    </div>
</template>

<script>
    export default {        
        data() {
            return {
                datas: '',
                offset: this.parentOffset, 
                blogUrl: window.location.origin + '/profile/' + this.uid,
                uidForPageinate: 0,
                profileUrl: window.location.origin + '/profile/',
            }
        },
        props: [
            'parentOffset',
            'uid'
        ],        
        mounted() {

            if(typeof this.uid !== 'undefined') {
                this.uidForPageinate = this.uid
            }
            
            axios
              .get(window.location.origin + '/api/articles/paginate/' + this.offset + '/' + this.uidForPageinate)
              .then(response => {
                this.datas = response.data;                
              })
        }
    }
</script>
