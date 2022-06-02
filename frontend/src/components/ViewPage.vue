<template>
	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container position-relative" data-aos="fade-up">
			<div class="row justify-content-center">
				<div class="col-xl-7 col-lg-9 text-center">
					<h1 v-if="city"> {{ city }} weather forecast.</h1>
				</div>
			</div>
			<div class="container-fluid main-container">
				<div class="row icon-boxes flex-nowrap">				
					<template v-for="weather in weathers.list" v-bind:key="weather.id">
						<div class="col-md-6 col-lg-2 align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
							<div class="icon-box">
								<div class="icon">
									<p class="title text-center">
										<img v-bind:alt="'https://openweathermap.org/img/wn/' + weather.weather[0].icon + '.png'" v-bind:src="'https://openweathermap.org/img/wn/' + weather.weather[0].icon + '@2x.png'"/>
										{{ weather.main.temp }}°C
									</p>
								</div>
								<h4 class="title">{{ weather.weather[0].main }}<br>{{ weather.dt_txt }}</h4>					
							</div>
						</div>
					</template>
				</div>
			</div>
		</div>
	</section>
	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center zpadding">
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-xl-7 col-lg-9 text-center">
					<h1 v-if="city"> Nearby venues in {{ city }}</h1>
				</div>
			</div>
			<div class="row icon-boxes">
				<template v-for="place in places.results" v-bind:key="place.id">
					<div class="col-md-6 col-lg-4 align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
						<div class="icon-box">
							<template v-for="img in place.categories" v-bind:key="img.id">
								<div class="icon"><img class="img-fluid  img-thumbnail" v-bind:alt="place.name + '_' + img.icon.prefix" v-bind:src="img.icon.prefix + 'bg_32' + img.icon.suffix"/></div>
							</template>
							<h4 class="title">{{ place.name }}</h4>
							<p class="description">{{ place.location.formatted_address }}</p>
						</div>
					</div>
				</template>
			</div>
		</div>
	</section>
	<div class="vld-parent">
        <loading v-model:active="isLoading"
				loader="dots"
                :is-full-page="fullPage"/>
    </div>
</template>

<script>
	import axios from 'axios'
	import { useRoute } from 'vue-router'
	import Loading from 'vue-loading-overlay';
	import 'vue-loading-overlay/dist/vue-loading.css';
	export default {
		data() {
			return {
				weathers: {},
				places: {},
				city: false,
				isLoading: true,
				fullPage: true
			}
		},
        components: {
            Loading
        },
		async created () {
			try {
				const route=useRoute();
				const venueResp = await axios.get(process.env.VUE_APP_API_URL+'/venue/'+route.params.city)
				const weatherResp = await axios.get(process.env.VUE_APP_API_URL+'/weather/'+route.params.city)
				this.places = venueResp.data
				this.weathers = weatherResp.data
				this.city = route.params.city
				this.isLoading = false
			} catch (e) {
				// handle the error here
			}
		}
	}
</script>
<style>
	.testimonial-group > .row {
		overflow-x: auto;
		white-space: nowrap;
	}
	.testimonial-group > .row > .col-xs-4 {
		display: inline-block;
		float: none;
	}
	.zpadding {
		padding: 0px;
		overflow: hidden;
	}
</style>