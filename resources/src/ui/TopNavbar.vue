<template>
  <nav
    class="supports-backdrop-blur:bg-white/60 fixed top-0 z-40 w-full flex-none border-b navbarBgColor backdrop-blur transition-colors duration-500 dark:border-slate-50/[0.06] lg:z-50 lg:border-b lg:border-slate-900/10"
  >
    <div class="px-3 lg:px-5 lg:pl-3" id="nav-parent">
      <div class="flex md:flex-row flex-col  items-center justify-between">
        <div class="custom-size flex items-center justify-start order-last" id="top-navbar-left">
          <button
            v-if="userStore.user"
            id="toggleSidebar"
            aria-expanded="false"
            aria-controls="sidebar"
            class="mr-3 hidden cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:inline"
            @click="$emit('sidebar-toggle')"
          >
            <NewSvg
              :class="{ hidden: sidebarPc }"
              path1="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              path3=""
              fill1="currentColor"
              fill2=""
            />
            <NewSvg
              :class="{ hidden: !sidebarPc }"
              path1="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              path3=""
              fill1="currentColor"
              fill2=""
            />
          </button>
          <button
            id="toggleSidebarMobile"
            aria-expanded="false"
            aria-controls="sidebar"
            class="mr-2 cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700 dark:focus:ring-gray-700 lg:hidden"
            @click="$emit('sidebar-toggle-mobile')"
          >
            <NewSvg
              :class="{ hidden: sidebarMobile }"
              path1="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              path3=""
              fill1="currentColor"
              fill2=""
            />
            <NewSvg
              id="toggleSidebarMobileClose"
              :class="{ hidden: !sidebarMobile }"
              path1="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              path3=""
              fill1="currentColor"
              fill2=""
            />
          </button>
          <a href="/" class="if-sm mr-14 flex">
            <img
              :key="theme"
              :src="
                theme === 'light'
                  ? '/assets/HomePageLogo.png'
                  : '/assets/HomePageLogo.png'
              "
              class="mr-3 h-8"
            />
          </a>
        </div>
        <div v-if="userStore.user" class="flex items-center">
                    <a
            href="https://dex.altcryptogems.com" target="_blank"
            class="btn btn-outline-secondary"
          >
            {{ $t("DEX") }}
          </a>&nbsp&nbsp
          <a
            v-if="userStore.role == 1"
            href="/admin/dashboard"
            class="btn btn-outline-secondary if-md"
          >
            {{ $t("Admin") }}
          </a>
          <template v-if="ext.walletConnect === 1">
            <Login class="mx-3" />
          </template>
          <DarkMode @change-theme="changeTheme" />
          <ProfileDropdown :user-store="userStore" />
        </div>
        <div v-else class="flex items-center">
          
          <a style="margin-left: 10px;" href="/login">
                                                <div tabindex="0" style="text-shadow: transparent 0px 0px 0px; transform: none;">
                                                        <button class="cursor-pointer relative inline-flex items-center justify-center gap-1 disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-300 rounded-md h-10 px-4 py-2 [&amp;>span>.loader]:text-primary-500 border border-primary-500 text-primary-500 hover:bg-primary-500 active:enabled:bg-primary-400 hover:text-white inline-flex items-center gap-1 whitespace-nowrap text-center text-sm  undefined"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="h-5 w-5 me-1 iconify iconify--material-symbols-light" width="1em" height="1em" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="M11.98 20v-1h6.405q.23 0 .423-.192t.192-.424V5.616q0-.231-.192-.424T18.384 5h-6.403V4h6.404q.69 0 1.152.463T20 5.616v12.769q0 .69-.463 1.153T18.385 20zm-.71-4.461l-.703-.72l2.32-2.319H4v-1h8.887l-2.32-2.32l.702-.718L14.808 12z">
                                                                        </path>
                                                                </svg>Login</button>
                                                </div>
                                        </a>
          <DarkMode @change-theme="changeTheme" />
        </div> 
      </div>
    </div>
  </nav>
</template>

<script>
  import NewSvg from "@/partials/NewSvg.vue";
  import DarkMode from "./DarkMode.vue";
  import ProfileDropdown from "./ProfileDropdown.vue";
  import { defineAsyncComponent } from "vue";

  export default {
    name: "TopNavbar",
    components: {
      NewSvg,
      DarkMode,
      Login: defineAsyncComponent(() => import("./Login.vue")),
      ProfileDropdown,
    },
    props: {
      sidebarMobile: {
        type: Boolean,
        default: false,
      },
      sidebarPc: {
        type: Boolean,
        default: false,
      },
      userStore: {
        type: Object,
        default: null,
      },
    },
    emits: ["sidebar-toggle", "sidebar-toggle-mobile"],
    data() {
      return {
        theme: localStorage.getItem("color-theme"),
      };
    },
    methods: {
      changeTheme(val) {
        this.theme = val;
      },
    },
  };
</script>

<style scopped>
@media (min-width: 1024px) { 
  .custom-size{
    order: -1!important;
  }
 }
</style>
