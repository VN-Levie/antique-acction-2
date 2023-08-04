<template>
    <div class="bg-white">
        <nav class="container px-5 py- mx-auto md:flex md:justify-between md:items-center">
            <!--LoGO NAV BAR-->
            <div class="flex items-center justify-between flex-col">
                <Link :href="route('home')">
                <img src="/img/mt-1804-home-logo.png" />
                </Link>

                <!-- Mobile menu button -->
                <div @click="toggleNav" class="flex md:hidden mt-3">
                    <button type="button" class="text-gray-100 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 md:mt-20 fill-current bg-black hover:after:bg-yellow-300">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <ul :class="showMenu ? 'flex' : 'hidden'"
                class="border-after flex-col mt-8 space-y-4 md:flex md:space-y-0 flex-algight-end md:flex-row md:space-x-10 md:mt-0 cursor-pointer"
                style="align-items: center">
                <li v-for="(navigation, index) in navigations" :key="index" class="text-black-100">
                    <Link v-if="!navigation.children" :href="navigation.href"
                        class="navbar-text cool-link ul-letter-spaceing py-2 pr-4 pl-3 text-uppercase"
                        :aria-current="navigation.isCurrent ? 'page' : null">
                    {{ navigation.name }}
                    </Link>
                    <button v-else @click="toggleDropdown(index)"
                        class="cool-link navbar-text ul-letter-spaceing py-2 pr-4 pl-3" aria-haspopup="true"
                        :aria-expanded="isOpenDropdown(index) ? 'true' : 'false'">
                        {{ navigation.name }}
                    </button>
                    <!-- Dropdown menu -->
                </li>
                <!--   -->
                <div @mouseenter="accountAndListFunc(true)" @mouseleave="accountAndListFunc(false)"
                    class="border-after mt-8 space-x-5 space-y-0 md:flex md:space-y-0 md:mt-0 cursor-pointer">
                    <div>
                        <div class="text-[12px]">
                            <i class="fa fa-fw fa-user"></i>
                            Hello,
                            <span v-if="$page.props.auth.user" class="text-[10px] font-extrabold">{{
                                $page.props.auth.user.name
                            }}</span>
                            <span class="text-[12px] font-extrabold" v-else>sign in</span>
                        </div>
                        <div class="flex items-center">
                            <div class="text-[15px]">
                                Account & List
                                <i class="fa fa-caret-down text-gray-400" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div v-if="accountAndList"
                        class="bg-white md:mt-10 border-after absolute border-[2px] hover:drop-shadow-sm border-gray-600 shadow-sm top-[70px]  rounded-sm px-6 box-media">
                        <div v-if="$page.props.auth.user">
                            <div class="flex items-center justify-between py-2.5 text-media">

                            </div>
                            <div class=" flex-col md:flex-row">
                                <div class="w-full md:w-1/2 ">
                                    <div class="pb-3">

                                        <Link :href="route('logout')" method="post" as="button"
                                            class="btn btn-primary text-sm hover:text-red-600 hover:underline">SignOut
                                        </Link>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <div v-else>

                        </div>
                    </div>
                </div>
                <div class="border-after mt-8 space-x-5 space-y-0 md:flex md:space-y-0 md:mt-0 cursor-pointer">
                    <div>
                        <div class="text-[12px]">
                            <i class="fa fa-shopping-cart text-[20]" aria-hidden="true"></i>
                            Return
                        </div>
                        <div class="flex items-center">
                            <div class="text-[15px]">
                                &Order
                                <i class="fa fa-caret-down text-gray-400" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Social Media-->
                <div class="border-after mt-8 space-x-5 space-y-0 md:flex md:space-y-0 md:mt-0 cursor-pointer">
                    <a href="#" class="cool-link navbar-text" target="_self">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="cool-link navbar-text" target="_self">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="cool-link navbar-text" target="_self">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="cool-link navbar-text">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </ul>
        </nav>
    </div>
</template>
<script>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
export default {
    setup() {
        const navigations = [
            {
                name: "Home",
                href: "/",
                children: null,
            },
            {
                name: "Profile",
                href: "/profile",
                children: null,
            },
            {
                name: "Address",
                href: "/profile/address ",
                children: null,
            },
            {
                name: "My Oder",
                href: "/profile/oder",
                children: null,
            },
            {
                name: "Shipping",
                href: "/shipping",
                children: null,
            },

            // Add more navigation items as needed
        ];
        const dropdownStates = ref({});
        const isOpenDropdown = (index) => {
            return dropdownStates.value[index] || false;
        };
        const toggleDropdown = (index) => {
            dropdownStates.value[index] = !dropdownStates.value[index];
        };
        const setScrollBg = (value) => {
            scrollBg.value = value;
        };
        let showMenu = ref(false);
        let accountAndList = ref(false);

        const accountAndListFunc = (bool) => {
            setTimeout(() => {
                accountAndList.value = bool;
            }, 150);
        };

        const toggleNav = () => (showMenu.value = !showMenu.value);
        return {
            showMenu,
            toggleNav,
            navigations,
            isOpenDropdown,
            toggleDropdown,
            setScrollBg,
            dropdownStates,
            accountAndList,
            accountAndListFunc,
        };
    },
    components: {
        Link,
    },
};
</script>
<style >
.cool-link {
    display: inline-block;
    color: #000;
    text-decoration: none;
}

.cool-link::after {
    content: "";
    display: block;
    width: 0;
    height: 2px;
    font-size: 0.85rem;
    background: #f3c95c;
    transition: width 0.1s;
}

.text-sm1:hover {
    font-size: 0.7rem;
    transition: width 1000s;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.cool-link:hover::after {
    width: 100%;
}

.border-after::after {
    border-width: 4px;
    --tw-border-opacity: 1;
    border-color: rgb(14 165 233 / var(--tw-border-opacity));
}

.ul-letter-spaceing {
    letter-spacing: 2.6px;
}

.navbar-text {
    font-size: 80%;
    font-family: "Raleway", sans-serif;
    font-weight: 700;
    font-style: normal;
    color: #292929;
    text-decoration: none;
    border-color: transparent;
}

.flex-algight-end {
    align-items: flex-end;
}

@media (max-width: 480px) {
    .box-media {
        margin-left: -80px;
        margin-top: -30px;
        width: 70%;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .text-media {
        display: flex;
        flex-direction: column-reverse;
    }
}
</style>
  