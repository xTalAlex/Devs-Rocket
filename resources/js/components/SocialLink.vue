<template>
    <div>
        <a 
            v-if="link"
            :class="linkClass"
            :href="addHttp(link)"
            target="_blank"
        >
            <i :class="icon"></i>
        </a>

        <button disabled 
            v-else
            :class="linkClass"
        >
            <i :class="icon"></i>
        </button>  

    </div>  
</template>

<script>
  export default {

    name: "social-link",

    props : ['social'],

    data() {

      return {
          name : this.social.description,
          link : this.social.pivot ? this.social.pivot.link : null,
      }

    },

    computed :{

        icon(){
            return 'fab fa-'+this.name.toLowerCase();
        },

        color() {
            var color='bg-gray-300'
            switch(this.social.description.toLowerCase()){
                case 'facebook':
                    color='bg-blue-600';
                    break;
                case 'instagram':
                    color='bg-gray-800';
                    break;
                case 'twitter':
                    color='bg-blue-400';
                    break;
                case 'github':
                    color='bg-gray-600';
                    break;
                case 'discord':
                    color='bg-purple-900';
                    break;
                case 'youtube':
                    color='bg-red-600';
                    break;
                case 'skype':
                    color='bg-blue-500';
                    break;  
            }
            return color;
        },

        linkClass(){
            return this.color+' text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1 flex items-center justify-center '+(this.link!==null? 'cursor-pointer':'cursor-default ');
        },

    },

    methods: {

        addHttp(link) {
            if (!/^(?:f|ht)tps?\:\/\//.test(link)) {
                link = "http://" + link;
            }
            return link;
        },

    },

  }
</script>