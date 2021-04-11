<template>
<div class="row">
    <div class="card text-primary" style="width: 28em; letter-spacing: 0.08em">
        <div class="card-header" style="text-transform: uppercase">
            <strong v-if="this.$route.name === 'Success'">You have solved the quiz <span class="text-warning">successfully!</span></strong>
            <strong v-if="this.$route.name === 'Failed'">You have <span class="text-danger">'Failed'</span> solving the quiz. &#128533;</strong></div>

        <div v-if="this.$route.name === 'Success'" class="card-body">
            <h4 v-if="!emailSent" class="card-title">Subscribe for updates!</h4>
            <h4 v-if="emailSent" class="card-title">You have subscribed!</h4>
            <h5 class="card-subtitle" style="color: white;"><template v-if="!emailSent">or </template> <span @click="followMe" class="text-primary" style="text-decoration: underline; cursor: pointer">follow me</span></h5>
            <div class="row flex-center">
                <form v-if="!emailSent || emailError" @submit="formSubmit" method="post">
                    <input v-model="form.email" autocomplete="off" class="text-center margin-top flex-center" type="email" name="email" id="email" placeholder="enter your@email.com" minlength="5" size="45" />
                    <button name="submit" type="submit" :disabled="form.email.length > 4 && form.email.includes('@' && '.')? false : true" class="margin-top margin-left">Subscribe me</button>
                </form>
                <div v-if="emailError" class="margin-top text-danger">Error occured, try again.</div>
            </div>
            <br />
            <p class="modal-text">Read the blog post <a href="https://delovski.net/initio/blog-post-3.html"><span class="text-warning">"How to pass a javascript interview"</span></a></p>
        </div>

        <div v-if="this.$route.name === 'Failed'" class="card-body">
            <div class="row flex-center margin-bottom-small">
                <p class="margin-right text-warning"><b>{{ 6 - trueAnswers.length }} mistaken of 6</b></p><span v-if="this.failStep1">|</span>
                <p v-if="this.failStep1" style="cursor: pointer;" @click="startOver" class="modal-text margin-left"><b class="underline">Try solving again &#128521;</b></p>
            </div>
            <!-- subscribe if quiz can not re do think how will be presented, maybe in popup -->
            <h4 class="card-title">You can improve your knowledge by having this booklet!</h4>
            <br />
            <div class="row flex-center">
                <a href="https://gumroad.com/l/HkTmS/js-quiz-promo"><img src="../assets/book-cover.png" alt="js booklet" style="width: 100%; max-width: 400px;" /></a>
            </div>
            <h3 class="card-subtitle" style="color: white;">or</h3>
            <p class="modal-text">Read the blog post <a href="https://delovski.net/initio/blog-post-3.html"><span class="text-warning">"How to pass a javascript interview"</span></a></p>
        </div>
        <div class="card-footer">@Copyright <a class="text-primary" href="http://delovski.net"><b>Delovski.net</b></a></div>
    </div>
</div>
</template>

<script>
const querystring = require("querystring");
export default {
    name: "Subscribe",
    data() {
        return {
            followMenu: false,
            form: {
                email: '',
            },
            emailOutput: '',
            emailSent: false,
            emailError: false,
            failStep1: false,
            trueAnswers: []
        }
    },
    created() {
        if (this.$route.name === 'Failed') {
            if (localStorage.getItem('jsQuiz') && JSON.parse(localStorage.getItem('jsQuiz'))[0] === 'Advanced' && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Failed1') {
                this.failStep1 = true;
            } else if (localStorage.getItem('jsQuiz') && JSON.parse(localStorage.getItem('jsQuiz'))[0] === 'Advanced' && JSON.parse(localStorage.getItem('jsQuiz'))[1] === 'Failed2') {
                this.failStep1 = false
            }

            Object.values(this.$route.query).forEach((value) => {
                if (value === '1') {
                    this.trueAnswers.push(value);
                }
            });
        }

        if (this.$route.name === 'Success') {
            location.hash = '%F0%9F%8F%86'
        }

    },
    mounted() {
        if (this.$route.name === 'Failed') {
            this.$router.replace({
                query: ''
            })
            location.hash = '%F0%9F%91%8E';
        }
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            this.axios.post('https://js-quiz.delovski.net/send-email/send-email.php', querystring.stringify(this.form))
                .then(res => {
                    //Perform Success Action
                    this.emailSent = true;
                })
                .catch(error => {
                    // error.response.status Check status code
                    this.form.email = '';
                    this.emailError = true;
                }).finally(() => {
                    //Perform action in always
                });

        },
        followMe() {
            location.hash = '';
            location.hash = 'follow';
        },
        startOver() {
            location.reload();
        },
    }
};
</script>

<style lang="scss" scoped>
a,
a:visited {
    background-image: none;
}

.underline {
    padding-bottom: 2px;

    &:hover {
        border-bottom: 2px solid;
    }
}
</style>
