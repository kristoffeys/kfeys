import axios from 'axios';

export const fetchPosts = function() {
    return axios.get('/api/posts');
};

export const fetchPostBySlug = function($slug) {
    return axios.get('/api/posts/' + $slug);
}

export const fetchCategory = function($slug) {
    return axios.get('/api/categories/' + $slug);
}
