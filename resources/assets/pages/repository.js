import axios from 'axios';

export const fetchNavigation = function() {
    return axios.get('/api/navigation');
};
