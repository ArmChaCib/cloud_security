<template>
    <div>
        <div class="card-header">
            asddasasd
        </div>
        <div class="card-body">
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
                    <span>
                        {{key.code}}
                    </span>
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
                    <span>{{email}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 justify-center-flex">
                    <button class="btn-style"
                            @click="getKey()"
                    >
                        Solicitar llave
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
            email: {
                type: String,
                required: true
            }
        },
        name: "request-key",
        data () {
            return {
                key: {}
            }
        },
        methods: {
            getKey() {
                axios.get('/api/get-key' )
                    .then((response) => {
                        this.key = response.data
                    }, (err) => {
                        console.log('Error al generar llave', err)
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