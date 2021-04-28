<template>
<div id="app2" class="paper">
<!-- add on vmodel .lazy -->
    <div class="paper-container container-md">
        <nav class="border fixed split-nav" :style="[ this.countDown===0 ? {'pointer-events': 'none'} : '']">
            <div class="nav-brand text-primary">
                <h3 v-if="this.$route.path === '/start'" @click="goHome('else')">JS Quick Knowledge Quiz</h3>
                <h3 v-if="this.$route.path === '/'" @click="goHome('else')">JS Quick Knowledge Quiz</h3>
                <h3 v-if="this.$route.name === 'Success'" @click="goHome('finished')">JS Quick Knowledge Quiz</h3>
                <h3 v-if="hasFailedOnce() && this.$route.name === 'Failed'" @click="goHome('failed1')">JS Quick Knowledge Quiz</h3>
                <h3 v-if="hasFailedTwice() && this.$route.name === 'Failed'" @click="goHome('failed')">JS Quick Knowledge Quiz</h3>
                <h3 v-if="this.$route.name === 'QuestionsSegment1'" @click="goHome('onGoing')">JS Quick Knowledge Quiz</h3>
                <h3 v-if="this.$route.name === 'QuestionsSegment2'" @click="goHome('onGoing')">JS Quick Knowledge Quiz</h3>
            </div>
            <div class="collapsible">
                <input id="collapsible1" type="checkbox" name="collapsible1">
                <label for="collapsible1">
                    <div class="bar1">-</div>
                    <div class="bar2">-</div>
                    <div class="bar3">-</div>
                </label>
                <div class="collapsible-body">
                    <ul class="inline">
                        <li v-if="this.$route.name==='QuestionsSegment1' || this.$route.name==='QuestionsSegment2' || this.$route.path==='/start' || this.$route.path==='/'"><a href="javascript:;" @click="showRules" tabindex="-1">Rules</a></li>
                        <li v-else @click="followMe"><a href="javascript:;">Follow me!</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- //Modal time is up-->
    <label for="modal-1" style="visibility: hidden"></label>
    <input class="modal-state" id="modal-1" type="checkbox">
    <div class="modal">
        <label class="modal-bg" for="modal-1" :style="[ this.countDown===0 ? {'pointer-events': 'none'} : '']"></label>
        <div class="modal-body">
            <h4 class="modal-title">Your Time is UP!</h4>
            <br />
            <p class="modal-text">Would you like to start all over to solve the quiz ?</p>
            <br />
            <div class="row flex-spaces">
                <button class="btn-success-outline" style="cursor: pointer" @click="timerExpired('yes')">Yes, Sure.</button>
                <button class="btn-danger-outline" style="cursor: pointer" @click="timerExpired('no')">No, Thanks.</button>
            </div>
            <br />
            <p class="modal-text text-warning text-center"><strong>This booklet will help you pass a Javascript interview !</strong></p>
            <div class="row flex-center">
                <a href="https://gumroad.com/l/HkTmS/js-quiz-promo"><img src="./assets/book-cover.png" alt="js booklet" style="width: 100%; max-width: 400px;" /></a>
            </div>
        </div>
    </div>

    <!-- //Modal qr code-->
    <label for="modal-2" style="visibility: hidden"></label>
    <input class="modal-state" id="modal-2" type="checkbox">
    <div class="modal">
        <label class="modal-bg" for="modal-2"></label>
        <div class="modal-body" style="width: 18em;">
            <label class="btn-close" for="modal-2">X</label>
            <h4 class="modal-title">scan or click the qr code</h4>
            <br />
            <div class="row flex-spaces">
                <div style="border-radius:15px; border: 4px solid rgba(256, 256, 256, 0.4);">
                    <a href="http://delovski.net/qr" target="_blank"><img style="width: 160px; padding: 10px; border: 0; border-radius: 15px;" src="./assets/qr.png" alt="about me"></a>
                </div>
            </div>

        </div>
    </div>

    <!-- //Start rules-->
    <br />
    <div v-if="rules" class="row flex-center margin-top">
        <div class="card background-secondary" style="width: 20rem;">
            <div class="logo">
                <img src="./assets/js.png">
            </div>
            <div class="card-body text-primary">
                <h4 class="card-title">Welcome to the quick {{ hasLocalStorage ? 'advanced' : '' }} javascript Quiz!</h4>
                <br />
                <h5 class="card-subtitle"><span class="text-warning"><span v-if="!quizStarted">This Quiz Takes only <b>'2</b> minutes to finish</span><span v-else>You have {{countDown}} seconds to finish the quiz</span></span></h5>
                <br />
                <p class="card-text">By solving this quiz you will know if you are ready for a javascript interview</p>
                <template v-if="!quizStarted">
                    <router-link class="text-warning" style="cursor: pointer" tag="span" v-if="!hasLocalStorage" :to="{ name: 'QuestionsSegment1', params: {id: 1} }"><b>Start the Quiz</b></router-link>
                    <router-link class="text-warning" style="cursor: pointer" tag="span" v-else :to="{ name: 'QuestionsSegment2', params: {id: 1} }"><b>Start the Quiz</b></router-link>
                </template>
                <template v-else>
                    <a class="card-link" href="javascript:;" @click="showRules"><span class="text-warning">Close Rules</span></a>
                </template>
            </div>

        </div>
    </div>

    <router-view :advanced="hasLocalStorage" :timeIsUp="this.countDown===0 ? true : false" :key="$route.path" />
