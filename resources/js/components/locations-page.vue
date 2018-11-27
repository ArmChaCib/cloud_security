<template>
    <div>
        <div class="card-header">
            asddasasd
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <span>Code</span><br>
                    <input type="text" v-model="code">
                </div>
                <div class="col-md-4">
                    <span>Long</span><br>
                    <input type="text" v-model="long">
                </div>
                <div class="col-md-4">
                    <span>Lat</span><br>
                    <input type="text" v-model="lat">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 justify-center-flex">
                    <img class="bd-img"
                         src="http://www.prologicwebdesign.com/wp-content/uploads/2015/07/Oracle-Database-support.png"
                         alt=""
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 flex-right">
                    <img class="arrow-img"
                         src="https://img.icons8.com/windows/1600/long-arrow-down.png"
                         alt=""
                    >
                </div>
                <div class="col-md-6 flex-left">
                    <img class="arrow-img"
                         src="https://img.icons8.com/windows/1600/long-arrow-up.png"
                         alt=""
                    >
                    <span v-if="place.name">
                        {{place.name}}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 justify-center-flex">
                    <button class="btn-style"
                            @click="getPlace()"
                    >
                        Ubicación
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: {

        },
        name: "request-key",
        data () {
            return {
                code:'',
                long: '',
                lat: '',
                place: {}
            }
        },
        methods: {
            getPlace () {
                let data = {
                    code: this.code,
                    long: this.long,
                    lat: this.lat
                }
                axios.post('/api/get-place', data )
                    .then((res) => {
                        this.place = res.data.place
                    }, (err) => {
                        console.log(err.response)
                        if(err.response.status){
                            alert(err.response.data)
                        }
                        console.log('Error al traer el lugar', err)
                    });
            }
        },
    }
</script>

<style scoped>
    .justify-center-flex {
        display: flex;
        justify-content: center;
    }
    .bd-img {
        height: 150px;
    }
    .flex-left{
        display: flex;
        justify-content: left;
    }
    .flex-right{
        display: flex;
        justify-content: flex-end;
    }
    .arrow-img{
        height: 250px;
    }

    .btn-style{
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }
</style>