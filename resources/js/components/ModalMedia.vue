<template>
    <div>

        <div @click="toggleModal()">
            <slot>
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Apri
                </button>
            </slot>
        </div>

        <div v-if="showModal" class="fixed inset-0 z-40 bg-black opacity-90">
        </div>

        <div v-if="showModal" class="fixed inset-0 z-40 h-screen w-full" >
            <div class="fiex top-0 left-0 right-0 bg-red-500 w-full h-0">
                <button class="flex justify-center items-center p-0 ml-2 h-12 w-12 bg-gray-500 bg-opacity-50 z-50 text-gray-200 rounded-full mt-1 md:mt-2 xl:mt-6" @click="toggleModal()">X</button>
            </div>
            <div class="flex m-auto h-full w-5/6 justify-center items-center">
                <img class="mx-auto h-5/6 w-auto" 
                    src="/assets/img/error_banner.jpg"/>
            </div>
        </div>

    </div>
</template>

<script>

    export default{

        data() {
        
            return {

                showModal : false,

            }

        },

        methods: {

            toggleModal(){
                this.showModal= ! this.showModal;
            }

        },

    };

</script>
