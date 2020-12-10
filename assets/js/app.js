
var app = new Vue({

  el: '#app',
  data: {

    titulo: 'titulo default',
    files: [],
    msg: '',
    cont: 0,


  },

  mounted: function(){

    this.tabs();
    this.listado_archivos();

  },


  methods: {

    tabs: function(){

      $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
          $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
      });
    },

    changeTitle: function(title){

      this.titulo = title;

    },

    listado_archivos: function(){

      capturador = this;
      axios.get('http://localhost/filesets/config/control/Listado_files.php', {
      }).then(function (response) {
        capturador.files = response.data;
      });

    },

    copiar_link: function (id){

      // var aux = document.createElement("input");
      // aux.setAttribute("value", document.getElementById(id).innerHTML);
      // document.body.appendChild(aux);
      // aux.select();
      // document.execCommand("copy");
      // document.body.removeChild(aux);

      console.log(id);

    }

  },








})
