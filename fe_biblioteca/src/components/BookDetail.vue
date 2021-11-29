<template>
    <div>
        <div class="flex-row ml-10">
            <button @click="$router.go(-1)" class="bg-white px-2 py-2 rounded-md mt-10">
                Indietro
            </button>
        </div>
        <div class="flex-row text-yellow-500 text-3xl font-bold ml-10 mb-5 mt-5">
            <span> {{book.title}} </span>
        </div>
        <div class="flex flex-row ml-10">
            <div class="flex-col">
                <div class="flex-row">
                    <img :src="book.cover">
                </div>
                <div class="flex flex-row justify-between mt-5">
                    <div class='flex-col'>
                            <button class='text-white font-bold bg-pink-600 rounded-md py-1 px-2' @click='updateBook()'>MODIFICA</button>
                        </div>
                    <div class='flex-col'>
                            <button class='text-white font-bold bg-red-600 rounded-md py-1 px-2' @click='confcanc()'>CANCELLA</button>
                    </div>
                </div>
                <div class='flex flex-row justify-center mt-5 pb-5' v-if='conf==true'>
                    <div class='flex-col bg-white px-2 py-1'>
                        <p class='flex flex-row justify-center'>Sicuro di voler cancellare ?</p>
                        <button class='flex flex-row justify-center bg-black text-white px-2 py-1 mt-2' @click='deleteBook(),$router.go(-1)'>CANCELLA</button>
                    </div>
                </div>
            </div>
            <div class='flex-col ml-5'>
                    <div class='flex-row text-black text-xl'>
                        <span class='font-bold text-yellow-500'>AUTORE:<br></span> 
                        {{book.author}}
                    </div>
                    <div class='flex-row text-black text-xl mt-5'>
                        <span class='font-bold text-yellow-500'>GENERE:<br></span> 
                        {{book.genre}}
                    </div>
                    <div class='flex-row text-black text-xl mt-5'>
                        <span class='font-bold text-yellow-500'>ISBN:<br></span> 
                        {{book.isbn}}
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
            id:null,
            book:null,
            conf:false
        }
    },
    async mounted(){
        this.id = this.$route.params.id;
        let response = await axios.get("http://localhost:8000/api/detail/"+this.id);
        this.book = response.data;
    },
    methods:{
        confcanc(){
            this.conf = true;
        },

        async deleteBook(){
            this.id = this.$route.params.id;
            await axios.delete("http://localhost:8000/api/delete/"+this.id);
            //aggiornare la pagina per vedere i risultati
        },
        
        updateBook(){

        }
    }
}
</script>