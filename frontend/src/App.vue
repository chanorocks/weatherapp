<template>
	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center justify-content-between">
			<h1 class="logo"><router-link to="/"> WeatherApp</router-link></h1>
		</div>
	</header>
	<!-- End Header -->
	<router-view></router-view>
</template>

<script>
export default {
  name: 'App',
}
</script>

