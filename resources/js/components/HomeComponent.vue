<template>

    <div>
        <home-new-blog-component v-bind:uid="uid"></home-new-blog-component>

        <blog-component v-bind:parentOffset="offset" v-for="n in range" :key="n"></blog-component>
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

                this.bottom = false;

                this.debouncedBottom();
            }
        },
        created: function() {
            this.debouncedBottom = _.debounce(this.addArticles, 500);
        },
        methods: {
            scroll: function() {
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

                this.offset += limit;
                this.range += 1;           
            }
        },
        mounted() {
            this.scroll();
        }
    }
</script>
