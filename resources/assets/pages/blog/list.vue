<template>
    <div>
        <header class="text-center py-8 my-4">
            <h1 class="leading-loose">Blog</h1>
            <p>A generic page for every non-generic situation.</p>
        </header>
        <div>
            <article v-for="post in posts" class="flex flex-wrap py-8">
                <figure class="w-1/3">
                    <img :src="'/'+post.image" :alt="post.title" class="max-h-full h-auto w-full" />
                </figure>
                <summary class="w-2/3 pl-4">
                    <h2><router-link :to="{ name: 'post', params: { slug: post.slug }}">{{ post.title }}</router-link></h2>
                    <p> {{post.excerpt }}</p>
                </summary>
            </article>
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
