<template>
<div>
    <div v-if="this.$route.name==='QuestionsSegment1' && this.$route.params.id" class="row flex-right margin-right-middle">
        <router-link tag="button" @click.native="nextStep1" v-if="this.$route.params.id===1" :to="{ name: 'QuestionsSegment1', params: {id: 2}, query: this.$route.query }" class="background-secondary" tabindex="4" :disabled="!nextStep">Next page</router-link>
        <router-link tag="button" @click.native="nextStep2" v-if="this.$route.params.id===2" :to="{ name: 'QuestionsSegment1', params: {id: 3}, query: this.$route.query }" class="background-secondary" tabindex="5" :disabled="!nextStep">Next page</router-link>
        <button v-if="this.$route.params.id===3" @click="submit('regular')" class="background-success" tabindex="7" :disabled="!nextStep">Submit Answers</button>
    </div>

    <div v-if="this.$route.name==='QuestionsSegment2' && this.$route.params.id" class="row flex-right margin-right-middle">
        <router-link tag="button" @click.native="nextStep1" v-if="this.$route.params.id===1" :to="{ name: 'QuestionsSegment2', params: {id: 2}, query: this.$route.query }" class="background-secondary" tabindex="3" :disabled="!nextStep">Next page</router-link>
        <router-link tag="button" @click.native="nextStep2" v-if="this.$route.params.id===2" :to="{ name: 'QuestionsSegment2', params: {id: 3}, query: this.$route.query }" class="background-secondary" tabindex="7" :disabled="!nextStep">Next page</router-link>
        <button v-if="this.$route.params.id===3" @click="submit('advanced')" class="background-success" tabindex="7" :disabled="!nextStep">Submit Answers</button>
    </div>
</div>
</template>

<script>
export default {
    name: "QuizNavButtons",
    data() {
        return {

        }
    },

    props: {
        nextStep: {
            type: Boolean,
            required: true,
            default: true
        },
    },
    watch: {
        // '$route.query': {
        //     immediate: false,
        //     handler(newVal) {
        //         // if (newVal[1] && newVal[2] && newVal[3]) {
        //         //     this.nextStep = true;
        //         // }

        //         // if (this.$route.params.id === 1) {
        //         //     console.log(newVal, ' kiko')
        //         //     this.step1Query = newVal;
        //         // }
        //         // make actions with newVal.page
        //     }
        // }
    },
    methods: {
        submit(value) {
            if (value === 'regular') {
                if (this.$route.query && Object.values(this.$route.query).every(item => item === 1)) {
                    localStorage.setItem('jsQuiz', JSON.stringify(['Advanced', 'Success']));
                    this.$router.push({
                        path: '/success'
                    })
                } else {
                    localStorage.setItem('jsQuiz', JSON.stringify(['Advanced', 'Failed1']));
                    this.$router.push({
                        path: '/failed',
                        query: Object.assign({}, this.$route.query)
                    })
                }
            }

            if (value === 'advanced') {
                if (this.$route.query && Object.values(this.$route.query).every(item => item === 1)) {
                    localStorage.setItem('jsQuiz', JSON.stringify(['Advanced', 'Success']));
                    this.$router.push({
                        path: '/success'
                    })
                } else {
                    localStorage.setItem('jsQuiz', JSON.stringify(['Advanced', 'Failed2']));
                    this.$router.push({
                        path: '/failed',
                        query: Object.assign({}, this.$route.query)
                    })
                }
            }

            // this.$router.go('booklet');
            // this.$router.push({ name: 'booklet' })

            // if time is up go solve it one more time - checked OK
            // if time is up in advance try solve it again in advanced = timer not reseting when wuiz started

            // if submits true say bravo you are ready for the js interview
            // if answers wrong say u are week in knowledge take this booklet direct link or read more before
            // or try again with Advanced version

            // think is u should add discord link
        }
    }
};
</script>

<style  lang="scss" scoped>

</style>
