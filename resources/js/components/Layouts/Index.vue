<template>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col text-center">
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="original_url">
                    Enter URL
                </label>
                <input class="p-2 border rounded-md shadow-md w-60" id="original_url" type="text"
                       placeholder="Paste your URL"
                        v-model="original_url">
                <i @click="submit" class="fas fa-paper-plane cursor-pointer"></i>
            </div>
            <span class="text-red-500" v-if="errors.original_url">{{errors.original_url[0]}}</span>

<!--            <div class="flex items-center justify-between">-->
<!--                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="Submit">-->
<!--                    Submit-->
<!--                </button>-->

<!--            </div>-->

        </form>
        <section class="text-center flex justify-center">
            <table class="border rounded-md shadow-md">
                <thead>
                    <th>Original URL</th>
                    <th>Shorten URL</th>
                    <th>Created At</th>

                </thead>
                <tr v-for="item in items" :key="item.id" class="border">
                    <td class="p-2 border rounded-md ">{{item.original_url}}</td>
                    <td class="p-2 border rounded-md ">{{item.shorten_url}}</td>
                    <td class="p-2 border rounded-md ">{{item.created_at}}</td>
                </tr>
            </table>
        </section>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                original_url : "",
                errors:{},
                items: []
            };
        },
        mounted(){
            this.fetchData()
        },
        methods:{
            submit(){
                if(this.original_url == '') return;
                axios.post("/api/url",{original_url : this.original_url}).then(response => {
                    console.log(response)
                    this.original_url = '';
                    this.items.push(response.data);
                }).catch(e => {
                    this.errors = e.response.data.errors
                    console.log(e.response)
                })
            },
            fetchData(){
                axios.get("/api/url").then(response => {
                    console.log(response);
                    this.items = response.data;
                }).catch(e => {
                    // this.errors = e.response.data.errors
                    // console.log(e.response)
                })
            }
        }
    }
</script>

<style scoped>

</style>