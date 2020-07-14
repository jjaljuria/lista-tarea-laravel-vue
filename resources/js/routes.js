import AppLista from './components/AppLista.vue';
import AppPomodoro from './components/Sobre.vue';

const routes = [{
	path: '/', component: AppLista
},
	{
	path:'/pomodoro', component: AppPomodoro
}]

export default routes