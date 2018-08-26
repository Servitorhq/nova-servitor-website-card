<template>
    <card class="card relative px-4 py-4 relative card-panel">

        <a :href="'https://servitor.io/admin/monitors/'+monitorResponse.id" class="no-underline">
            <h1 class="text-center text-3xl text-80 font-light no-underline">
                {{ monitorResponse.host }}
            </h1>
        </a>
            <ul class="list-reset" v-if="!loading">
                <li class="flex">
                    <strong class="flex-1">Online</strong>
                        <label v-if="monitorResponse.is_online" class="align-center text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-success text-white">Yes</label>
                    <label v-else class="align-center text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-danger text-white">No</label>
                </li>
                <li class="flex">
                    <strong class="flex-1">Valid SSL</strong>
                    <label v-if="monitorResponse.has_valid_ssl === 'VALID'" class="text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-success text-white">Yes</label>
                    <label v-else class="text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-danger text-white">No</label>
                </li>
                <li class="flex">
                    <strong class="flex-1">Mixed contents</strong>
                    <label v-if="!monitorResponse.mixed_contents_count" class="text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-success text-white">No</label>
                    <label v-else class="text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-danger text-white">Yes</label>
                </li>
                <li class="flex">
                    <strong class="flex-1">Broken links</strong>
                    <label v-if="!monitorResponse.broken_links_count" class="text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-success text-white">No</label>
                    <label v-else class="text-xs font-semibold rounded-full px-4 leading-normal border border-purple bg-danger text-white">Yes</label>
                </li>
            </ul>
    </card>
</template>

<script>
export default {
    props: ['card'],

    data() {
        return {
            loading: true,

            monitorResponse: {},
        }
    },

    methods: {
        refresh() {
            Nova.request().get('/nova-vendor/nova-servitor-monitor-card/servitor/monitor', {
                params: {
                    monitorId: this.card.monitorId,
                }
            }).then((response) => {
                this.loading = false;
                this.monitorResponse = response.data.data;
            })
        }
    },

    mounted() {
        this.refresh();
    },
}
</script>
