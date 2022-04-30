import {createRouter, createWebHashHistory, createWebHistory} from "vue-router";
import Campaign from '../views/Campaign.vue';
import AdminLogin from '../views/AdminLogin.vue';
import VoterLogin from '../views/VoterLogin.vue';
import mainOTP from '../views/mainOTP.vue';
import Dashboard from '../views/webm/Dashboard.vue';
import Votes from '../views/webm/Votes.vue';
import RegVoter from '../views/webm/MngVoter.vue';
import CreateElec from '../views/webm/CreateElec.vue';
import Candidates from '../views/webm/MngCandidates.vue';
import Colleges from '../views/webm/Colleges.vue';
import UpdtMasterList from '../views/webm/UpdtMasterList.vue';
import MngPosition from "../views/webm/MngPosition.vue";
import MngPartylist from "../views/webm/MngPartylist.vue";
import VoterView from '../views/voter/VoterView.vue';
import DashboardLayout from '../components/DashboardLayout.vue';
import NotFound from '../views/NotFound.vue';
import store from '../store';
import PasswordMaker from '../components/LaravelPasswordMaker.vue';


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
    path: '/voter_login',
    name: 'VoterLogin',
    component: VoterLogin
  },
  {
    path: '/admin_login',
    name: 'AdminLogin',
    component: AdminLogin
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
      requiresAuth: true
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
      },
      {
        path: '/webm/mng_position',
        name: 'MngPosition',
        component: MngPosition
      },
      {
        path: '/webm/mng_partylist',
        name: 'MngPartylist',
        component: MngPartylist
      },
    ]
  },
  {
    path: '/voter/voter_view',
    name: 'VoterView',
    component: VoterView
  },
  {
    path: '/password_maker/only/for/admin/ui',
    name: 'PasswordMaker',
    component: PasswordMaker
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next)=>{
  //admin
  if(to.meta.requiresAuth && !store.state.a.user.token){
    next({name: 'AdminLogin'});
  } else if(store.state.a.user.token && (to.name === 'AdminLogin')) {
    next({name: 'Dashboard'});
  } else {
    next();
  }
})

export default router;