</div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            rules: true,
            quizStarted: false,
            countDown: 120,
            hasLocalStorage: false,
        }
    },

    created() {
        this.getLocalStorage();
        history.scrollRestoration = "manual";
        if (this.hasLocalStorage) {
            this.checkLocalStorageInterval();
        }
    },
    mounted() {
        if (this.$route.name === 'QuestionsSegment1' || this.$route.name === 'QuestionsSegment2') {
            this.$router.push('/');
        }

        if (JSON.parse(localStorage.getItem('jsQuiz')) && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Success') {
            this.$router.push({
                path: '/success'
            })
        }

        if (JSON.parse(localStorage.getItem('jsQuiz')) && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Failed2') {
            this.$router.push({
                path: '/failed'
            })
        }

        // disable right click
        document.body.addEventListener('contextmenu', event => event.preventDefault());

        const width  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (width <= 812) {
            window.scrollTo(0, 98);
        }
    },

    props: {
        advanced: {
            type: Boolean,
            required: false,
            default: false
        },
        timeIsUp: {
            type: Boolean,
            required: false,
            default: false
        }
    },

    methods: {
        showRules() {
            this.rules = !this.rules;
        },

        startTimer() {
            if (this.countDown > 0) {
                setTimeout(() => {
                    this.countDown -= 1
                    this.startTimer();
                }, 1000)
            }

            if (this.countDown === 0) {
                this.rules = false;
                document.querySelectorAll('[for="modal-1"]')[0].click();
            }
        },

        timerExpired(value) {
            document.querySelectorAll('[for="modal-1"]')[0].click();
            if (value === 'yes') {
                this.$router.push('/');
                this.countDown = 120;
                this.rules = true;
                this.quizStarted = false;
                this.getLocalStorage();
            } else {
                location.href = "http://delovski.net/initio/blog-post-3.html";
            }
        },

        getLocalStorage() {
            if (JSON.parse(localStorage.getItem('jsQuiz')) && JSON.parse(localStorage.getItem('jsQuiz'))[0] === 'Advanced') {
                this.hasLocalStorage = true;
            } else {
                this.hasLocalStorage = false;
            }
        },

        hasFailedOnce() {
            if (JSON.parse(localStorage.getItem('jsQuiz')) && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Failed1') {
                return true;
            } else {
                return false;
            }
        },

        hasFailedTwice() {
            if (JSON.parse(localStorage.getItem('jsQuiz')) && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Failed2') {
                return true;
            } else {
                return false;
            }
        },

        checkLocalStorageInterval() {
            setInterval(() => {
                this.getLocalStorage();
                if (!this.hasLocalStorage) {
                    location.href = "https://js-quiz.delovski.net";
                }
            }, 2000);
        },

        followMe() {
            location.hash = '';
            location.hash = 'follow';
        },

        goHome(value) {
            if (value === 'failed1') {
                this.$router.push('/');
                this.quizStarted = false;
                this.rules = true;
                this.countDown = -1;
                this.getLocalStorage();
            }
            if (value === 'finished') {
                alert('You have finished the quiz. You can not redo it! Subscribe for more interesting js quizes and related information.')
                return;
            }
            if (value === 'failed' && JSON.parse(localStorage.getItem('jsQuiz')) && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Failed2') {
                alert('You have failed the quiz. You can not redo it!')
                return;
            }
            if (value === 'onGoing' && this.quizStarted) {
                if (this.countDown === 0) {
                    return;
                }

                if (confirm('The quiz is ongoing: are you sure you want to go to start screen?')) {
                    this.$router.push('/');
                    this.quizStarted = false;
                    this.rules = true;
                    this.countDown = 120;
                    this.getLocalStorage();
                } else {
                    return;
                }
                return;
            }
        }
    },
    watch: {
        '$route'(to, from) {
            if (to !== from) {
                if (to.name === 'QuestionsSegment1') {
                    this.quizStarted = true;
                    this.rules = false;
                    if (this.countDown === 120) {
                        this.startTimer();
                    }

                } else if (to.name === 'QuestionsSegment2') {
                    this.quizStarted = true;
                    this.rules = false;
                    if (this.countDown === 120) {
                        this.startTimer();
                    }
                    this.checkLocalStorageInterval();
                }
                // else if (to.name === 'Booklet') {
                //     this.quizStarted = false;
                //     this.rules = false;
                //     this.countDown = -1;
                // } 
                else if (to.name === 'Failed') {
                    this.quizStarted = false;
                    this.rules = false;
                    this.countDown = -1;
                    this.checkLocalStorageInterval();
                    if (to.hash === '#follow') {
                        document.querySelectorAll('[for="modal-2"]')[0].click();
                    }
                } else if (to.name === 'Success') {
                    this.quizStarted = false;
                    this.rules = false;
                    this.countDown = -1;
                    this.checkLocalStorageInterval();
                    if (to.hash === '#follow') {
                        document.querySelectorAll('[for="modal-2"]')[0].click();
                    }
                }
                // this.$router.currentRoute
                // return to.name === null ? this.routeActiveTitle = '' : ''
            }
        }
    }
}
</script>

