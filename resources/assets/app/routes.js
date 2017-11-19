import pageComponent from '../pages/page/single';
import blogComponent from '../pages/blog/list';
import postComponent from '../pages/blog/single';
import categoryComponent from '../pages/blog/category';

export default [
    {
        name: 'page',
        path: '/:slug',
        component: pageComponent,
    },
    {
        name: 'blog',
        path: '/',
        component: blogComponent,
    },
    {
        name: 'post',
        path: '/posts/:slug',
        component: postComponent,
    },

    {
        name: 'category',
        path: '/category/:slug',
        component: categoryComponent,
    },
];
