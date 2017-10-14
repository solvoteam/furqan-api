<template>
    <div class="player-wrapper">
        Sura {{ $route.params.number }}
        <div class="ayat-text" v-if="surat">
            <p class="ayat-text__original">{{ surat[current_index].text }}</p>
            <p class="ayat-text__translation">
                {{current_ayat}}.
                {{ surat[current_index].translation.text }}
            </p>
        </div>
        <router-link to="/">Go to main page</router-link>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                surat: null,
                current_ayat: 1,
            };
        },
        mounted() {
            let that = this;

            if (!this.surat) {
                axios.get('/api/ayats', {
                    params: {
                        surat_number: this.$route.params.number
                    },
                }).then(function (response) {
                    that.surat = response.data;
                    that.playAyat(that.surat[that.current_index]);
                });
            }
            console.log(this.$route.params.number);
        },
        methods: {
            playAyat(ayat) {
                let that = this;
                let audio = new Audio(ayat.audio);
                audio.play();
                audio.onended = () => {
                    that.current_ayat++;
                    that.playAyat(that.surat[that.current_index]);
                };
            },
        },
        computed: {
            current_index() {
                return this.current_ayat - 1;
            },
        },
    }
</script>