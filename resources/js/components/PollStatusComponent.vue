<template>
    <div>
        <h2>Enquete Status</h2>
        <form action="" class="mt-4 col-lg-8">
            <div class="form-group">
                <h5>{{ poll.poll_description }}</h5>
            </div>
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item" v-for="option in options" :key="option.option_id">
                        <label for="">
                            {{ option.description }}
                        </label>
                        <span class="float-right">{{ option.qty }} {{ option.qty == 1 ? 'voto' : 'votos' }}</span>
                    </li>
                </ul>
            </div>
            <p>{{ poll.views }} visualizações</p>
            <div class="form-footer mt-4 text-right">
                <router-link to="/" class="btn btn-primary">Voltar</router-link>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            poll: {},
            options: []
        }
    },
    created() {
        this.getPoll()
    },
    methods: {
        getPoll() {
            let poll_id = this.$route.params.id
            axios.get('poll/' + poll_id + '/stats')
            .then(({data}) => {
                this.poll.poll_description = data.poll_description
                this.poll.views = data.views
                data.votes.map(value => {
                    axios.get('option/' + value.option_id)
                    .then(({data}) => {
                        value.description = data.option_description
                        this.options.push(value)
                    }).catch((err) => {
                        console.log(err)
                    });
                })
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
