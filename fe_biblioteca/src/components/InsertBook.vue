<template>
    <div>
        <h1 class='flex flex-row justify-center text-yellow-600 text-3xl font-bold pt-5'>
            Insert your book
        </h1>
        <div class="flex">
            <div class="flex-col">
                <div v-for="(field) in forms" :key="field.code">
                    <label>
                        {{field.label}}
                    </label>
                    <div v-if="field.type == 'text'">
                        <input type="text" :name="field.code" v-model="newBook[field.code]">
                    </div>
                    <div v-if="field.type == 'select'">
                        <select :name="field.code" v-model="newBook[field.code]">
                            <option v-for="opt in field.options" :key="opt.value" :value="opt.value">
                                {{opt.label}}
                            </option>
                        </select>
                    </div>
                    <div v-if="field.type == 'number'">
                        <input type="number" min="1" max="5" :name="field.code" v-model="newBook[field.code]">
                    </div>
                    <div class='text-red-500' v-if="!newBook[field.code]">
                        Campo obbligatorio
                    </div>
                </div>
                <div class="flex flex-row">
                    <button @click="saveBook(newBook)" :disabled="!isFormComplete" class="bg-white hover:bg-yellow-200 cursor-pointer px-3 py-2 rounded-md"> Save </button>
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
            newBook:{
                title:"",
                author:"",
                isbn:"",
                cover:"",
                genre:"",
                raiting:0
            },
            forms:[
                {
                    code:"title",
                    label:"Title",
                    type:"text",
                    required:true
                },
                {
                    code:"author",
                    label:"Author",
                    type:"text",
                    required:true
                },
                {
                    code:"isbn",
                    label:"Isbn",
                    type:"text",
                    required:true
                },
                {
                    code:"cover",
                    label:"Cover",
                    type:"text",
                    required:true
                },
                {
                    code:"genre",
                    label:"Genre",
                    type:"select",
                    options:[
                        {
                            value:"Fantascienza",
                            label:"Fantascienza"
                        },
                        {
                            value:"Avventura",
                            label:"Avventura"
                        },
                        {
                            value:"Giallo",
                            label:"Giallo"
                        },
                        {
                            value:"Thriller",
                            label:"Thriller"
                        },
                        {
                            value:"Drammatico",
                            label:"Drammatico"
                        },
                    ],
                    required:true
                },
                {
                    code:"raiting",
                    label:"Raiting",
                    type:"number",
                    required:true
                }
            ]
        }
    },
    async mounted(){

    },
    methods:{
        async saveBook(){
            let response = await axios.post("http://localhost:8000/api/insert",this.newBook);
            this.newBook = response.data;
            this.$router.push('/list');
        }
    },
    computed:{
        isFormComplete(){
            let form = true;
            this.forms.forEach(field => {
                if (field.required) {
                    form = form && !!this.newBook[field.code];
                }
            });
            return form;
        }
    }
}
</script>