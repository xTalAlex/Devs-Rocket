<template>
  <div>
    <a
      class="active:bg-pink-600 uppercase font-bold hover:shadow-md cursor-pointer shadow text-md px-2 py-1 rounded sm:mr-2 mb-1"
      type="button"
      style="transition: all 0.15s ease 0s;"
      @click="toggleModal()"
    >
        <i class="fas fa-cog w-full h-full"></i> 
    </a>
    
    <div v-if="showModal" class="opacity-80 fixed inset-0 z-50 bg-black"></div>

    <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative p-5 flex flex-col w-full bg-gray-300 outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5  rounded-t">
            <h3 class="text-3xl font-semibold">
              Modifica il profilo
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-90 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" v-on:click="toggleModal()">
              <span class=" text-gray-900 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto">
            <form class="mb-4 text-blueGray-500 flex-row text-left text-lg leading-relaxed" @submit.prevent="submit()" >

                <div class="mb-2">
                  <label  class="block uppercase text-gray-700 text-xs font-bold mb-2">Avatar</label>
                    <span class=" text-gray-900 h-6 w-6 text-xl block ml-14 -mb-2 outline-none focus:outline-none cursor-pointer"
                      @click="removeAvatar=1"
                    >
                      ×
                    </span>
                    <img class="inline object-cover w-16 h-16 mr-2 rounded-full ring-2 ring-gray-900" :src="showedAvatar" alt="Avatar"
                      @click="addFiles()"
                    />
                    <input type="file" class="hidden border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                          style="transition: all 0.15s ease 0s;"
                          ref="newAvatar"
                          @change="handleFileUpload()"
                    > 
                </div>

                <div class="mb-2">
                  <label  class="block uppercase text-gray-700 text-xs font-bold mb-2">Biografia</label>
                  <textarea maxlength="300" class="resize-none border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full h-32
                    overflow-y-scroll overscroll-y-auto scrollbar-thin scrollbar-thumb-gray-900"
                    style="transition: all 0.15s ease 0s;"  v-model="biography"></textarea>
                </div>

                <div class="mb-2">
                  <label class="block uppercase text-gray-700 text-xs font-bold mb-2">Social</label>
                  <div class="h-32 overflow-y-auto overscroll-y-auto scrollbar-thin scrollbar-thumb-gray-900 px-4">
                    <div v-for="social in socials" :key="social.id" class="flex-row mt-1 w-full">
                      <i class="fab fa-facebook"></i>
                      <input type="text" 
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        :placeholder="social.description"
                        style="transition: all 0.15s ease 0s;" />
                    </div>
                  </div>
                </div>

            </form>
          </div>
          <!--footer-->
          <div class="flex items-center justify-end p-6 rounded-b">
            <button class="text-gray-900 bg-transparent border border-solid border-gray-900 hover:bg-gray-900 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" @click="toggleModal()">
              Chiudi
            </button>
            <button class="text-gray-900 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" 
              @click="submit()"
            >
              Salva
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {

    name: "modal",

    props : ['user','socials'],

    data() {

      return {
        showModal: false,

        newAvatar: '',
        removeAvatar : 0, //deve essere 1/0 perché formData non accetta true/false
        biography : this.user.biography,

      }

    },

    computed :{

        showedAvatar() {
            var url='/assets/img/no_avatar.png';
            if(this.newAvatar && !this.removeAvatar) 
                url=URL.createObjectURL(this.newAvatar)
            else if(this.user.avatar && !this.removeAvatar)
                url=this.user.avatar;
            return url;
        },

    },

    methods: {

      addFiles(){
        this.$refs.newAvatar.click();
      },

      handleFileUpload(){
        this.newAvatar = this.$refs.newAvatar.files[0];
        this.removeAvatar = 0;
      },

      toggleModal(){
        this.showModal = !this.showModal;
        if(!this.showModal)
          this.close();
      },

      close(){
        this.newAvatar='';
        this.removeAvatar=0;
        this.biography=this.user.biography;
      },

      submit(){
        let formData = new FormData();

        if(this.newAvatar && !this.removeAvatar)
          formData.append('newAvatar', this.newAvatar);
        formData.append('removeAvatar', this.removeAvatar);
        if(this.biography && this.biography.trim())
          formData.append('biography', this.biography);
        
        axios.post('/profile/update',
            formData,
            {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
          }
        )
        .then((response) => {
          window.location.reload();
        })
        .catch((error) => {
          console.log(error);
        });
      },

    },

  }
</script>