<template>
<div v-if="this.$route.name==='QuestionsSegment2'" class="questions-segment-2">

    <quiz-nav />

    <section v-if="this.$route.params.id===1" class="page1">
        <div class="row flex-center text-primary">
            <div class="card">
                <div class="card-body">
                    <h4>1) Question:</h4>
                    <div class="padding-left-large margin-top-small">
                        <div class="row flex-middle">
                            Write the javascript comparison operator for a variable to be not equal by its type and value <input v-model="regularQuestions[0]" @input="regularQuestions[0]=$event.target.value.toLowerCase(), sendit('first')" type="text" placeholder="..." id="1stAnswer1" class="margin-left-small margin-right-small" maxlength="3" size="5" tabindex="1">
                        </div>
                    </div>
                    <h4>2) Question:</h4>
                    <div class="padding-left-large margin-top">
                        <fieldset class="form-group">
                            <legend>What is the short well known abbreviation for ‘Immediately Invoked Function Expression‘ – which is a JavaScript function that runs as soon as it is defined:</legend>
                            <label for="2ndAnswer1" class="paper-radio" tabindex="2" @change="sendit('second')">
                                <input v-model="regularQuestions[1]" type="radio" name="2ndAnswer1" id="2ndAnswer1" value="option1"> <span>JSON</span>
                            </label>
                            <label for="2ndAnswer2" class="paper-radio" tabindex="3" @change="sendit('second')">
                                <input v-model="regularQuestions[1]" type="radio" name="2ndAnswer2" id="2ndAnswer2" value="option2"> <span>IIFE</span>
                            </label>
                            <label for="2ndAnswer3" class="paper-radio" tabindex="4" @change="sendit('second')">
                                <input v-model="regularQuestions[1]" type="radio" name="2ndAnswer3" id="2ndAnswer3" value="option3"> <span>EVAL</span>
                            </label>
                        </fieldset>
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
                            What are ‘Dictionaries’ - are objects with <input v-model="regularQuestions[2]" @input="regularQuestions[2]=$event.target.value.toLowerCase(), sendit2('first')" type="text" placeholder="..." id="3rdAnswer1" class="margin-left-small margin-right-small" maxlength="4" size="5" tabindex="5"> and <input v-model="regularQuestions[3]" @input="regularQuestions[3]=$event.target.value.toLowerCase(), sendit2('second')" type="text" placeholder="..." id="3rdAnswer2" class="margin-left-small margin-right-small" maxlength="6" size="6" tabindex="6">
                        </div>
                    </div>
                    <h4>4) Question:</h4>
                    <div class="padding-left-large margin-top-small">
                        <div class="row flex-middle">
                            What is the well know short abbreviation for JavaScript Object Notation <input v-model="regularQuestions[4]" @input="regularQuestions[4]=$event.target.value.toLowerCase(), sendit2('third')" type="text" placeholder="..." id="4thAnswer1" class="margin-left-small margin-right-small" maxlength="4" size="5" tabindex="6">
                        </div>
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
                            <legend>If we want to write into the HTML output we will do that with:</legend>
                            <label for="5thAnswer1" class="paper-radio" tabindex="11" @change="sendit3('first')">
                                <input v-model="regularQuestions[5]" type="radio" name="5thAnswer1" id="5thAnswer1" value="option1"> <span>window.alert(‘this will be the javascript output’);</span>
                            </label>
                            <label for="5thAnswer2" class="paper-radio" tabindex="12" @change="sendit3('first')">
                                <input v-model="regularQuestions[5]" type="radio" name="5thAnswer2" id="5thAnswer2" value="option2"> <span>console.log(‘this will be the javascript output’);</span>
                            </label>
                            <label for="5thAnswer3" class="paper-radio" tabindex="13" @change="sendit3('first')">
                                <input v-model="regularQuestions[5]" type="radio" name="5thAnswer3" id="5thAnswer3" value="option3"> <span>document.write(‘this will be the javascript output’);</span>
                            </label>
                        </fieldset>
                    </div>
                    <h4>6) Question:</h4>
                    <div class="padding-left-large margin-top">
                        <fieldset class="form-group">
                            <legend>To debug a javascript we need to use the statement:</legend>
                            <label for="6thAnswer1" class="paper-radio" tabindex="14" @change="sendit3('second')">
                                <input v-model="regularQuestions[6]" type="radio" name="6thAnswer1" id="6thAnswer1" value="option1"> <span>console.log(‘something to debug’);</span>
                            </label>
                            <label for="6thAnswer2" class="paper-radio" tabindex="15" @change="sendit3('second')">
                                <input v-model="regularQuestions[6]" type="radio" name="6thAnswer2" id="6thAnswer2" value="option2"> <span>debugger;</span>
                            </label>
                            <label for="6thAnswer3" class="paper-radio" tabindex="16" @change="sendit3('second')">
                                <input v-model="regularQuestions[6]" type="radio" name="6thAnswer3" id="6thAnswer3" value="option3"> <span>try…catch</span>
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
    name: "QuestionsSegment2",
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
            if (value === 'first' && this.regularQuestions[0] === '!==') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: 1,
                        2: this.$route.query[2],
                    }
                })
            } else if (value === 'first' && this.regularQuestions[0] != '!==') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: 0,
                        2: this.$route.query[2],
                    }
                })
            }
            if (value === 'second' && this.regularQuestions[1] === 'option2') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: this.$route.query[1],
                        2: 1,
                    }
                })
            } else if (value === 'second' && this.regularQuestions[1] !== 'option2') {
                this.$router.replace({
                    params: {
                        id: 1
                    },
                    query: {
                        1: this.$route.query[1],
                        2: 0,
                    }
                })
            }
            if (this.$route.query[1] !== undefined && this.$route.query[2] !== undefined) {
                this.answersStep1 = true;
            }
        },

        sendit2(value) {
            if (value === 'first' && this.regularQuestions[2] === 'keys') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        3: 1,
                        4: this.$route.query[4],
                        5: this.$route.query[5],
                    })
                })
            } else if (value === 'first' && this.regularQuestions[2] !== 'keys') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        3: 0,
                        4: this.$route.query[4],
                        5: this.$route.query[5],
                    })
                })
            }
            if (value === 'second' && this.regularQuestions[3] === 'values') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        3: this.$route.query[3],
                        4: 1,
                        5: this.$route.query[5],
                    })
                })
            } else if (value === 'second' && this.regularQuestions[3] !== 'values') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        3: this.$route.query[3],
                        4: 0,
                        5: this.$route.query[5],
                    })
                })
            }
            if (value === 'third' && this.regularQuestions[4] === 'json') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        3: this.$route.query[3],
                        4: this.$route.query[4],
                        5: 1,
                    })
                })
            } else if (value === 'third' && this.regularQuestions[4] !== 'json') {
                this.$router.replace({
                    params: {
                        id: 2
                    },
                    query: Object.assign({}, this.$route.query, {
                        3: this.$route.query[3],
                        4: this.$route.query[4],
                        5: 0,
                    })
                })
            }

            if (this.$route.query[3] !== undefined && this.$route.query[4] !== undefined && this.$route.query[5] !== undefined) {
                this.answersStep2 = true;
            }

        },

        sendit3(value) {

            if (value === 'first' && this.regularQuestions[5] === 'option3') {
                this.$router.replace({
                    params: {
                        id: 3
                    },
                    query: Object.assign({}, this.$route.query, {
                        6: 1,
                        7: this.$route.query[7],
                    })
                })
            } else if (value === 'first' && this.regularQuestions[5] !== 'option3') {
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
            if (value === 'second' && this.regularQuestions[6] === 'option2') {
                this.$router.replace({
                    params: {
                        id: 3
                    },
                    query: Object.assign({}, this.$route.query, {
                        6: this.$route.query[6],
                        7: 1,
                    })
                })
            } else if (value === 'second' && this.regularQuestions[6] !== 'option2') {
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
.questions-segment-2 {

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
