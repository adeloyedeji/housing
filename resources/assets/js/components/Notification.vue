<template>
    <div>
        
    </div>
</template>

<script>
export default {
    props: [
        'id'
    ],
    mounted() {
        this.listen()
    }, 
    methods: {
        listen() {
            Echo.private('App.User.' + this.id)
                .notification( (data) => {
                    if(data.type == "App\\Notifications\\NewMessageNotification") {
                        this.$store.commit("push_message", data)
                        document.getElementById("noty_audio").play()
                    } else {
                        new Noty({
                            type: 'success',
                            layout: 'bottomLeft',
                            text: data.message
                        }).show();
                        this.$store.commit("add_notification", data)
                        document.getElementById("noty_audio").play()
                    }
                })
        }
    }
}
</script>
