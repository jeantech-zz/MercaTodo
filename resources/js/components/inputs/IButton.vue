<template>
<div id="app" class="container">
    <section>
        <b-button class="button is-success"  @click="clickMe( id )"> Delete </b-button>
    </section>
</div>
</template>

<script>


export default {
    data () {
        return {
            id : ''
        }
    },
    methods: {
        clickMe($id) {
            this.$buefy.notification.open('Clicked!!'+id);
            console.log(id)
        }
    },
}
</script>