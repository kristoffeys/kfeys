<template>
    <div id="app" class="container mx-auto">
        <header id="header" class="clearfix">
            <figure id="logo" class="h-16 py-2 float-left flex">
                <img src="./images/devface.svg" class="max-h-full flex-1" />
                <figcaption class="flex-1 py-2 px-4">
                    Kristof<br>
                    Feys
                </figcaption>
            </figure>
            <nav id="nav" class="float-right h-16 py-2">
                <ul class="flex list-reset">
                    <li class="flex-1 px-2 py-4 text-slate">
                        <router-link v-bind:to="'/'">overview</router-link>
                    </li>
                    <li v-for="item in navigation" class="flex-1 px-2 py-4">
                        <router-link v-bind:to="item.slug">{{ item.title }}</router-link>
                    </li>
                </ul>
            </nav>
        </header>

        <transition name="fade" mode="out-in">
            <router-view />
        </transition>
    </div>
</template>

<script>
    import { fetchNavigation } from './pages/repository.js';

    export default {
        name: 'kfeys',
        metaInfo: {
            title: 'Web Developer',
            titleTemplate: '%s | Kristof Feys'
        },
        created() {
            this.fetchNavigation();
        },
        data() {
            return {
                navigation: [],
            };
        },
        methods: {
            fetchNavigation() {
                fetchNavigation().then(this.onFetchComplete).catch(this.onFetchFailed);
            },
            onFetchComplete(response) {
                this.navigation = response.data;
            },
            onFetchFailed(error) {
                console.error(error);
            },
        }
    }
</script>
