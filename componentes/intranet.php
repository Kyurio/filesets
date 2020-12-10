<div id="app">




  <div class="container-fluid">
    <div class="row">

      <!-- importa el sidebar -->
      <?php require_once("../componentes/sidebar.php"); ?>
      <!-- end inmport -->


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <div class="container mt-4 mb-4 py-4">
            <h3>{{ titulo }}</h3>
          </div>
        </div>

        <div class="tab-content" id="myTabContent">


          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="container">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in files">
                    <th scope="row">{{ item.nombre }}</th>
                    <td>{{ item.extension }}</td>
                    <td :id="item.id" >{{ item.url }}</td>
                    <td>
                      <small v-if="msg != null">{{ msg }}</small>
                      <button type="button" class="btn btn-info" name="button" @click="copiar_link('item.id')" ><i class="fas fa-link"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="uploadfiles" role="tabpanel" aria-labelledby="uploadfiles-tab">

            <div class="container">
              <form class="border border-light p-5" enctype="multipart/form-data" method="POST" action="/filesets/config/control/Upload_files.php">
                <div class="form-group">
                  <input type="text" class="form-control" id="nombre" name="name_file" placeholder="Nombre Archivo" aria-describedby="name_file">
                </div>
                <div class="form-group">
                  <input type="file" name="files_selected" value="">
                </div>
                <div class="progress mb-2">
                  <div class="progress-bar bg-success" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button type="submit" class="btn btn-sm btn-success" name="button">Subir</button>
              </form>
            </div>

          </div>

          <div class="tab-pane fade" id="tarea" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container py-5">
              <h5>Contact</h5>
            </div>
          </div>

          <div class="tab-pane fade" id="config" role="tabpanel" aria-labelledby="config-tab">
            <div class="container py-5">


            </div>
          </div>


        </div>


      </main>

    </div>
  </div>



</div>
</div>
</div>



</div>
