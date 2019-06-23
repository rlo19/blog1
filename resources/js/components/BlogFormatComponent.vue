<template>
    <div class="container">
        <div class="row justify-content-center" v-if="show">            
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12">
                            Image                       
                        </div>
                        <div class="col-md-12">
                            <a :href="profileUrl">{{this.datas.name}}</a>                         
                        </div>
                        <div class="col-md-12">
                            {{this.datas.created_at}}                    
                        </div>  
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a :href="profileUrl + this.datas.aid">{{this.datas.title}}</a></div>

                    <div class="card-body">

                        {{this.datas.body}}

                    </div>
                </div>
            </div>    
            <div class="col-md-12"><br></div>                   
        </div>
        <div v-if="error">
            Error
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                datas: '',
                error: false,
                show: false,
                profileUrl: ''
            }
        },
        props: [
            'aid',
            'uid'
        ],
        mounted() {
            axios
              .get(window.location.origin + '/api/articles/single/' + this.uid + '/' + this.aid)
              .then(response => {
                this.datas = response.data;
                
                if(typeof this.datas.name === "undefined") {
                    this.show = false;
                    this.error = true;

                } else {
                    this.show = true;
                    this.error = false;

                    this.profileUrl = window.location.origin + '/profile/' + this.datas.id + '/';
                }
              })
        }
    }
</script>