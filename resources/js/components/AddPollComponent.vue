<template>
    <div>
        <h2>Nova Enquete</h2>
        <form @submit="createPoll" class="mt-4">
            <div class="form-group">
                <label for="">Descrição</label>
                <textarea type="text" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Alternativas</label>
                <ul class="list-group">
                    <li class="list-group-item d-flex">
                        <input type="text" class="form-control" id="inputOption">
                        <span class="input-span-add">
                            <i class="fa fa-plus"></i>
                        </span>
                    </li>
                    <li class="list-group-item">
                        Alternativa A
                        <span class="float-right close">
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

            }
        }
    },
    mounted() {

    },
    methods: {
        createPoll() {

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