<style lang="scss">
* {
    outline: 0;
}

#app2 {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
    min-height: 600px;
    -webkit-touch-callout: none;
    /* iOS Safari */
    -webkit-user-select: none;
    /* Safari */
    -khtml-user-select: none;
    /* Konqueror HTML */
    -moz-user-select: none;
    /* Firefox */
    -ms-user-select: none;
    /* Internet Explorer/Edge */
    user-select: none;
    /* Non-prefixed version, currently supported by Chrome and Opera */

    .logo {
        width: 60px;
        height: 60px;
        position: absolute;
        left: 0;
        top: 0;
    }

    .nav-brand h3,
    ul.inline a {
        transition: color 0.3s ease-in-out;

        &:hover {
            color: #ddcd45;
            cursor: pointer;
        }
    }

    .nav-brand h3 {
        @media only screen and (max-width: 768px) {
            padding-right: 58px;
        }
    }

    .bar1,
    .bar2,
    .bar3 {
        margin: 3px 0;
    }

    .modal {
        overflow-y: auto;
    }

    .modal-body {

        @media only screen and (max-width: 768px) {
            margin-top: 7.2rem;
        }

        @media only screen and (orientation: landscape) and (max-width: 812px)  {
            margin-top: 13rem;
        }
    
        a {
            background-image: none;
        }
    }
}
</style>
