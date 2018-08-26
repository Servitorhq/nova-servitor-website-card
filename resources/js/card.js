Nova.booting((Vue, router) => {
    Vue.config.devtools = true;
    Vue.component('nova-servitor-monitor-card', require('./components/Card'));
})
