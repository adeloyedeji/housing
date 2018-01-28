<template>
    <div>
        <div class="section"> 
            <div id="list-type" class="proerty-th-list">
                <!--Iteration starts here -->
                <div class="col-md-4 p0" v-for="ad in ads">
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a :href="'/ads/result/' + ad.slug" v-if="ad.adsImage[0]">
                                <img :src="ad.adsImage[0].image">
                            </a>
                            <a :href="'/ads/result/' + ad.slug" v-else>
                                <img src="/img/ads.jpg">
                            </a>
                        </div>
                        <div class="item-entry overflow">
                            <h5><a :href="'/ads/result/' + ad.slug"> {{ ad.title }} </a></h5>
                            <div class="dot-hr"></div>
                            <span class="pull-left"><b> Date :</b> {{ ad.created_at }} </span>
                            <span class="proerty-price pull-right"> N {{ ad.max_rent }}</span>
                            <p style="display: none;">
                                {{ ad.description }}
                            </p>
                            <div class="property-icon">
                                <img src="img/icon/bed.png"> {{ ad.max_bed }}
                                <img src="img/icon/shawer.png"> {{ ad.max_bath }}

                                <div class="dealer-action pull-right">                                        
                                    <a href="#" class="button">Edit </a>
                                    <a href="#" class="button delete_user_car" @click.prevent="delete_ad(ad.id)">Delete</a>
                                    <a :href="'/ads/result/' + ad.slug" class="button">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span v-if="!ads">
                    <h3>Welcome Authenticate user name</h3>
                    <h3>It looks quiet in here, click the "Post an ad" button above to get started...</h3>
                </span>                                           
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.get_ads()
        }, 
        methods: {
            get_ads() {
                axios.get("/ads/get_ads")
                     .then( (resp) =>  {
                         resp.data.forEach( (ad) => {
                             this.$store.commit("add_ad", ad)
                         })
                     })
            },
            delete_ad : function(id) {
                var n = new Noty({
                    text: 'This advert is going to be deleted?',
                    buttons: [
                        Noty.button('YES', 'btn btn-success', function () {
                            axios.get("/ads/delete_ad/" + id)
                                .then( (resp) => {
                                    console.log("Response from server: ")
                                    console.log(resp)
                                    this.$parent.$store.commit("delete_ad", {
                                        ad_id: resp.data
                                    })
                                    new Noty({
                                        type: 'success',
                                        layout: 'bottomLeft',
                                        text: 'Your ad has been deleted.'
                                    }).show()
                                    n.close()
                                } )
                        }, {id: 'button1', 'data-status': 'ok'}),

                        Noty.button('NO', 'btn btn-error', function () {
                            console.log('button 2 clicked')
                            n.close()
                        })
                    ]
                }).show();
            }, 
            store_delete_ad() {
                axios.get("/ads/delete_ad/" + id)
                    .then( (resp) => {
                        console.log("Response from server: ")
                        console.log(resp)
                        this.$store.commit("delete_ad", {
                            ad_id: resp.data
                        })
                        new Noty({
                            type: 'success',
                            layout: 'bottomLeft',
                            text: 'Your ad has been deleted.'
                        }).show()
                        n.close()
                    } )
            },
        },
        computed: {
            ads() {
                return this.$store.getters.all_ads
            }
        },
        mutations: {
            
        }
    }
</script>