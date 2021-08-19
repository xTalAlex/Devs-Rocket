<template>
    <div>
        <div :class="clickableClass" @click="toggleModal()">
            <slot> 
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Apri
                </button>
            </slot>
        </div>

        <div v-if="showModal" class="fixed inset-0 z-50 bg-black opacity-90">
        </div>

        <div v-if="showModal" class="fixed inset-0 z-50 w-full p-2 h-screen overflow-hidden flex justify-center items-center" >
            <div class="flex flex-col max-w-3xl container max-h-screen">
                
                <div class="p-2 container">
                    <div class="inline-flex w-full justify-end md:justify-between">
                        <p class="hidden md:block text-center text-white text-xl">Descrizione</p>
                        <button @click="toggleModal()" class="outline-none focus:outline-none">
                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class=" overflow-auto max-h-screen w-full">
                    <img alt="Imagine" class="object-contain h-full w-full" src="/assets/img/error_banner.jpg">
                    </div>
                </div>

            </div>
        </div>

    </div>
    
</template>

<script>

    export default{

        props : ['clickableClass'],

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
