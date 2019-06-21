<template>

    <div>
        <home-new-blog-component v-bind:token="token" @childListener="childListener"></home-new-blog-component>

        <home-blog-component :key="componentKey"></home-blog-component>
    </div>

</template>

<script>
    export default {        
        data() {
            return {
                token: this.apiToken,
                componentKey: 0,               
            }
        },
        props: [
            'apiToken'
        ],
        methods: {
            childListener: function(childReply) {
                console.log('listened');
                console.log(childReply);

                // if(childReply === 200) {
                    this.forceRerender();
                // }
            },
            forceRerender: function() {
                this.componentKey += 1;
            }
        }
        /*mounted() {
            axios
              .get('api/articles/')
              .then(response => (this.datas = response.data))
        }*/
    }
</script>
