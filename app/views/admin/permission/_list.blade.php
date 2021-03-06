<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Permisos del sistema</h3>
    </div>
    <div class="panel-body fadein fadeout" ng-show="loading">
        <p>Cargando ...</p>
    </div>
    <div class="panel-body fadein fadeout" ng-show="permissions.length == 0 && !loading">
        <p>No hay permisos dados de alta actualmente en el sistema.</p>
    </div>
    <div class="list-group" ng-show="permissions.length > 0 && !loading">
        <table class="table" >
            <thead>
                <tr>
                    <th>Nombre del permiso</th>
                    <th>Descripción del permiso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="permission in permissions" ng-class="permission.error !== undefinied ? 'warning' : '' ">
                    <td>
                        

                        {[{ permission.name}]}

                    </td>
                    <td>
                        {[{ permission.display_name}]}
                    </td>
                    <td>
                        <button ng-show="permission.idx !== undefinied && permission.error === undefinied" type="button" class="btn btn-success" title="Guardando datos ..." disabled="disabled">
                            <span class="glyphicon glyphicon-refresh spin"></span>
                        </button>
                        <button ng-hide="permission.idx !== undefinied && permission.error === undefinied" type="button" class="btn btn-info" title="Editar permiso" ng-click="edit($index)">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>
                        <button ng-hide="permission.idx !== undefinied && permission.error === undefinied" type="button" class="btn btn-danger" title="Borrar permiso" ng-click="destroy($index)">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                        <button popover="popover" options="permission.errors" ng-show="permission.idx !== undefinied && permission.error !== undefinied" type="button" class="btn btn-warning" title="El formulario contiene errores">
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/ng-template" id="modalContent.html">
    <div class="modal-header">
        <h3 class="modal-title">Eliminar permiso</h3>
    </div>
    <div class="modal-body">
        <div class="well">
            ¿Deseas eliminar el permiso <strong>{[{ name }]}</strong>?
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" ng-click="cancel()">Cancelar</button>
        <button class="btn btn-danger" ng-click="destroy()">Eliminar</button>
    </div>
</script>