<template>
    <div class='flex flex-row py-5 pl-5 bg-blue-500'>
        <!-- :class="{'bg-yellow-200':link.code == currentRouteName,'bg-white':link.code != currentRouteName}" -->
        <div v-for='link in Links' :key='link.code' 
            @click='goTo(link)' class='flex-col mr-8 cursor-pointer px-3 py-2 hover:bg-yellow-200 rounded-md font-bold'>
            {{ link.label }}
        </div>
    </div>
</template>

<script>
export default {
    name:'Navigation',
    data(){
        return{
            Links:[
                {
                    code:"books_list",
                    label:"Home"
                },
                {
                    code:"insert_book",
                    label:"New Book"
                },
            ]
        }
    },
    methods:{
        goTo(link){
            this.$router.push({
                name: link.code,
            });
        }
    },
    computed:{
        currentRouteName(){
            return this.$route.matched[0].name;
        }
    }
}
</script>