<template>
    <div>
        <div :class="mergedClickableClass" @click="toggleModal()">
            <slot> 
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Apri
                </button>
            </slot>
        </div>

        <div v-if="showModal" class="fixed inset-0 z-40 h-screen bg-black opacity-90">
        </div>

        <div v-if="showModal" class="fixed inset-0 z-50 w-full p-2 h-screen overflow-hidden flex justify-center items-center" >
            <div class="container relative max-w-3xl max-h-screen pb-2 py-2 overflow-y-auto scrollbar-thin">
                
                <div class="sticky -top-2 z-50 inline-flex w-full items-start justify-end sm:justify-between bg-black bg-opacity-70 shadow px-2 pb-2">
                    <p class="w-full mr-4 p-2 text-left text-white text-md opacity-80 break-word">
                        <span class="font-black">{{ curElement.title }}</span> - {{ curElement.description }}
                    </p>
                    <button @click="toggleModal()" class="outline-none focus:outline-none">
                        <i class="fas fa-times fill-current text-white w-18 h-18"></i>
                    </button>
                </div>
                <div class="relative h-full w-full bg-gray-200">
                    <img alt="Immagine" class="object-contain w-full" :src="curElement.image">  

                    <div class="absolute inset-0 container flex mx-auto group"
                        v-if="elements.length>1"
                    >
                        <div class="absolute left-0 top-0 flex items-center justify-center w-10 h-full bg-black bg-opacity-0 group-hover:bg-opacity-30 hover:shadow-xl cursor-pointer"
                            
                            @click="previousElement()"
                        >
                            <i class="fas fa-chevron-left text-white opacity-30 text-lg"></i>
                        </div>

                        <div class="absolute right-0 top-0 flex items-center justify-center w-10 h-full bg-black bg-opacity-0 group-hover:bg-opacity-30 hover:shadow-xl cursor-pointer"
                            
                            @click="nextElement()"
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
            elements : {
                type : Array,
                required : true,
            },
        },

        data() {
        
            return {

                showModal : false,

                elementIndex : 0,

            }

        },

        computed : {

            mergedClickableClass(){
                return this.clickableClass + ' cursor-pointer';
            },

            curElement(){
                return this.elements[this.elementIndex];
            }

        },

        methods: {

            toggleModal(){
                this.showModal= ! this.showModal;
                this.elementIndex = 0;
            },

            nextElement(){
                this.elementIndex=(this.elementIndex+1)%this.elements.length;
            },

            previousElement(){
                this.elementIndex=(this.elementIndex-1+this.elements.length)%this.elements.length;
            },

        },

    };

</script>
