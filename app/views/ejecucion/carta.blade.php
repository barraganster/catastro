@extends('layouts.default')



@section('content')
<div>
    <div class="panel panel-primary">
    
    <div class="panel-heading">

        <h4 class="panel-title">Datos Ejecución Fiscal</h4>
        
    </div>

</div>
    @if(Session::has('mensaje'))

    <h2>{{ Session::get('mensaje') }}</h2>

    @endif
    
    {{ HTML::style('css/datatable.css') }}
     @section('javascript')
    <script src="/js/jquery-1.4.3.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
    var t = $('#example').DataTable();
    var counter = 1;
 
    $('#addRow').on( 'click', function () {
        t.row.add( [
            counter +'.1',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5'
        ] ).draw();
 
        counter++;
    } );
 
    // Automatically add a first row of data
    $('#addRow').click();
} );
    </script>
@stop
<br><br><table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
            </tr>
        </tfoot>
    </table>




@stop