<template>
    <div slot="content">
        <header>
            <h2>{{ category.title }}</h2>
            <p>A category.</p>
        </header>

        <article v-for="post in category.posts" class="flex flex-wrap py-8">
            <figure class="w-1/3">
                <img :src="'/'+post.image" :alt="post.title" class="max-h-full h-auto w-full" />
            </figure>
            <summary class="w-2/3 pl-4">
                <h2><router-link :to="{ name: 'post', params: { slug: post.slug }}">{{ post.title }}</router-link></h2>
                <p> {{post.excerpt }}</p>
            </summary>
        </article>
    </div>
</template>

<script>
    import { fetchCategory } from './repository.js';

    export default {
        created() {
          this.fetchCategory(this.$route.params.slug);
        },
        beforeRouteUpdate (to, from, next) {
            this.fetchCategory(to.params.slug);
            next();
        },
        data() {
            return {
                category: [],
            };
        },
        head: {
            title: function() {
                return {
                    inner: this.category.title || 'Blogpost'
                }
            },
            meta: function() {
                return [
                    {name: 'description', content: this.category.excerpt || ''}
                ]
            }
        },
        methods: {
            fetchCategory(slug) {
                fetchCategory(slug).then(this.onFetchComplete).catch(this.onFetchFailed);
            },
            onFetchComplete(response) {
                this.category = response.data;
                this.$emit('updateHead');
            },
            onFetchFailed(error) {
                console.error(error);
            },
        },
    };
</script>
