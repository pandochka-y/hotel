<template>

    <header class="header" :style="[`background: url(${data?.banner}) center/cover no-repeat`]">
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ data?.title }}</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Location</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section class="location">
            <div class="container container--sm">
                <div class="location__text">
                    {{ data?.description }}
                </div>
                <div class="location__get" @click="openModal">Get directions</div>
            </div>
        </section>
        <DiscoverSlider/>
        <div v-if="isOpenModal" @click="closeModal" class="location-modal">
            <div class="location-modal__wrapper">
                <div id="locationMap" class="location-modal__content"></div>
            </div>
        </div>

        <div v-if="isOpenModal" class="modal-overlay"></div>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import {useFetchData} from "../hooks/useFetchData";
import loaderGoogleMaps from "../mixins/loaderGoogleMaps";
export default {
    name: "Location",
    components: {DiscoverSlider},
    mixins: [loaderGoogleMaps],
    setup(props) {
        const {data, isLoading} = useFetchData('/api/location-page');
        return {
            data, isLoading
        }
    },
    data() {
        return {
            isOpenModal: false,
        }
    },
    methods: {
        openModal() {
            this.isOpenModal = !this.isOpenModal;
            document.body.classList.add('openModal')
            this.loadGoogleMaps()
        },
        closeModal(e) {
            console.log(e.target)
            if (e.target.classList.contains('location-modal__wrapper')) {
                this.isOpenModal = false
                document.body.classList.remove('openModal');
                window.initMap = null;
            }
        },
        initMap(google) {
            const map = new google.maps.Map(
                document.getElementById("locationMap"),
                {
                    zoom: 14,
                    center: { lat: 37.77, lng: -122.447 },
                    disableDefaultUI: true,
                }
            );
            const marker = new google.maps.Marker({
                position: { lat: 37.77, lng: -122.447 },
                icon: '/img/GMap/start.png',
                map: map
            });
        },
    },
    mounted() {
    },
}
</script>

<style scoped>

</style>
