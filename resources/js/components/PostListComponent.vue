<template>
    <div class="container">
        <div class="row">
            <h2 class="col-12 mt-4 text-center">Blog de pruebas</h2>

            <div v-for="post in posts" class="col-12 my-3">
                <h4>
                    <a :href="show_post_url.replace('#ID#', post.id)" :title="post.title">{{ post.title }}</a>
                </h4>
                <div>{{ post.body }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        get_posts_url: String,
        show_post_url: String
    },
    data() {
        return {
            posts: []
        }
    },
    methods: {

    },
    mounted() {
        axios.get(this.get_posts_url)
            .then(response => {
                this.posts = response.data;
            })
            .catch(error => {
                console.log("Error: " + error);
            });
    }
}
</script>
