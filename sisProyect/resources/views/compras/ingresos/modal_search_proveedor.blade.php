<div id="myModalProveedorList" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

<!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Articulo</h4>
        </div>

           <div class="modal-body" data-id="modal-edit">
             <style media="screen">
             .table tbody tr:hover td, .table tbody tr:hover th {
                  background-color: #eeeeea;
                  cursor: pointer;
                }
                .modal-table{
                  -moz-user-select: none;
                  -khtml-user-select:none;
                  -webkit-user-select:none;
                  user-select:none;
                }
             </style>
            <div class="row modal-table">
                <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table style="width:100%;max-width:1200px;margin:15 auto;text-align:center" id="myTableProveedor" class="table table-striped table-bordered table-hover" cellspacing="0">
                        <thead>
                          <tr>
                            <th style="text-align:center">#</th>
                            <th style="text-align:center">Tipo</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Documento</th>
                            <th style="text-align:center">#Doc.</th>
                            <th style="text-align:center;">Direccion</th>
                            <th style="text-align:center">Telefono</th>
                            <th style="text-align:center">Email</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($proveedor as $pro)
                          <tr>
                            <td>{{$pro->idpersona}}</td>
                            <td>{{$pro->tipo_persona}}</td>
                            <td>{{$pro->nombre}}</td>
                            <td>{{$pro->tipo_documento}}</td>
                            <td>{{$pro->num_documento}}</td>
                            <td>{{$pro->direccion}}</td>
                            <td>{{$pro->telefono}}</td>
                            <td>{{$pro->email}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>

           </div>
        </div>

        <div class="modal-footer">
            <button type="reset" id="cancelModal" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
       </div>


      <style>
        .progress{
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(255, 255, 255, .5) url("{{asset('img/progress.gif')}}") no-repeat 50%;
          background-size: 70px 70px;

        }
      </style>
  <div class="progress" style="display:none">

  </div>

      </div>

    </div>

</div>
