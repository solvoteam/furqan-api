<template>
    <div class="col-xs-4">
        <router-link v-for="(surat, index) in surats"
                     :to="'/surat/' + surat.number"
                     class="surats-list__item"
                     :key="index">
            <span class="surats-list__number">{{ surat.number }}</span>
            <span class="surats-list__name-transcription"
                  v-html="$options.filters.highlight(surat.name_transcription, search)"></span>
            <span class="surats-list__name"
                  v-html="'(' + $options.filters.highlight(surat.name, search) + ')'"></span>
        </router-link>
    </div>
</template>

<script>
    export default {
        props: ['surats', 'search'],
    }
</script>