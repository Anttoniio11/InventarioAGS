@extends('plantilla')
@section('panelLateral')
@endsection

 <!-- Contenido principal -->
 <div class="content">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Última Actividad</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="avatar1.jpg" class="rounded-circle" alt="Avatar" width="30"> Luis Fuller</td>
                    <td>gutman.meri@gmail.com</td>
                    <td>22GB</td>
                    <td>Dekksmoth</td>
                    <td>10 Oct 2017</td>
                    <td><i class="bi bi-star-fill text-warning"></i></td>
                </tr>
                <tr>
                    <td><img src="avatar2.jpg" class="rounded-circle" alt="Avatar" width="30"> Polly Salazar</td>
                    <td>richards.hornny@icloud.com</td>
                    <td>25GB</td>
                    <td>Heathcote</td>
                    <td>15 Oct 2017</td>
                    <td><i class="bi bi-star-fill text-warning"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
       