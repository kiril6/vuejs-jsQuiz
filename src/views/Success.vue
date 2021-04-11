<template>
<div class="row flex-center">
    <subscribe :followMenu="followMenu" />
</div>
</template>

<script>
import Subscribe from '../components/Subscribe.vue';
export default {
    name: "Success",
    components: {
        Subscribe
    }
};
</script>

<style lang="scss" scoped>

</style>
