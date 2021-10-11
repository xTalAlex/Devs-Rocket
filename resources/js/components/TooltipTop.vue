<template>
  <div class="inline-flex flex-wrap">
    <div class="w-full text-center">

        <div ref="slotRef" @mouseenter="toggleTooltip()" @mouseleave="toggleTooltip()">
            <slot></slot>
        </div>

        <div ref="tooltipRef" v-bind:class="{'hidden': !tooltipShow, 'block': tooltipShow}" class="bg-gray-700 border-0 block z-50 font-normal leading-normal text-sm max-w-xs text-left no-underline break-words rounded-lg">
            <div>
                <div v-show="title" class="bg-gray-900 text-white opacity-90 font-semibold p-3 mb-0 border-b border-solid border-blueGray-100 uppercase rounded-t-lg">
                    {{ title }}
                </div>

                <div v-show="value" class="text-gray-300 p-3 normal-case  ">
                    {{ value }}
                </div>
            </div>
        </div>

    </div>
  </div>
</template>

<script>

import { createPopper } from "@popperjs/core";

export default {

  name: "tooltip-top",

  props : ['title','value'],

  data() {

    return {
      tooltipShow: false
    }

  },

  methods: {

    toggleTooltip: function(){

      if(this.tooltipShow){
        this.tooltipShow = false;
      } else {
        this.tooltipShow = true;
        createPopper(this.$refs.slotRef, this.$refs.tooltipRef, {
          placement: "top"
        });
      }

    }

  }
}
</script>