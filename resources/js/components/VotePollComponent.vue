<template>
    <div>
        <h2>Votar Enquete</h2>
        <form @submit.prevent="votePoll" class="mt-4 col-lg-8">
            <div class="form-group">
                <h3>{{ poll.poll_description }}</h3>
            </div>
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item" v-for="option in poll.options" :key="option.option_id">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                :value="option.option_id"
                                v-model="option_id">
                            <label class="form-check-label" for="">
                                {{ option.option_description }}
                            </label>
                        </div>
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
            poll: {},
            option_id: null
        }
    },
    mounted() {
        this.getPoll()
    },
    methods: {
        getPoll() {
            let poll_id = this.$route.params.id
            axios.get('poll/' + poll_id)
            .then(({data}) => {
                this.poll = data
            }).catch((err) => {
                console.log(err)
            });
        },
        votePoll() {
            if (this.option_id != null) {
                let poll_id = this.poll.poll_id
                let obj = {
                    option_id: this.option_id
                }
                axios.post('poll/' + poll_id + '/vote', obj)
                .then(({data}) => {
                    console.log('votação realizada.', data)
                    this.$router.push({ path: '/' })
                }).catch((err) => {
                    console.log(err)
                });
            } else {
                alert('Por favor, escolha uma opção!')
            }
        }
    }
}
</script>

<style scoped>
form label {
    font-weight: 300;
}
</style>
