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
                audio: null,
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
        },
        methods: {
            playAyat(ayat) {
                let that = this;
                that.audio = new Audio(ayat.audio);
                that.audio.play();
                that.audio.onended = () => {
                    if (!that.surat[that.current_index + 1]) {
                        return;
                    }

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
        beforeDestroy() {
            if (this.audio instanceof Audio) {
                this.audio.pause();
                this.audio = null;
            }
        },
    }
</script>