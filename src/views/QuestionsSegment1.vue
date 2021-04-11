<template>
<!-- maybe advanced should be in computedto not have warned warn -->
<div v-if="!advanced && this.$route.name==='QuestionsSegment1'" class="questions-segment-1">

    <quiz-nav />

    <section v-if="this.$route.params.id===1" class="page1">
        <div class="row flex-center text-primary">
            <div class="card">
                <div class="card-body">
                    <h4>1) Question:</h4>
                    <div class="padding-left-large margin-top-small">
                        <div class="row flex-middle">
                            JavaScript is a client-side and server-side <input v-model="regularQuestions[0]" @input="regularQuestions[0]=$event.target.value.toLowerCase(), sendit('first')" type="text" placeholder="Type answer here" id="1stAnswer1" class="margin-left-small margin-right-small" maxlength="11" size="11" tabindex="1"> language.
                        </div>
                    </div>
                    <h4>2) Question:</h4>
                    <div class="padding-left-large margin-top-small">
                        <div class="row flex-middle">
                            In javascript the 2 data types that cannot contain values are <input v-model="regularQuestions[1]" @input="regularQuestions[1]=$event.target.value.toLowerCase(), sendit('second')" type="text" placeholder="..." id="2ndAnswer1" class="margin-left-small margin-right-small" maxlength="4" size="5" tabindex="2"> and <input v-model="regularQuestions[2]" @input="regularQuestions[2]=$event.target.value.toLowerCase(), sendit('third')" type="text" placeholder="..." id="2ndAnswer2" class="margin-left-small margin-right-small" maxlength="9" size="9" tabindex="3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section v-if="this.$route.params.id===2" class="page2">
        <div class="row flex-center text-primary">
            <div class="card">
                <div class="card-body">
                    <h4>3) Question:</h4>
                    <div class="padding-left-large margin-top-small">
                        <div class="row flex-middle">
                            Write the javascript comparison operator when we need to compare a variable by both type and value <input v-model="regularQuestions[3]" @input="regularQuestions[3]=$event.target.value.toLowerCase(), sendit2('first')" type="text" placeholder="..." id="3dAnswer1" class="margin-left-small margin-right-small" maxlength="3" size="5" tabindex="1">
                        </div>
                    </div>
                    <h4>4) Question:</h4>
                    <div class="padding-left-large margin-top">
                        <fieldset class="form-group">
                            <legend>Which are the 3 Javascript variables:</legend>
                            <label for="4thAnswer1" class="paper-radio" tabindex="2" @change="sendit2('second')">
                                <input v-model="regularQuestions[4]" type="radio" name="4thAnswer1" id="4thAnswer1" value="option1"> <span>if, for, let</span>
                            </label>
                            <label for="4thAnswer2" class="paper-radio" tabindex="3" @change="sendit2('second')">
                                <input v-model="regularQuestions[4]" type="radio" name="4thAnswer2" id="4thAnswer2" value="option2"> <span>switch, const, else if</span>
                            </label>
                            <label for="4thAnswer3" class="paper-radio" tabindex="4" @change="sendit2('second')">
                                <input v-model="regularQuestions[4]" type="radio" name="4thAnswer3" id="4thAnswer3" value="option3"> <span>var, let, const</span>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section v-if="this.$route.params.id===3" class="page3">
        <div class="row flex-center text-primary">
            <div class="card">
                <div class="card-body">
                    <h4>5) Question:</h4>
                    <div class="padding-left-large margin-top">
                        <fieldset class="form-group">
                            <legend>If we want to display something in browser console, we will do that with:</legend>
                            <label for="5thAnswer1" class="paper-radio" tabindex="1" @change="sendit3('first')">
                                <input v-model="regularQuestions[5]" type="radio" name="5thAnswer1" id="5thAnswer1" value="option1"> <span>window.alert(‘this will be the javascript output’);</span>
                            </label>
                            <label for="5thAnswer2" class="paper-radio" tabindex="2" @change="sendit3('first')">
                                <input v-model="regularQuestions[5]" type="radio" name="5thAnswer2" id="5thAnswer2" value="option2"> <span>console.log(‘this will be the javascript output’);</span>
                            </label>
                            <label for="5thAnswer3" class="paper-radio" tabindex="3" @change="sendit3('first')">
                                <input v-model="regularQuestions[5]" type="radio" name="5thAnswer3" id="5thAnswer3" value="option3"> <span>document.write(‘this will be the javascript output’);</span>
                            </label>
                        </fieldset>
                    </div>
                    <h4>6) Question:</h4>
                    <div class="padding-left-large margin-top">
                        <fieldset class="form-group">
                            <legend>Which one are javascript data structures:</legend>
                            <label for="6thAnswer1" class="paper-radio" tabindex="3" @change="sendit3('second')">
                                <input v-model="regularQuestions[6]" type="radio" name="6thAnswer1" id="6thAnswer1" value="option1"> <span>functions</span>
                            </label>
                            <label for="6thAnswer2" class="paper-radio" tabindex="4" @change="sendit3('second')">
                                <input v-model="regularQuestions[6]" type="radio" name="6thAnswer2" id="6thAnswer2" value="option2"> <span>for, while, do</span>
                            </label>
                            <label for="6thAnswer3" class="paper-radio" tabindex="5" @change="sendit3('second')">
                                <input v-model="regularQuestions[6]" type="radio" name="6thAnswer3" id="6thAnswer3" value="option3"> <span>Arrays, Objects</span>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br />

    <quiz-nav-buttons :nextStep="this.answersStep1 || this.answersStep2 || this.answersStep3" />
    <quiz-progress :question="this.regularQuestions" />

