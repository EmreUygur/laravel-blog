<template>
    <header class="bg-gray-700 sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3 fixed w-full top-0 z-10 select-none">
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
        <span v-if="isLogged" class="relative select-none">
          <div class="hidden sm:block">
            <a @click="ddToggle = !ddToggle" class="block relative z-50 px-2 mt-1 sm:mt-0 sm:ml-2 hover:bg-gray-600 cursor-pointer">
              <i class="fas fa-user"></i>
            </a>
            <div v-if="ddToggle" @click="ddToggle = false" class="fixed inset-0 bg-gray-500 w-full h-full opacity-25"></div>
            <div v-if="ddToggle" class="absolute right-0 w-48 bg-gray-200 text-gray-700 rounded-lg py-2 mt-2 shadow-lg">
              <a href="/dashboard" class="block px-4 py-2 hover:bg-indigo-500 hover:text-gray-200">
                <i class="fas fa-address-card mr-2"></i> Dashboard
              </a>
              <a @click="logout" class="block px-4 py-2 hover:bg-indigo-500 hover:text-gray-200 cursor-pointer">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </a>
            </div>
          </div>
          <div class="block sm:hidden mt-2 pt-2 border-t border-gray-200">
            <a href="/dashboard" class="block px-2 hover:bg-gray-600">
              <i class="fas fa-address-card mr-2"></i> Dashboard
            </a>
            <a @click="logout" class="block px-2 hover:bg-gray-600 cursor-pointer">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
          </div>
          <form id="logoutForm" ref="logoutForm" action="/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" v-bind:value="token">
          </form>
        </span>
      </div>
    </header>
</template>

<script>
export default {
  props: {
    isLogged: Boolean,
    token: String
  },
  data () {
      return {
          menuToggle: false,
          ddToggle: false
      }
  },
  created () {
    const handleESC = (e) => {
      if (e.key === 'Esc' || e.key === 'Escape') {
        this.ddToggle = false
      }
    }

    document.addEventListener('keydown', handleESC);

    this.$once('hook:beforeDestroy', () => {
      removeEventListener('keydown', handleESC);
    }); mr-2
  },
  methods: {
    logout: function (event) {
      event.preventDefault();
      this.$refs.logoutForm.submit();
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