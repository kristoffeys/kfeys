import axios from 'axios';

export const fetchPageBySlug = function($slug) {
    return axios.get('/api/pages/' + $slug);
}
