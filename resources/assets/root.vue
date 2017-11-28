<template>
    <div id="app" class="container mx-auto">
        <header id="header" class="clearfix px-2 sm:px-0">
            <figure id="logo" class="h-16 py-2 float-left flex">
                <img src="./images/devface.svg" class="max-h-full flex-1" />
                <figcaption class="flex-1 py-2 px-4">
                    Kristof<br>
                    Feys
                </figcaption>
            </figure>
            <nav id="nav" class="md:float-right md:h-16 py-2">
                <div class="block md:hidden float-right py-2">
                    <button v-on:click="onNavigationPillClick" class="flex items-center px-3 py-2 border text-teal-lighter border-teal-light">
                        <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="clearfix"></div>
                <ul class="w-full list-reset md:flex md:w-auto text-center md:text-left md:block hidden" id="dropdown">
                    <li class="block md:flex-1 px-2 py-4 text-slate">
                        <router-link v-bind:to="'/'">overview</router-link>
                    </li>
                    <li v-for="item in navigation" class="block md:flex-1 px-2 py-4">
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
            onNavigationPillClick() {
                /*
                let el = document.getElementById('dropdown');
                if (el.style.display === 'block') {
                    el.style.display = 'none';
                } else {
                    el.style.display = 'block';
                }
                */
            },
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
