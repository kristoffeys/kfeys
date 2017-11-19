<template>
    <div id="app">
        <header id="header" class="alt main-navigation">
            <h1><a href="index.html">Alpha</a> by HTML5 UP</h1>
            <nav id="nav">
                <ul>
                    <li>
                        <router-link v-bind:to="'/'">overview</router-link>
                    </li>
                    <li v-for="item in navigation">
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
