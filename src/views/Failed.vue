<template>
<div class="row flex-center">
    <subscribe :followMenu="followMenu" />
</div>
</template>

<script>
import Subscribe from '../components/Subscribe.vue';
export default {
    name: "Failed",
    components: {
        Subscribe
    }
};
</script>

<style lang="scss" scoped>

</style>
