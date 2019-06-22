<template>
    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12">
                            Image                       
                        </div>
                        <div class="col-md-12">
                            {{this.datas.name}}                     
                        </div>
                        <div class="col-md-12">
                            {{this.datas.created_at}}                    
                        </div>  
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{this.datas.title}}</div>

                    <div class="card-body">

                        {{this.datas.body}}

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
                datas: ''
            }
        },
        props: [
            'id'
        ],
        mounted() {
            axios
              .get('api/articles/' + this.id)
              .then(response => {
                this.datas = response.data;
              })
        }
    }
</script>