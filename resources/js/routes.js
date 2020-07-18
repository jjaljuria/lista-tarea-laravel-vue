import AppLista from './AppLista/components/AppLista.vue';
import AppPomodoro from './AppLista/components/Sobre.vue';

const routes = [{
	path: '/', component: AppLista
},
{
	path: '/pomodoro', component: AppPomodoro
},
{
	path: '/*', component: AppLista
}]

export default routes