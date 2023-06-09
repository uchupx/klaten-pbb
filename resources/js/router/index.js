import { createRouter, createWebHistory } from "vue-router";

// Views
import Home from "../pages/Home";
import Posts from "../pages/Posts";
import Dashboard from "../pages/Dashboard";
import Login from "../pages/Login";
import { HomeIcon } from "@heroicons/vue/24/solid"
// WebHistory
const history = createWebHistory();

const routes = [
    {
        path: "/login",
        component: Login,
        name: "login",
        meta: {
            title: "Login",
            icon: HomeIcon,
            hide: true
        },
    },
    {
        path: "/dashboard",
        component: Dashboard,
        name: "dashboard",
        meta: {
            title: "Dashboard",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/sppt",
        component: Dashboard,
        name: "sppt",
        meta: {
            title: "SPPT",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/tagihan",
        component: Dashboard,
        name: "tagihan",
        meta: {
            title: "Tagihan PerNop",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/ketetapan",
        component: Dashboard,
        name: "ketetapan",
        meta: {
            title: "Ketetapan",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/tunggakan",
        component: Dashboard,
        name: "tunggakan",
        meta: {
            title: "Tunggakan",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/realisasi",
        component: Dashboard,
        name: "realisasi",
        meta: {
            title: "Realisasi",
            icon: HomeIcon,
            hide: false
        },
    }, 
    {
        path: "/setting",
        component: Dashboard,
        name: "setting",
        meta: {
            title: "Setting",
            icon: HomeIcon,
            hide: false
        },
    },
];

const router = createRouter({
    history,
    routes,
});

export default router;
