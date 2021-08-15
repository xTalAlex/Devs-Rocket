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

    <div v-if="showModal" class="fixed z-50 inset-0  mx-auto max-w-xl outline-none focus:outline-none px-2 h-screen overflow-scroll scrollbar">
      <div class=" w-full mx-auto my-1 xl:my-6 ">
        <!--c ontent-->
        <div class="border-0 rounded-lg shadow-lg relative p-5 flex flex-col w-full bg-gray-300 outline-none focus:outline-none h-full">
          <!--header-->
          <div class="flex items-start justify-between p-5 rounded-t">
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
            <form class="mb-4 flex-row text-left text-lg leading-relaxed" @submit.prevent="submit()" >

                <div class="mb-2">
                  <label  class="block uppercase text-gray-900 text-xs font-bold mb-2"
                    :class="{ 'text-red-500' : errors && errors.newAvatar  }"
                  >Avatar</label>
                  <span class="block text-xs text-gray-500"
                    :class="{ 'text-red-500' : errors && errors.newAvatar  }"
                  >Formati accettati: .jpg,.png,.gif (massimo 10MB)</span>
                    <span class="text-gray-900 h-6 w-6 text-xl block ml-32 -mb-6 outline-none focus:outline-none cursor-pointer"
                      @click="removeAvatar=1"
                    >
                      ×
                    </span>
                    <img class="flex object-cover w-36 h-36 mr-2 mt-2 rounded-full ring-2 ring-gray-900 items-center justify-center" :src="showedAvatar" alt="Avatar"
                      @click="addFiles()"
                    />
                    <input type="file" class="hidden border-0 px-3 py-3 placeholder-gray-400 text-gray-900 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                          style="transition: all 0.15s ease 0s;"
                          ref="newAvatar"
                          @change="handleFileUpload()"
                    > 
                </div>

                <div class="mb-2">
                  <label  class="block uppercase text-gray-900 text-xs font-bold mb-2"
                    :class="{ 'text-red-500' : errors && errors.biography  }"
                  >Biografia</label>
                  <textarea maxlength="300" class="resize-none border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded-xl text-sm shadow focus:outline-none focus:ring w-full h-32
                    overflow-y-scroll overscroll-y-auto scrollbar-thin scrollbar-thumb-gray-900"
                    :class="{ 'bg-red-300' : errors && errors.biography  }"
                    style="transition: all 0.15s ease 0s;"  v-model="biography"></textarea>
                </div>

                <div class="mb-2">
                  <label class="block uppercase text-gray-900 text-xs font-bold mb-2"
                  >Social</label>
                  <div class="max-h-52 overflow-y-auto overscroll-y-auto scrollbar-thin scrollbar-thumb-gray-900 px-4">
                    <div v-for="social in socials" :key="social.id" class="inline-flex items-center justify-center rounded-full mt-2 w-auto bg-white p-1"
                      :class="{ 'bg-red-300' : errors && errors['socials.'+(social.id-1)+'.link']  }"
                    >
                      <SocialLink :social="social" class="-mb-1 -mr-1"/>
                      <input type="text" 
                        class="border-0 placeholder-gray-400 text-gray-700 bg-transparent text-sm focus:border-transparent focus-within:outline-none w-96"               
                        :placeholder="social.description"
                        v-model="inputSocials.find(x => x.description===social.description).link"
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

  import SocialLink from './SocialLink.vue';

  export default {

    name: "modal-profile-edit",

    props : ['user','socials'],

    components : {
      SocialLink,
    },

    data() {

      return {
        showModal: false,

        newAvatar: '',
        removeAvatar : 0, //deve essere 1/0 perché formData non accetta true/false
        biography : this.user.biography,
        inputSocials : [],

        errors : null,

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
        for (var i = 0; i < this.inputSocials.length; i++) {
            formData.append('socials['+i+'][id]', this.inputSocials[i].id);
            formData.append('socials['+i+'][description]', this.inputSocials[i].description);
            formData.append('socials['+i+'][link]', this.inputSocials[i].link);
        }

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
          this.errors=error.response.data.errors;
        });
      },

    },


    mounted () {

      for (var i = 0; i < this.socials.length ; i++) {
        this.inputSocials.push({ 
            id : this.socials[i].id,
            description : this.socials[i].description, 
            link  : this.user.socials.find( x => x.description === this.socials[i].description ) ? this.user.socials.find( x => x.description === this.socials[i].description ).pivot.link : '', 
        })
      }

    },

  }
</script>