</div>
</template>

<script>
import QuizNav from "../components/QuizNav.vue"
import QuizNavButtons from '../components/QuizNavButtons.vue';
import QuizProgress from "../components/QuizProgress.vue"

export default {
    name: "QuestionsSegment1",
    components: {
        QuizNav,
        QuizNavButtons,
        QuizProgress,
    },
    data() {
        return {
            answersStep1: false,
            answersStep2: false,
            answersStep3: false,
            regularQuestions: [],
        }
    },
    beforeMount() {
        // window.addEventListener("beforeunload", this.preventNav);
    },

    beforeDestroy() {
        // window.removeEventListener("beforeunload", this.preventNav);
    },

    //test if really needed apears also on submit button

    // beforeRouteLeave(to, from, next) {
    //     if (confirm('You may have unsaved changes. Do you want to continue?')) {
    //         return next()
    //     }
    // },
    methods: {
        sendit(value) {
            if (value === 'first' && this.regularQuestions[0] === 'programming') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: 1,
                        2: this.$route.query[2],
                        3: this.$route.query[3]
                    }
                })
            } else if (value === 'first' && this.regularQuestions[0] != 'programming') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: 0,
                        2: this.$route.query[2],
                        3: this.$route.query[3]
                    }
                })
            }
            if (value === 'second' && this.regularQuestions[1] === 'null') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: this.$route.query[1],
                        2: 1,
                        3: this.$route.query[3]
                    }
                })
            } else if (value === 'second' && this.regularQuestions[1] !== 'null') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: this.$route.query[1],
                        2: 0,
                        3: this.$route.query[3]
                    }
                })
            }
            if (value === 'third' && this.regularQuestions[2] === 'undefined') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: this.$route.query[1],
                        2: this.$route.query[2],
                        3: 1
                    }
                })
            } else if (value === 'third' && this.regularQuestions[2] !== 'undefined') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: this.$route.query[1],
                        2: this.$route.query[2],
                        3: 0
                    }
                })
            }
            if (this.$route.query[1] !== undefined && this.$route.query[2] !== undefined && this.$route.query[3] !== undefined) {
                this.answersStep1 = true;
            }
        },

        sendit2(value) {
            if (value === 'first' && this.regularQuestions[3] === '===') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        4: 1,
                        5: this.$route.query[5],
                    })
                })
            } else if (value === 'first' && this.regularQuestions[3] !== '===') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        4: 0,
                        5: this.$route.query[5],
                    })
                })
            }
            if (value === 'second' && this.regularQuestions[4] === 'option3') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        4: this.$route.query[4],
                        5: 1,
                    })
                })
            } else if (value === 'second' && this.regularQuestions[4] !== 'option3') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        4: this.$route.query[4],
                        5: 0,
                    })
                })
            }

            if (this.$route.query[4] !== undefined && this.$route.query[5] !== undefined) {
                this.answersStep2 = true;
            }

        },

        sendit3(value) {

            if (value === 'first' && this.regularQuestions[5] === 'option2') {
                this.$router.replace({
                    params: {
                        id: 3
                    },
                    query: Object.assign({}, this.$route.query, {
                        6: 1,
                        7: this.$route.query[7],
                    })
                })
            } else if (value === 'first' && this.regularQuestions[5] !== 'option2') {
                this.$router.replace({
                    params: {
                        id: 3
                    },
                    query: Object.assign({}, this.$route.query, {
                        6: 0,
                        7: this.$route.query[7],
                    })
                })
            }
            if (value === 'second' && this.regularQuestions[6] === 'option3') {
                this.$router.replace({
                    params: {
                        id: 3
                    },
                    query: Object.assign({}, this.$route.query, {
                        6: this.$route.query[6],
                        7: 1,
                    })
                })
            } else if (value === 'second' && this.regularQuestions[6] !== 'option3') {
                this.$router.replace({
                    params: {
                        id: 3
                    },
                    query: Object.assign({}, this.$route.query, {
                        6: this.$route.query[6],
                        7: 0,
                    })
                })
            }

            if (this.$route.query[6] !== undefined && this.$route.query[7] !== undefined) {
                this.answersStep3 = true;
            }

        },
        preventNav(event) {
            event.preventDefault();
            event.returnValue = '';
        },
    }
};
</script>

<style lang="scss" scoped>
.questions-segment-1 {

    .page1,
    .page2,
    .page3 {
        .card {
            width: 80%;
            text-align: left;
        }
    }
}
</style>
