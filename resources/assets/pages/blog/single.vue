<template>
    <div slot="content">
        <header>
            <h2>{{ post.title }}</h2>
        </header>
        <article v-html="post.body"></article>
    </div>
</template>

<script>
    import { fetchPostBySlug } from './repository.js';

    export default {
        created() {
            this.fetchPostBySlug();
        },
        data() {
            return {
                post: [],
            };
        },
        head: {
            title: function() {
                return {
                    inner: this.post.title || 'Blogpost'
                }
            },
            meta: function() {
                return [
                    {name: 'description', content: this.post.excerpt || ''}
                ]
            }
        },
        methods: {
            fetchPostBySlug() {
                fetchPostBySlug(this.$route.params.slug).then(this.onFetchComplete).catch(this.onFetchFailed);
            },
            onFetchComplete(response) {
                this.post = response.data;
                this.$emit('updateHead');
            },
            onFetchFailed(error) {
                console.error(error);
            },
        },
    };
</script>
