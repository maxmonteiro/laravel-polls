<template>
    <div>
        <h2>Enquetes</h2>
        <div class="list-scroll col-lg-8">
            <ul class="list-group" v-for="poll in polls" :key="poll.poll_id">
                <li class="list-group-item">
                    <span class="text-right">#{{ poll.poll_id }}</span>
                    <p>{{ poll.poll_description }}</p>
                    <span class="span-link">Ver status</span>
                </li>
            </ul>
        </div>
        <button class="btn btn-primary mt-2" @click.prevent="newPoll">Nova Enquete</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            polls: []
        }
    },
    mounted() {
        this.getPolls()
    },
    methods: {
        getPolls() {
            axios.get('polls')
            .then(({data}) => {
                this.polls = data
            }).catch((err) => {
                console.log(err)
            });
        },
        newPoll() {
            this.$router.push({ path: '/poll/add' })
        }
    }
}
</script>

<style scoped>
.list-scroll {
    height: 450px;
    overflow-y: auto;
}
.list-group-item {
    cursor: pointer;
    transition: background 200ms;
}
.list-group-item:hover {
    background-color: #eee;
}
.span-link {
    display: none;
    position: absolute;
    top: 36%;
    right: 20px;
    padding: 0 10px;
    color: #3498db;
    font-size: 14px;
    border-radius: 500px;
    transition: background 200ms;
    transition: display 200ms;
}
.span-link:hover {
    background: #3498db;
    color: #fff;
    padding: 0 10px;
}
.list-group-item:hover > .span-link {
    display: block;
}
</style>
