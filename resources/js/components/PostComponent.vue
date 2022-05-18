<template>
    <div class="container">
        <div class="row">
            <h2 class="col-12 mt-4">{{ post.title }}</h2>

            <div class="col-12 my-2">
                <div>{{ post.body }}</div>
            </div>

            <div class="col-12 my-2">
                <div class="font-weight-bold">Ficha del autor</div>
                <div>
                    <span class="text-decoration-underline">Nombre:</span>&nbsp;
                    {{ post.author.name }}
                </div>
                <div>
                    <span class="text-decoration-underline">Email:</span>&nbsp;
                    {{ post.author.email }}
                </div>
                <div>
                    <span class="text-decoration-underline">Site:</span>&nbsp;
                    {{ post.author.website }}
                </div>
            </div>

            <div class="col-12 my-2">
                <a :href="back_url" title="Volver">Volver</a>
            </div>

        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        get_post_url: String,
        back_url: String
    },
    data() {
        return {
            post: null
        }
    },
    methods: {

    },
    mounted() {
        axios.get(this.get_post_url)
            .then(response => {
                this.post = response.data;
            })
            .catch(error => {
                console.log("Error: " + error);
            });
    }
}
</script>
