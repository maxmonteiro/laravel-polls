<template>
    <div>
        <h2>Nova Enquete</h2>
        <form @submit.prevent="createPoll" class="mt-4 col-lg-8">
            <div class="form-group">
                <label for="">Descrição</label>
                <textarea type="text" class="form-control" required
                    v-model="form.poll_description"
                ></textarea>
            </div>
            <div class="form-group">
                <label for="">Alternativas</label>
                <ul class="list-group">
                    <li class="list-group-item d-flex">
                        <input type="text" class="form-control" id="inputOption" placeholder="descrição da alternativa"
                            v-model="new_option"
                        />
                        <span class="input-span-add">
                            <i class="fa fa-plus" @click="addOption"></i>
                        </span>
                    </li>
                    <li v-for="(option, index) in options" :key="index" class="list-group-item">
                        {{ option }}
                        <span class="float-right close" @click="removeOption(option)">
                            <i class="fa fa-close"></i>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="form-footer mt-4 text-right">
                <router-link to="/" class="btn btn-default">Voltar</router-link>
                <button class="btn btn-primary">Incluir</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                poll_description: ''
            },
            new_option: '',
            options: [
                //'alternativa A'
            ]
        }
    },
    mounted() {

    },
    methods: {
        addOption() {
            this.options.push(this.new_option)
            this.new_option = ''
        },
        removeOption(obj) {
            this.options.splice(this.options.indexOf(obj), 1)
        },
        createPoll() {
            if (this.options.length < 2) {
                alert('Informe pelo menos 2 alternativas!')
            } else {
                let new_poll = {
                    'poll_description': this.form.poll_description,
                    'options': this.options
                }
                axios.post('poll', new_poll)
                .then(({data}) => {
                    console.log('adicionado.', data)
                    this.$router.push({ path: '/' })
                }).catch((err) => {
                    console.log(err)
                });
            }
        }
    }
}
</script>

<style scoped>
.input-span-add {
    cursor: pointer;
    padding-left: 10px;
    align-self: center;
    font-size: 1.3rem;
    color: #2ecc71;
}
</style>
