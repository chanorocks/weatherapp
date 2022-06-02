<template>	
	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center padding">
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-xl-7 col-lg-9 text-center">
					<h1>Japan weather forecast</h1>
				</div>
			</div>
			<div class="row icon-boxes">
				<template v-for="weather in weathers" v-bind:key="weather.id">
					<div class="col-md-6 col-lg-4 align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
						<div class="icon-box">
							<div class="icon">
								<h4 class="title">
									<img v-bind:alt="'https://openweathermap.org/img/wn/' + weather.list[0].weather[0].icon + '.png'" v-bind:src="'https://openweathermap.org/img/wn/' + weather.list[0].weather[0].icon + '@2x.png'"/>
									{{ weather.list[0].main.temp }}°C
								</h4>
							</div>
							<h4 class="title"><router-link :to="{ path: '/venues/'+weather.city.name }">View all forecast in {{ weather.city.name }}</router-link></h4>
							<p class="description">Weather: {{ weather.list[0].weather[0].main }} ( {{ weather.list[0].weather[0].description }} )</p>
							<p class="description">{{ weather.list[0].dt_txt }}</p>													
						</div>
					</div>
				</template>
			</div>
		</div>
	</section>
	<!-- End Hero -->
	<div class="vld-parent">
        <loading v-model:active="isLoading"
				loader="dots"
                :is-full-page="fullPage"/>
    </div>
</template>

<script>
	import Loading from 'vue-loading-overlay';
	import 'vue-loading-overlay/dist/vue-loading.css';
	import axios from 'axios'
	export default {
		data() {
			return {
				weathers: {},
				isLoading: true,
				fullPage: true
			}
		},
        components: {
            Loading
        },
		async created () {
			try {
				const response = await axios.get(process.env.VUE_APP_API_URL+'/weather')
				this.weathers = response.data
				this.isLoading = false
			} catch (e) {
				//handle the error here
			}
		}
	}
</script>
<style>
	.padding {
		padding: 80px 0px 0px 0px;
		overflow: hidden;
	}
</style>
