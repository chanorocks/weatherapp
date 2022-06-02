import { createWebHistory, createRouter } from 'vue-router';
import HomePage from './components/HomePage.vue'
import ViewPage from './components/ViewPage.vue'

const routes = [
	{
		name: 'HomePage',
		path: '/',
		component: HomePage
	},
	{
		name: 'ViewPage',
		path: '/venues/:city',
		component: ViewPage
	}
];

const router=createRouter({
	history: createWebHistory(),
	routes
});
export default router;