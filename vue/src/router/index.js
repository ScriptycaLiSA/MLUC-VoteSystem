import {createRouter, createWebHistory} from "vue-router";
import Campaign from '../views/Campaign.vue';
import Login from '../views/Login.vue';
import mainOTP from '../views/mainOTP.vue';
import Dashboard from '../views/webm/Dashboard.vue';
import Votes from '../views/webm/Votes.vue';
import RegVoter from '../views/webm/RegVoter.vue';
import CreateElec from '../views/webm/CreateElec.vue';
import Candidates from '../views/webm/Candidates.vue';
import Colleges from '../views/webm/Colleges.vue';
import UpdtMasterList from '../views/webm/UpdtMasterList.vue';
import VoterView from '../views/voter/VoterView.vue';
import DashboardLayout from '../components/DashboardLayout.vue';
import NotFound from '../views/NotFound.vue';
import store from '../store';


const routes = [
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound
  },
  {
    path: '/campaign',
    name: 'Campaign',
    component: Campaign
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/login/otp',
    name: 'mainOTP',
    component: mainOTP
  },
  {
    path: '/',
    redirect: '/webm/dashboard',
    component: DashboardLayout,
    meta: {
      requiresAuth: false
    },
    children: [{
        path: '/webm/dashboard',
        name: 'Dashboard',
        component: Dashboard
      },
      {
        path: '/webm/votes',
        name: 'Votes',
        component: Votes
      },
      {
        path: '/webm/regvoter',
        name: 'RegVoter',
        component: RegVoter
      },
      {
        path: '/webm/crt_elec',
        name: 'CreateElec',
        component: CreateElec
      },

      {
        path: '/webm/candidates',
        name: 'Candidates',
        component: Candidates
      },
      {
        path: '/webm/colleges',
        name: 'Colleges',
        component: Colleges
      },
      {
        path: '/webm/mstr_updt',
        name: 'UpdtMasterList',
        component: UpdtMasterList
      }]
  },
  {
    path: '/voter/voter_view',
    name: 'VoterView',
    component: VoterView
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next)=>{
  if(to.meta.requiresAuth && !store.state.user.token){
    next({name: 'Login'})
  } else if(store.state.user.token && (to.name === 'Login')) {
    next({name: 'Dashboard'});
  } else {
    next();
  }
})

export default router;
