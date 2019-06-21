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
                            {{data.name}}                     
                            
                        </div>
                        <div class="col-md-12">
                            {{data.created_at}}                    
                        </div>  
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{data.title}}</div>

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
                datas: null                
            }
        },
        props: [
            'userId'
        ],
        mounted() {
            axios
              .get('api/articles-by-user/' + this.userId)
              .then(response => (this.datas = response.data))
        }
    }
</script>
