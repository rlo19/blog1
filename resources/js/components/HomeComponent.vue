<template>

    <div>
        <home-new-blog-component v-bind:uid="uid"></home-new-blog-component>

        <home-blog-component v-bind:parentOffset="offset" v-for="n in range" :key="n"></home-blog-component>
    </div>

</template>

<script>
    export default {        
        data() {
            return {
                offset: 0,                
                bottom: false,
                range: 1               
            }
        },
        props: [
            'uid'
        ],
        watch: {
            bottom: function() {
                console.log('balik bottom');
                this.bottom = false;
                console.log('false na ulit');
                this.debouncedBottom();
            }
        },
        created: function() {
            this.debouncedBottom = _.debounce(this.addArticles, 500);
        },
        methods: {
            scroll () {
              window.onscroll = () => {
                let bottomOfWindow = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop) + window.innerHeight === document.documentElement.offsetHeight

                if (bottomOfWindow) {
                 this.bottom = true; 
                 console.log('bottom');
                }
              }
            },
            addArticles: function() {

                const limit = 5;

                axios
                  .get('api/articles/paginate/' + this.offset + '/')
                  .then(response => {
                    this.datas = response.data;
                    this.offset += limit;
                    this.range += 1;
                  })                
            }
        },
        mounted() {
            this.scroll();
        }
    }
</script>
