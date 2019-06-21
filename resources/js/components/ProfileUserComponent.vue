<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">

                        <div class="col-md-12">
                            Name: {{ data.name }}                      
                        </div>
                        <div class="col-md-12">
                            Email: {{ data.email }}                    
                        </div>                    
                    </div>
                </div>
            </div>            
        </div>
    </div>
</template>

<script>
    export default {        
        data() {
            return {
                data: ''                
            }
        },
        props: [
            'userId',
            'apiToken'
        ],
        mounted() {

            const auth = {
                headers: {'Authorization': 'Bearer ' + this.apiToken} 
            }

            axios
              .get('api/users/' + this.userId, auth)
              .then(response => {
                this.data = response.data;                
              })
        }
    }
</script>
