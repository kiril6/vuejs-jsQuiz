<template>
<div>
    <div v-if="this.$route.name==='QuestionsSegment1' && (this.$route.params.id===1 || this.$route.params.id===2 || this.$route.params.id===3)" class="row">
        <div class="progress margin-bottom">
            <div v-if="this.$route.params.id===1" :class="{'w-15' : question[0], 'w-25' : question[0] && question[1], 'w-30' : question[0] && question[1] && question[2]}" class="bar success text-primary"><b>{{ calcProgress1 }}</b></div>
            <div v-if="this.$route.params.id===2" :class="{'w-50' : question[3], 'w-65' : question[3] && question[4]}" class="bar w-35 success text-primary"><b>{{ calcProgress1 }}</b></div>
            <div v-if="this.$route.params.id===3" :class="{'w-85' : question[5], 'w-100' : question[5] && question[6]}" class="bar w-70 success text-primary"><b>{{ calcProgress1 }}</b></div>
        </div>
    </div>
    <div v-if="this.$route.name==='QuestionsSegment2' && (this.$route.params.id===1 || this.$route.params.id===2 || this.$route.params.id===3)" class="row">
        <div class="progress margin-bottom">
            <div v-if="this.$route.params.id===1" :class="{'w-15' : question[0], 'w-30' : question[0] && question[1]}" class="bar success text-primary"><b>{{ calcProgress2 }}</b></div>
            <div v-if="this.$route.params.id===2" :class="{'w-40' : question[2], 'w-45' : question[2] && question[3], 'w-65' : question[2] && question[3] && question[4] }" class="bar w-35 success text-primary"><b>{{ calcProgress2 }}</b></div>
            <div v-if="this.$route.params.id===3" :class="{'w-85' : question[5], 'w-100' : question[5] && question[6]}" class="bar w-70 success text-primary"><b>{{ calcProgress2 }}</b></div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "QuizProgress",
    props: {
        question: Array
    },
    computed: {
        calcProgress1() {
            if (this.$route.params.id === 1) {
                if (this.question[0] && this.question[1] && this.question[2]) {
                    return '30%'
                } else if (this.question[0] && this.question[1]) {
                    return '25%'
                } else if (this.question[0]) {
                    return '15%'
                }
            }

            if (this.$route.params.id === 2) {
                if (this.question[3] && this.question[4]) {
                    return '65%'
                } else if (this.question[3]) {
                    return '50%'
                }
                return '35%'
            }

            if (this.$route.params.id === 3) {
                if (this.question[5] && this.question[6]) {
                    return '100%'
                } else if (this.question[5]) {
                    return '85%'
                }
                return '70%'
            }
        },
        calcProgress2() {
            if (this.$route.params.id === 1) {
                if (this.question[0] && this.question[1]) {
                    return '30%'
                } else if (this.question[0]) {
                    return '15%'
                }
            }

            if (this.$route.params.id === 2) {
                if (this.question[2] && this.question[3] && this.question[4]) {
                    return '65%'
                } else if (this.question[2] && this.question[3]) {
                    return '45%'
                } else if (this.question[2]) {
                    return '40%'
                }
                return '35%'
            }

            if (this.$route.params.id === 3) {
                if (this.question[5] && this.question[6]) {
                    return '100%'
                } else if (this.question[5]) {
                    return '85%'
                }
                return '70%'
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.progress {
    transition: color 0.3s ease-in-out;

    &:hover {
        color: #ddcd45;
    }

    &:before {
        font-weight: 400;
        font-size: 14px;
        color: #fff;
        content: 'quiz progress';
        position: absolute;
        margin-top: 30px;
        left: 45%;
    }
}
</style>
