<template>
    <Transition name="slide-fade"> 

        <div v-if="visible" class="fixed top-0 right-0 mx-6 mt-2 lg:mt-24 z-50 overflow-hidden">

            <div
                class="bg-red-200 text-gray-600 rounded-lg shadow-md p-6 pr-4 inline-flex lg:max-w-xl"
                :class="{
                    'bg-red-200': type === 'error',
                    'bg-yellow-200': type === 'warning',
                    'bg-green-200': type === 'success',
                }"
            >
                <button class="opacity-75 cursor-pointer absolute top-0 right-0 py-2 px-3 hover:opacity-100"
                    @click.prevent="close()"
                >×</button>

                <div class="flex items-center">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell"></i>
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">{{ label }}</b> {{ message }}
                    </span>
                </div>

            </div>

        </div>  
    </Transition>
</template>

<script>

    export default {

        name: "flash-message",

        props : {
            type : {
                required : true,
                type : String,
            },

            message : {
                required : true,
                type : String,
            }
        },

        data() {

            return {
                visible : this.type ? true : false,
            }

        },


        computed : {

            label(){
                var text='';
                switch(this.type){
                    case('success'): 
                        text='OK!';
                        break;
                    case('warning'): 
                        text='Attenzione!';
                        break;
                    case('error'): 
                        text='Oh no!';
                        break;
                }

                return text;
            }

        },

        methods : {

            close(){
                this.visible=false;
            }

        },

        mounted() {

            var timer;
            clearTimeout(timer);
            timer=setTimeout(() => {
                this.visible = false;
            }, 10000);

        },

    }

</script>

<style scoped>

    .slide-fade-enter-active,

    .slide-fade-leave-active {
    transition: all 0.4s;
    }

    .slide-fade-enter,

    .slide-fade-leave-to {
    transform: translateX(400px);
    opacity: 0;
    }

</style>