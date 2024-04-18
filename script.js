const {createApp} = Vue

createApp({
  data(){
    return{
      apiUrl:'server.php',
      listaDischi:[],
      newDisk:{
        title:'',
        year:'',
        author:'',
        poster:'',
      }

    }
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl)
      .then(res=>{
        this.listaDischi=res.data
        console.log(this.listaDischi)
      })
    },

    addDisk(){

      const data = new FormData();
      data.append('newDiskTitle',this.newDisk.title)
      data.append('newDiskYear', this.newDisk.year)
      data.append('newDiskAuthor', this.newDisk.author)
      data.append('newDiskPoster', this.newDisk.poster);

      axios.post( this.apiUrl,data)
      .then(res=>{
        this.listaDischi=res.data
      })
    },

    removeDisk(index){
      
      const data = new FormData()
       data.append('indexToRemove',index)
       

      axios.post(this.apiUrl,data)
      .then(res=> {
        this.listaDischi=res.data
        
      })
    },
    addLike(index){
      const data = new FormData()
      data.append('indexToLike', index)

      axios.post(this.apiUrl,data)
      .then(res=>{
        this.listaDischi=res.data
      })
    }
  },
  mounted(){
    this.getApi()
  }
}).mount('#app')