import { createRouter, createWebHistory } from "vue-router";

// Views
import Home from "../pages/Home";
import Setting from "../pages/Setting";
import Dashboard from "../pages/Dashboard";
import Login from "../pages/Login";
import PublicNOP from "../pages/PublicNOP";
import NOP from "../pages/NOP";
import ListSppt from "../pages/sppt/List";
import PembayaranSppt from "../pages/sppt/Pembayaran";
import KetetapanPajakDetail from "../pages/ketetapan/KetetapanPajakDetail"
import RekapKetetapan from "../pages/ketetapan/Rekap"
import TagihanPernop from "../pages/tagihan/Pernop"
import { HomeIcon, DocumentTextIcon, ReceiptPercentIcon, Cog6ToothIcon } from "@heroicons/vue/24/solid"
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
        path: "/nop",
        component: PublicNOP,
        name: "nop",
        meta: {
            title: "Nop",
            icon: HomeIcon,
            hide: true
        },
    },
    {
        path: "/web/dashboard",
        component: Dashboard,
        name: "dashboard",
        meta: {
            title: "Dashboard",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/web/sppt",
        component: Dashboard,
        name: "sppt",
        meta: {
            title: "SPPT",
            icon: DocumentTextIcon,
            hide: false
        },
    },
    {
        path: "/web/sppt/list",
        component: ListSppt,
        name: "sppt-list",
        meta: {
            title: "SPPT Yang Tersampaikan",
            parent: "sppt",
            icon: HomeIcon,
            hide: false
        },
    },
    {
        path: "/web/sppt/pembayaran",
        component: PembayaranSppt,
        name: "sppt-pembayaran",
        meta: {
            title: "Pembayaran",
            icon: HomeIcon,
            parent: "sppt",
            hide: false
        },
    },
    {
        path: "/web/tagihan",
        component: Dashboard,
        name: "tagihan",
        meta: {
            title: "Tagihan",
            icon: ReceiptPercentIcon,
            hide: true // hide
        },
    },
    {
        path: "/web/tagihan/pernop",
        component: TagihanPernop,
        name: "tagihan-pernop",
        meta: {
            title: "Tagihan PerNop",
            parent: "tagihan",
            icon: ReceiptPercentIcon,
            hide: false
        },
    },
    {
        path: "/web/ketetapan/list",
        component: KetetapanPajakDetail,
        name: "ketetapan",
        meta: {
            title: "Ketetapan",
            icon: DocumentTextIcon,
            hide: false
        },
    },
    {
        path: "/web/ketetapan/list",
        component: KetetapanPajakDetail,
        name: "ketetapan-list",
        meta: {
            title: "Ketetapan Pajak Detil",
            parent: "ketetapan",
            icon: DocumentTextIcon,
            hide: false
        },
    },
    {
        path: "/web/ketetapan/rekap",
        component: RekapKetetapan,
        name: "ketetapan-rekap",
        meta: {
            title: "Rekap Ketetapan",
            parent: "ketetapan",
            icon: DocumentTextIcon,
            hide: false
        },
    },
    {
        path: "/web/tunggakan",
        component: Dashboard,
        name: "tunggakan",
        meta: {
            title: "Tunggakan",
            icon: DocumentTextIcon,
            hide: true // hide
        },
    },
    {
        path: "/web/realisasi",
        component: Dashboard,
        name: "realisasi",
        meta: {
            title: "Realisasi",
            icon: DocumentTextIcon,
            hide: true // hide
        },
    },
    {
        path: "/web/nop",
        component: NOP,
        name: "data-nop",
        meta: {
            title: "Data NOP",
            icon: DocumentTextIcon,
            hide: false
        },
    },
    {
        path: "/web/setting",
        component: Setting,
        name: "setting",
        meta: {
            title: "Setting",
            icon: Cog6ToothIcon,
            hide: false
        },
    }
];

const router = createRouter({
    history,
    routes,
});

export default router;
