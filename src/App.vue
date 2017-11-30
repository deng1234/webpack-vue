<template>
	<div>
		<vueLogin v-if="showLogin"
				@showIndexPage="showIndexPage"></vueLogin>
		<vueIndex v-if="showIndex"
				@showLoginPage="showIndexPage"></vueIndex>
	</div>
</template>

<script>
	import vueIndex from './components/vue-index.vue';
	import vueLogin from './components/vue-login.vue';
	export default {
		name: "App",
		data() {
			return {
				showLogin: true,
				showIndex: false
			}
		},
		methods: {
			showIndexPage() {
				this.showIndex = true;
				this.showLogin = false;
			},
			showLoginPage() {
				this.showLogin = true;
				this.showIndex = fasle;
			}
		},
		components: {
			vueIndex,
			vueLogin
		}
	}
</script>