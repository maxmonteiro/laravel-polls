<template>
    <div>
        <h2>Status</h2>
        <form @submit.prevent="votePoll" class="mt-4 col-lg-8">
            <div class="form-group">
                <h5>{{ poll.poll_description }}</h5>
            </div>
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item" v-for="option in poll.options" :key="option.option_id">
                        <label class="form-check-label" for="">
                            {{ option.option_description }}
                        </label>
                    </li>
                </ul>
            </div>

            <div class="form-footer mt-4 text-right">
                <router-link to="/" class="btn btn-default">Cancelar</router-link>
                <button class="btn btn-primary">Votar</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            poll: {}
        }
    },
    mounted() {
        this.getPoll()
    },
    methods: {
        getPoll() {
            let poll_id = this.$route.params.id
            axios.get('poll/' + poll_id + '/stats')
            .then(({data}) => {
                this.poll = data
            }).catch((err) => {
                console.log(err)
            });
        }
    }
}
</script>

<style scoped>
form label {
    font-weight: 300;
}
</style>
