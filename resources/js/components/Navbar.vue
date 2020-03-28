<template>
    <header class="bg-gray-700 sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3 fixed w-full top-0 z-30">
      <div class="flex justify-between items-center px-4 py-3 sm:p-0">
        <div class="text-gray-200 font-bold text-lg">Emre UYGUR</div>
        <div v-bind:class="{change: menuToggle}" @click="menuToggle = !menuToggle" class="hamburger-menu-container inline-block sm:hidden">
            <div class="bar1 bg-gray-200"></div>
            <div class="bar2 bg-gray-200"></div>
            <div class="bar3 bg-gray-200"></div>
        </div>
      </div>
      <div v-bind:class="{hidden: !menuToggle}" class="text-gray-200 font-semibold px-2 pb-4 pt-1 sm:flex sm:p-0">
          <a href="/" class="block px-2 hover:bg-gray-600">Home</a>
          <a href="/about" class="block px-2 mt-1 sm:mt-0 sm:ml-2 hover:bg-gray-600">About Me</a>
          <a href="/blog" class="block px-2 mt-1 sm:mt-0 sm:ml-2 hover:bg-gray-600">Blog</a>
          <a href="/contact" class="block px-2 mt-1 sm:mt-0 sm:ml-2 hover:bg-gray-600">Contact</a>
      </div>
    </header>
</template>

<script>
export default {
  data () {
      return {
          menuToggle: false
      }
  }
}
</script>

<style scoped>
.hamburger-menu-container {
  /* display: inline-block; */
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  margin: 6px 0;
  transition: 0.4s;
}

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}
</style>