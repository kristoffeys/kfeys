<template>
    <div slot="content">
        <header>
            <h2>Blog</h2>
            <p>A generic page for every non-generic situation.</p>
        </header>
        <div class="blogposts box">
            <h1>Blog list</h1>
            <ul>
                <li v-for="post in posts">
                    {{ post.image }}
                    <h2><router-link :to="{ name: 'post', params: { slug: post.slug }}">{{ post.title }}</router-link></h2>
                    <p> {{post.excerpt }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import { fetchPosts } from './repository.js';

    export default {
        created() {
            this.fetchPosts();
        },
        data() {
            return {
                posts: [],
            };
        },
        head: {
            title: { inner: 'Blogpost overview' },
            meta: function() {
                return [
                    {name: 'description', content: ''}
                ]
            }
        },
        methods: {
            fetchPosts() {
                fetchPosts().then(this.onFetchComplete).catch(this.onFetchFailed);
            },
            onFetchComplete(response) {
                this.posts = response.data;
            },
            onFetchFailed(error) {
                console.error(error);
            },
        },
    };
</script>
