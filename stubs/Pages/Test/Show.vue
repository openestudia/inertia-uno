<template layout = "default">
  <div class="flex flex-col items-center justify-center h-screen container mx-auto">
    <h1 class="page-title">inertia-uno</h1>
    <p class="text-xl text-center m-10 font-lato text-rose-500/30">
      A modern Laravel starter template using Inertia.js, Unocss, and other essential
      tools.
    </p>
    <div
      class="grid grid-cols-1 lg:grid-cols-3 gap-8 overflow-auto scrollbar scrollbar-rounded scrollbar-w-4px scrollbar-radius-2 scrollbar-track-radius-4 scrollbar-thumb-radius-4 lg:p-10 lg:pb-20 scrollbar-fill-red scrollbar-thumb-color-red-500"
    >
      <div
        class="lg:hidden -mb-50 from-white to-white/20 bg-gradient-to-b h-50 sticky top-0 z-20"
      ></div>
      <div class="card">
        <h2 class="title">Inertia.js</h2>
        <p class="info">
          Inertia.js is a modern PHP library for building single-page applications using
          Vue.js, React, or Svelte.
        </p>
        <div flex items-center w-full justify-between>
          <a
            href="{{ route('inertiajs.sample') }}"
            class="text-rose-100 hover:text-rose-500"
            ><Icon icon="mdi:info" w-6 h-6
          /></a>
          <a
            href="{{ route('inertiajs.sample') }}"
            class="text-rose-100 hover:text-rose-500"
            ><Icon icon="mdi:github" w-6 h-6
          /></a>
        </div>
      </div>
      <div class="card">
        <h2 class="title">Unocss</h2>
        <p class="info">
          Unocss is a utility-first CSS framework that provides a minimal set of CSS rules
          and allows you to define your own design tokens.
        </p>

        <div flex items-center w-full justify-between>
          <a href="{{ route('unocss.sample') }}" class="text-rose-100 hover:text-rose-500"
            ><Icon icon="mdi:info" w-6 h-6 /></a
          ><a
            href="{{ route('inertiajs.sample') }}"
            class="text-rose-100 hover:text-rose-500"
            ><Icon icon="mdi:github" w-6 h-6
          /></a>
        </div>
      </div>
      <div class="card">
        <h2 class="title">Auto Import</h2>
        <p class="info">
          Auto Import is a Webpack plugin that automatically imports modules in your
          JavaScript code, based on usage analysis.
        </p>
        <a
          href="{{ route('auto-import.sample') }}"
          class="text-rose-400 hover:text-orange-500"
          ><Icon icon="mdi:info" w-6 h-6
        /></a>
      </div>
      <div class="card">
        <h2 class="title">Layout Definition</h2>
        <p class="info">
          Layout definition in Vue templates allows you to define a layout component that
          wraps other components and provides a common UI structure.
        </p>
        <a
          href="{{ route('layout-definition.sample') }}"
          class="text-rose-400 hover:text-orange-500"
          ><Icon icon="mdi:info" w-6 h-6
        /></a>
      </div>
      <div class="card">
        <h2 class="title">Vueuse</h2>
        <p class="info">
          Vueuse is a collection of essential Vue Composition API utilities for Vue 2 and
          3, designed for building composable and reactive applications.
        </p>
        <a href="{{ route('vueuse.sample') }}" class="text-rose-400 hover:text-orange-500"
          ><Icon icon="mdi:info" w-6 h-6
        /></a>
      </div>
      <div class="card">
        <h2 class="title">Vue I18n</h2>
        <p class="info">
          Vue I18n is an internationalization plugin for Vue.js that provides features for
          building multilingual applications.
        </p>
        <a
          href="{{ route('vuei18n.sample') }}"
          class="text-rose-400 hover:text-orange-500"
          ><Icon icon="mdi:info" w-6 h-6
        /></a>
      </div>
    </div>
  </div>
</template>
<script setup>
import { Icon } from "@iconify/vue";
</script>
<style>
.page-title {
  @apply text-7xl font-bold text-rose-600  m-10 lg:m-0  tracking-wider;
  text-shadow: 3px 3px 80px rgba(244, 63, 94, 1);
}
.title {
  @apply text-2xl font-bold  text-rose-500 mb-4;
  text-shadow: 0px 0px 30px rgba(233, 32, 32, 0.3);
}
.card {
  border: 1px solid rgba(223, 40, 40, 0.28);
  background: linear-gradient(white, white) padding-box,
    linear-gradient(to top, rgba(223, 40, 40, 0.1), rgba(223, 40, 40, 0.48)) border-box;
  border-radius: 50em;
  border: 1.2pt solid transparent;

  @apply bg-white p-8 rounded-2xl shadow-2xl shadow-red-500/20 h-full flex flex-col place-content-between gap-5 hover:translate-y-6;
}
.info {
  @apply text-slate-400 mb-4 leading-6;
}
</style>
