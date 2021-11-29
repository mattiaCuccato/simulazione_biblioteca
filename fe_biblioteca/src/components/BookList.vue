<template>
    <div class="ml-24">
        <h1 class='flex flex-row text-yellow-600 text-3xl font-bold pt-5'>
            My book's list!
        </h1>
        <div class='grid grid-cols-5 gap-5 mr-10 ml-10 mt-10'>
            <div v-for="(book,index) in books" :key="index" class='relative'>
                <div v-if="index <= 4">
                    <img :src="book.cover" class='cursor-pointer hover:opacity-40' @click='detailBook(book)'>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            books: []
        }
    },
    async mounted(){
        let listBook = await axios.get("http://localhost:8000/api/list",this.books);
        this.books = listBook.data;
    },
    methods:{
        detailBook(book){
            this.$router.push('/detail/'+book.id);
        }
    }
}
</script>