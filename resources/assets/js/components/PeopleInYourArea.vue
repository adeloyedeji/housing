<template>
    <div>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Total</span>
            <span class="badge badge-secondary badge-pill">{{ people.length }}</span>
        </h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <span v-for="user in people">
                    <span v-if="user.id != auth.id">
                        <a :href="'/messaging/chat/'+user.profile.phone">
                            <img :src="'http://house/'+user.image" class="img-circle uimg" :title="user.fname + ' ' + user.lname">
                        </a>
                    </span>
                </span> 
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            auth: [],
            people: [],
        }
    },
    mounted() {
        this.get_auth_user_data()
        this.get_people_in_your_area()
    }, 
    methods: {
        get_auth_user_data() {
            axios.get('/get_auth_user_data')
                 .then( (resp) => {
                     this.auth = resp.data
                 })
        },
        get_people_in_your_area() {
            alert("Getting people nearby...")
            axios.get('/get-people-nearby/' + this.auth.id)
                 .then( (resp) => {
                     resp.data.forEach( (p) => {
                        console.log("Initializing....complete")
                        this.people.push(p)
                     })
                 })
        }
    }
}
</script>

<style>
    .uimg {
        width:55px;
        height:50px;
        margin-right: .5em;
        transition: ease-in .5s;
    }
    .uimg:hover {
        width: 70px;
    }
    .un {
        font-size: 11px;
    }
</style>
