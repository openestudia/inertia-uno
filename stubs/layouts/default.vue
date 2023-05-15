<template>
  <div>
    <header class="flex items-center justify-between p-5 mb-10 bg-rose-600 text-white">
      <div>
        <a aria-label="TailwindBlog" href="/"
          ><div class="flex items-center justify-between">
            <div class="hidden h-6 text-2xl font-semibold sm:block">Inertia uno</div>
          </div></a
        >
      </div>
      <nav class="flex items-center text-base  justify-end">
        <ul>
          <li>
            <a href="#">
                <Icon icon="mdi:bell-outline" w-8 h-8 />
            </a>
            <ul>
              <li><a href="#">Option1</a></li>
              <li><a href="#">Option2 A Long One</a></li>
              <li><a href="#">Option3</a></li>
            </ul>
          </li>
          <li>
                
            <a href="#"><Icon icon="mdi:account-supervisor-circle" w-8 h-8 /></a>
            <ul>
              <li><a href="#">Option1</a></li>
              <li><a href="#">Option2</a></li>
              <li><a href="#">Option3</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><Icon icon="iconoir:apple-shortcuts" w-8 h-8 /></a>
            <ul>
              <li><a href="#">Option1</a></li>
              <li><a href="#">Option2</a></li>
              <li><a href="#">Option3</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <slot />
  </div>
</template>
<script setup>
import { Icon } from "@iconify/vue";
</script>
<style>
nav ul,
nav li {
    @apply list-none p-0 m-0
}
nav > ul > li {
    display: inline-block;
    position: relative;
    @apply m-2;
}
nav > ul > li > a {
    padding-bottom: 50px;
    @apply text-white !important;
}
nav > ul > li > ul > li > a {
    @apply text-red-600 !important;
}
nav > a {
    @apply text-white decoration-0
}
nav > ul > li > ul {
    display: none;
    position: absolute;
    @apply bg-rose-100 rounded-xl shadow-2xl shadow-rose-300/20 right-0 top-10; 
    min-width: 200px;;
    padding: 10px 0;
}
nav > ul > li > ul > li {
    @apply whitespace-nowrap py-4 px-5   hover:shadow-rose-500/10 hover:bg-rose-50 hover:shadow-xl  z-20
   
}
nav > ul > li > ul > li > a {
    display: block;
}
nav > ul > li > ul:after {
    @apply absolute -ml-5 -top-2 w-0 h-0 right-3 z-10;
    content:'';
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-bottom: 10px solid rgb(255, 228, 230)

}
nav > ul > li:hover > ul {
    display:block;
}
</style>