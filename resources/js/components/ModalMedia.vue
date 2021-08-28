<template>
    <div>
        <div :class="mergedClickableClass" @click="toggleModal()">
            <slot> 
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Apri
                </button>
            </slot>
        </div>

        <div v-if="showModal" class="fixed inset-0 z-40 bg-black opacity-90">
        </div>

        <div v-if="showModal" class="fixed inset-0 z-50 w-full p-2 h-screen overflow-hidden flex justify-center items-center" >
            <div class="container relative max-w-3xl max-h-screen pb-2 md:py-2 overflow-y-auto scrollbar-thin">
                
                <div class="sticky -top-2 z-50 inline-flex w-full items-center justify-end md:justify-between h-8 bg-black bg-opacity-70 shadow px-2">
                    <p class="hidden md:block text-center text-white text-xl">Descrizione</p>
                    <button @click="toggleModal()" class="outline-none focus:outline-none">
                        <i class="fas fa-times fill-current text-white w-18 h-18"></i>
                    </button>
                </div>
                <div class="relative h-full w-full bg-gray-200">
                    <img alt="Imagine" class="object-contain w-full" :src="curImage">  

                    <div class=" absolute inset-0 container flex mx-auto">
                        <div class="absolute left-0 top-0 flex items-center justify-center w-10 h-full bg-black bg-opacity-0 hover:bg-opacity-30 hover:shadow-xl cursor-pointer"
                            
                            @click="previousImage()"
                        >
                            <i class="fas fa-chevron-left text-white opacity-30 text-lg"></i>
                        </div>

                        <div class="absolute right-0 top-0 flex items-center justify-center w-10 h-full bg-black bg-opacity-0 hover:bg-opacity-30 hover:shadow-xl cursor-pointer"
                            
                            @click="nextImage()"
                        >
                            <i class="fas fa-chevron-right text-white opacity-30  text-lg"></i>
                        </div>
                    </div> 

                </div>

            </div>
        </div>

    </div>

</template>

<script>

    export default{

        props : {
            clickableClass : {
                type : String,
                default : '',
            },
            images : {
                type : Array,
                required : true,
            },
        },

        data() {
        
            return {

                showModal : false,

                imageIndex : 0,

            }

        },

        computed : {

            mergedClickableClass(){

                return this.clickableClass + ' cursor-pointer';

            },

            curImage(){

                return this.images[this.imageIndex];

            },

        },

        methods: {

            toggleModal(){
                this.showModal= ! this.showModal;
                this.imageIndex = 0;
            },

            nextImage(){
                // if(this.imageIndex<(this.images.length-1))
                //     this.imageIndex++; 
                this.imageIndex=(this.imageIndex+1)%this.images.length;
                
            },

            previousImage(){
                // if(this.imageIndex>0)
                //     this.imageIndex--;
                this.imageIndex=(this.imageIndex-1+this.images.length)%this.images.length;
            },

        },

    };

</script>
