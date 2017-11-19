<template>
    <div slot="content">
        <header>
            <h2>{{ post.title }}</h2>
            <p>A generic page for every non-generic situation.</p>
        </header>
    </div>
</template>

<script>
    import { fetchPageBySlug } from './repository.js';

    export default {
        created() {
            this.fetchPageBySlug(this.$route.params.slug);
        },
        beforeRouteUpdate (to, from, next) {
            this.fetchPageBySlug(to.params.slug);
            next();
        },
        data() {
            return {
                post: [],
            };
        },
        head: {
            title: function() {
                return {
                    inner: this.page.title || 'Blogpost'
                }
            },
            meta: function() {
                return [
                    {name: 'description', content: this.page.excerpt || ''}
                ]
            }
        },
        methods: {
            fetchPageBySlug(slug) {
                fetchPageBySlug(slug).then(this.onFetchComplete).catch(this.onFetchFailed);
            },
            onFetchComplete(response) {
                this.page = response.data;
                this.$emit('updateHead');
            },
            onFetchFailed(error) {
                console.error(error);
            },
        },
    };
</script>
