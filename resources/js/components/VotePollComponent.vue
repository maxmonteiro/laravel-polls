<template>
    <div>
        <h2>Votar Enquete</h2>
        <form @submit.prevent="votePoll" class="mt-4 col-lg-8">
            <div class="form-group">
                <h3>Descricao</h3>
            </div>
            <div class="form-group">
                <ul class="list-group">

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
            axios.get('poll/' + poll_id)
            .then(({data}) => {
                console.log('poll.', data)
            }).catch((err) => {
                console.log(err)
            });
        },
        votePoll() {

        }
    }
}
</script>

<style scoped>

</style>
