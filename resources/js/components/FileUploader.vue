<template>
    <label class="bg-gray-900 opacity-80 hover:opacity-100 text-white text-sm font-bold px-3 py-2 rounded w-full inline-flex items-center shadow tracking-wide cursor-pointer">
        <i class="fas fa-arrow-up"></i>
        <span class="ml-2 w-full">
            {{ curLabel }}
        </span>
        <input
            class="hidden"
            type="file"
            :name="name"
            :accept="accept"
            @change="onFileChange"
        >
    </label>
</template>

<script>
  export default {

    name: "file-uploader",

    props : ['accept','name','label'],

    data() {

      return {
          curLabel : this.label,
      }

    },

    computed :{

    },

    methods: {
        
        onFileChange(event){
            if(event.target.files[0])
                this.curLabel=(event.target.files[0].name);
            else
                this.curLabel=this.label;
        }
        
    },

  }
</script>
