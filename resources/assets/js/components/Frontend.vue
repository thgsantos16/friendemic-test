<template>
    <div class="content">
        <div class="title m-b-md" v-if="submittedtext == 'not set'">
            Friendemic Reverse String:

            <form method="post" action="reversed">
                <input type="hidden" name="_token" :value="token">

                <div class="form-group">
                    <input placeholder="Enter word to be reversed" name="text" type="text" class="form-control" v-model="text">
                    <button :disabled="text == ''" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <small v-if="text != ''">The current reversed text is: <span>{{ reversed(text) }}</span></small>
        </div>
        <div class="title m-b-md" v-else>
            <small>Friendemic Result:</small>

            <strong>{{ reversed(submittedtext)}}</strong>

            <small>The original string was: <span>{{ submittedtext }}</span>
                <div>(<a href="/">Back to the start</a>)</div>
            </small>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ "token", "submittedtext" ],
        mounted() {
            console.log(this.submittedtext)
        },
        data() {
            return {
                text: ""
            }
        },
        methods: {
            reversed(word, type = 0) {
                if(type == 0) return word.split("").reverse().join("")
                else if(type == 1) {
                    word = word.split(" ")
                    var tmp = word
                    
                    if(tmp.length > 1) {
                        tmp.forEach((element, index) => {
                            word[index] = element.split("").reverse().join("")
                        })

                        return word.join(" ")
                    }

                    else return word[0].split("").reverse().join("")
                }
            }
        }
    }
</script>

<style scoped lang="scss">

    input {
        font-weight: 400;
    }

    strong {
        font-size: 110%;
        display: block;
    }

    small {
        font-size: 43%;

        div {
            font-weight: 400;
            font-size: 52%;

            a {
                display: inline-block;
                margin: 0 7px;
                color: #186ead;
            }
        }

        span {
            color: #186ead;
            font-weight: 500;
        }
    }
</style>
