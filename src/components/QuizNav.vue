<template>
<div v-if="this.$route.params.id===1 || this.$route.params.id===2 || this.$route.params.id===3" class="row">
    <ul class="breadcrumb border text-primary">
        <li>JS-Quiz</li>
        <li v-if="this.$route.params.id===1" class="text-warning"><span><b>Page 1</b></span></li>
        <li v-if="this.$route.params.id===2" class="text-warning"><span><b>Page 2</b></span></li>
        <li v-if="this.$route.params.id===3" class="text-warning"><span><b>Page 3</b></span></li>
    </ul>
</div>
</template>

<script>
export default {
    name: "QuizNav",
    props: {
        msg: String
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->

<style  lang="scss" scoped>

</style>
