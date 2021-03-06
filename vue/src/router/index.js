import {createRouter, createWebHashHistory, createWebHistory} from "vue-router";
import Campaign from '../views/Campaign.vue';
import AdminLogin from '../views/AdminLogin.vue';
import VoterLogin from '../views/VoterLogin.vue';
import Dashboard from '../views/webm/Dashboard.vue';
import Votes from '../views/webm/Votes.vue';
import RegVoter from '../views/webm/MngVoter.vue';
import CreateElec from '../views/webm/CreateElec.vue';
import MngCandidates from '../views/webm/MngCandidates.vue';
import Colleges from '../views/webm/Colleges.vue';
import UpdtMasterList from '../views/webm/UpdtMasterList.vue';
import MngPosition from "../views/webm/MngPosition.vue";
import MngPartylist from "../views/webm/MngPartylist.vue";
import DashboardLayout from '../components/DashboardLayout.vue';
import NotFound from '../views/NotFound.vue';
import store from '../store';
import PasswordMaker from '../components/LaravelPasswordMaker.vue';
import VoterCreate from "../views/VoterCreate.vue";
import VoterDashboardLayout from "../components/voterLayout/VoterDashboardLayout.vue";
import VoterIndex from "../views/voter/voterUtility/VoterIndex.vue";
import VoterLeaderboardTally from "../views/voter/voterUtility/VoterLeaderboardTally.vue";
import TestPlugin from '../views/webm/TestPlugin.vue'


const routes = [
  {
    path: '/testplugin',
    name: 'TestPlugin',
    component: TestPlugin
  },{
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
    path: '/',
    redirect: '/webm/dashboard',
    component: DashboardLayout,
    meta: {
      requiresAuthAdmin: true
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
        name: 'MngCandidates',
        component: MngCandidates
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
      {
        path: '/voter/create_acct',
        name: 'VoterCreate',
        component: VoterCreate,
      },
    ]
  },
  {
    path: '/password_maker/only/for/admin/ui',
    name: 'PasswordMaker',
    component: PasswordMaker
  },
  {
    path: '/voter/create_acct',
    name: 'VoterCreate',
    component: VoterCreate
  },
  {
    path: '/voter',
    redirect: '/voter/voter_index',
    component: VoterDashboardLayout,
    meta: {
      requiresAuthVoter: true
    },
    children: [{
      path: '/voter/voter_index',
      name: 'VoterIndex',
      component: VoterIndex
    },
      {
      path: '/voter/voter_leaderboard',
      name: 'VoterLeaderboardTally',
      component: VoterLeaderboardTally
    }],
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  //admin
  if (to.meta.requiresAuthAdmin && !store.state.a.user.token) {
    next({name: 'AdminLogin'});
  } else if (to.meta.requiresAuthVoter && !store.state.b.user.token) {
    next({name: 'VoterLogin'});
  } else if (store.state.b.user.token && (to.name === 'VoterLogin')) {
    next({name: 'VoterIndex'});
  } else if (store.state.a.user.token && (to.name === 'AdminLogin')) {
    next({name: 'Dashboard'});
  } else {
    next();
  }
})

export default router;
